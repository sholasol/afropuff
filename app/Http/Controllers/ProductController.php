<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;
use App\Models\ProductImage;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::with(['categories', 'tags', 'featuredImage'])
            ->when(request('category'), function ($query) {
                $query->whereHas('categories', function ($q) {
                    $q->where('id', request('category'));
                });
            })
            ->when(request('status'), function ($query) {
                $query->where('status', request('status'));
            })
            ->when(request('sort'), function ($query) {
                switch (request('sort')) {
                    case 'oldest':
                        $query->oldest();
                        break;
                    case 'price-low':
                        $query->orderBy('regular_price');
                        break;
                    case 'price-high':
                        $query->orderByDesc('regular_price');
                        break;
                    default:
                        $query->latest();
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    public function gallery(Product $product)
    {
        $product = Product::with(['categories', 'tags', 'featuredImage'])
            ->where('id', $product->id)->first();

        return view('products.gallery', ['product' =>$product]);
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);
        // Handle featured image upload
        //f
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
            $path = $request->file('featured_image')->store('products', 'public');
            $validated['featuredImage'] = $path;
        }

        // Create product
        $product = Product::create($validated);

        // Handle categories
        if ($request->has('categories')) {
            $product->categories()->sync($request->categories);
        }

        // Handle tags
        if ($request->has('tags')) {
            $product->tags()->sync($request->tags);
        }

        // Handle product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('products', 'public');

                $isFeatured = $key === 0 && !$request->hasFile('featured_image');

                $product->images()->create([
                    'image_path' => $path,
                    'is_featured' => $isFeatured,
                    'sort_order' => $key
                ]);

                if ($isFeatured) {
                    $product->update(['featured_image' => $path]);
                }
            }
        }

        // Handle variants
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                // No need to decode since Laravel already parsed the array
                $variant = new ProductVariant([
                    'name' => $variantData['name'],
                    'sku' => $variantData['sku'],
                    'price' => $variantData['price'],
                    'stock_quantity' => $variantData['stock_quantity'],
                    'attributes' => $variantData['attributes'], // Already an array
                ]);

                $product->variants()->save($variant);
            }
        }

        noty()->success('Product created successfully.');
        return redirect()->route('products')
            ->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {

        $product = Product::with(['categories', 'tags','images', 'variants' ])
                ->where('id', $product->id)->first();
        $categories = Category::all();
        $tags = Tag::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories, 'tags' =>$tags]);
    }

    public function bulkDelete(Request $request)
    {
        $selectedIds = json_decode($request->selected_ids);

        Product::whereIn('id', $selectedIds)->delete();

        return back()->with('success', 'Selected products deleted successfully');
    }

    public function edit(Product $product)
    {
        $product->load(['categories', 'tags', 'images', 'variants']);
        $categories = Category::all();
        $tags = Tag::all();

        return view('products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, Product $product)
    {

        $validated = $this->validateProduct($request, $product);
    
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            if ($product->featuredImage) {
                Storage::delete('public/' . $product->featuredImage->image_path);
            }
            $path = $request->file('featured_image')->store('products', 'public');
            $validated['featuredImage'] = $path;
        }
    
        unset($validated['featured_image']); // prevent unexpected column
    
        $product->update($validated);
    
        // Sync categories and tags
        $product->categories()->sync($request->categories ?? []);
        $product->tags()->sync($request->tags ?? []);
    
        // Upload new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $key => $image) {
                $path = $image->store('products', 'public');
                $product->images()->create([
                    'image_path' => $path,
                    'sort_order' => $key,
                ]);
            }
        }
    
        // Delete removed images
        if ($request->has('deleted_images')) {
            foreach ($request->deleted_images as $imageId) {
                $image = ProductImage::find($imageId);
                if ($image) {
                    Storage::delete('public/' . $image->image_path);
                    $image->delete();
                }
            }
        }
    
        // Handle variants
        if ($request->has('variants')) {
            $existingIds = $product->variants->pluck('id')->toArray();
            $submittedIds = [];
    
            foreach ($request->variants as $variantData) {
                if (isset($variantData['id'])) {
                    $variant = ProductVariant::find($variantData['id']);
                    if ($variant) {
                        $variant->update($variantData);
                        $submittedIds[] = $variant->id;
                    }
                } else {
                    $new = $product->variants()->create($variantData);
                    $submittedIds[] = $new->id;
                }
            }
    
            $toDelete = array_diff($existingIds, $submittedIds);
            ProductVariant::destroy($toDelete);
        } else {
            $product->variants()->delete();
        }
    
        noty()->success('Product updated successfully.');
        return redirect()->route('products')->with('success', 'Product updated successfully');
    }
    

    public function destroy(Product $product)
    {
        // Delete images from storage
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->image_path);
        }

        $product->delete();

        noty()->success('Product deleted.');
        return redirect()->back();
    }


    protected function validateProduct(Request $request, Product $product = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug' . ($product ? ',' . $product->id : ''),
            'sku' => 'required|string|max:100|unique:products,sku' . ($product ? ',' . $product->id : ''),
            'description' => 'required|string',
            'short_description' => 'nullable|string',
            'regular_price' => 'required|numeric|min:0',
            'sale_price' => 'nullable|numeric|min:0|lt:regular_price',
            'sale_start' => 'nullable|date',
            'sale_end' => 'nullable|date|after_or_equal:sale_start',
            'stock_quantity' => 'required|integer|min:0',
            'low_stock_threshold' => 'nullable|integer|min:0',
            'stock_status' => 'required|in:in-stock,out-of-stock,backorder',
            'manage_stock' => 'boolean',
            'weight' => 'nullable|numeric|min:0',
            'length' => 'nullable|numeric|min:0',
            'width' => 'nullable|numeric|min:0',
            'height' => 'nullable|numeric|min:0',
            'shipping_class' => 'nullable|string|max:50',
            'has_variants' => 'boolean',
            'status' => 'required|in:published,draft,pending',
            'visibility' => 'required|in:public,private,password-protected',
            'password' => 'nullable|required_if:visibility,password-protected|string|min:3',
            'publish_date' => 'nullable|date',
            'video_url' => 'nullable|url',
            'featured_image' => 'nullable|image|max:2048',
            'images' => 'nullable|array',
            'images.*' => 'image|max:2048',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'variants' => 'nullable|array',
            'variants.*.name' => 'required|string|max:255',
            'variants.*.sku' => 'required|string|max:100|unique:product_variants,sku' . ($product ? ',' . $product->id . ',product_id' : ''),
            'variants.*.attributes' => 'required|array',
            'variants.*.price' => 'required|numeric|min:0',
            'variants.*.stock_quantity' => 'required|integer|min:0',
            'variants.*.image' => 'nullable|string',
        ];

        return $request->validate($rules);
    }

    public function generateSlug(Request $request)
    {
        $request->validate(['name' => 'required|string']);

        return response()->json([
            'slug' => Str::slug($request->name)
        ]);
    }

    public function generateVariants(Request $request)
    {
        $request->validate([
            'attributes' => 'required|array',
            'attributes.*.name' => 'required|string',
            'attributes.*.values' => 'required|string',
            'base_sku' => 'required|string',
            'base_price' => 'required|numeric|min:0',
            'base_stock' => 'required|integer|min:0',
        ]);

        $attributes = collect($request->attributes)->mapWithKeys(function ($attr) {
            $values = array_map('trim', explode(',', $attr['values']));
            return [$attr['name'] => $values];
        });

        // Generate all possible combinations
        $combinations = $this->generateCombinations($attributes);

        $variants = [];
        $index = 1;

        foreach ($combinations as $combination) {
            $variantName = collect($combination)->map(function ($value, $key) {
                return "$key: $value";
            })->implode(' / ');

            $variantSku = $request->base_sku . '-' . $index++;

            $variants[] = [
                'name' => $variantName,
                'sku' => $variantSku,
                'attributes' => $combination,
                'price' => $request->base_price,
                'stock_quantity' => $request->base_stock,
                'image' => null,
            ];
        }

        return response()->json([
            'variants' => $variants,
            'count' => count($variants)
        ]);
    }

    protected function generateCombinations($attributes)
    {
        $combinations = [[]];

        foreach ($attributes as $name => $values) {
            $temp = [];

            foreach ($combinations as $combination) {
                foreach ($values as $value) {
                    $temp[] = $combination + [$name => $value];
                }
            }

            $combinations = $temp;
        }

        return $combinations;
    }


    
}
