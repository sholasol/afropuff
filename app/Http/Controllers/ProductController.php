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
            ->latest()
            ->paginate(10);
            
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.products.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $validated = $this->validateProduct($request);
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
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
                
                $product->images()->create([
                    'image_path' => $path,
                    'is_featured' => $key === 0 && !$request->hasFile('featured_image'),
                    'sort_order' => $key
                ]);
            }
        }
        
        // Handle variants
        if ($request->has('variants')) {
            foreach ($request->variants as $variantData) {
                $variant = new ProductVariant([
                    'name' => $variantData['name'],
                    'sku' => $variantData['sku'],
                    'attributes' => $variantData['attributes'],
                    'price' => $variantData['price'],
                    'stock_quantity' => $variantData['stock_quantity'],
                ]);
                
                if (isset($variantData['image']) && $variantData['image']) {
                    $variant->image = $variantData['image'];
                }
                
                $product->variants()->save($variant);
            }
        }
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully');
    }

    public function show(Product $product)
    {
        $product->load(['categories', 'tags', 'images', 'variants']);
        return view('admin.products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $product->load(['categories', 'tags', 'images', 'variants']);
        $categories = Category::all();
        $tags = Tag::all();
        
        return view('admin.products.edit', compact('product', 'categories', 'tags'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $this->validateProduct($request, $product);
        
        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            if ($product->featuredImage) {
                Storage::delete('public/' . $product->featuredImage->image_path);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('products', 'public');
        }
        
        // Update product
        $product->update($validated);
        
        // Handle categories
        $product->categories()->sync($request->categories ?? []);
        
        // Handle tags
        $product->tags()->sync($request->tags ?? []);
        
        // Handle product images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $product->images()->create(['image_path' => $path]);
            }
        }
        
        // Handle image deletions
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
            $existingVariantIds = $product->variants->pluck('id')->toArray();
            $updatedVariantIds = [];
            
            foreach ($request->variants as $variantData) {
                if (isset($variantData['id'])) {
                    // Update existing variant
                    $variant = ProductVariant::find($variantData['id']);
                    if ($variant) {
                        $variant->update([
                            'name' => $variantData['name'],
                            'sku' => $variantData['sku'],
                            'attributes' => $variantData['attributes'],
                            'price' => $variantData['price'],
                            'stock_quantity' => $variantData['stock_quantity'],
                            'image' => $variantData['image'] ?? $variant->image,
                        ]);
                        $updatedVariantIds[] = $variant->id;
                    }
                } else {
                    // Create new variant
                    $variant = new ProductVariant([
                        'name' => $variantData['name'],
                        'sku' => $variantData['sku'],
                        'attributes' => $variantData['attributes'],
                        'price' => $variantData['price'],
                        'stock_quantity' => $variantData['stock_quantity'],
                        'image' => $variantData['image'] ?? null,
                    ]);
                    $product->variants()->save($variant);
                    $updatedVariantIds[] = $variant->id;
                }
            }
            
            // Delete variants not in the updated list
            $variantsToDelete = array_diff($existingVariantIds, $updatedVariantIds);
            ProductVariant::whereIn('id', $variantsToDelete)->delete();
        } else {
            // If no variants in request, delete all existing variants
            $product->variants()->delete();
        }
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully');
    }

    public function destroy(Product $product)
    {
        // Delete images from storage
        foreach ($product->images as $image) {
            Storage::delete('public/' . $image->image_path);
        }
        
        $product->delete();
        
        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully');
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


