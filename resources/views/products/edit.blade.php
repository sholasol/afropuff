<x-admin-layout>
    <!-- Edit Product Content -->
    <div class="edit-product-content py-4">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('products') }}" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                        </a>
                        <div>
                            <a href="{{ route('productGallery', $product) }}" target="_blank" class="btn btn-outline-light me-2">
                                <i class="fas fa-eye me-2"></i>View Product
                            </a>
                            <button type="submit" form="productForm" class="btn btn-primary">Update Product</button>
                        </div>
                    </div>
                </div>
            </div>

            <form id="productForm" action="{{ route('updateProduct', $product) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- Main Product Information -->
                    <div class="col-lg-8">
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Basic Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="productName" class="form-label">Product Name*</label>
                                    <input type="text" class="form-control" id="productName" name="name" value="{{ old('name', $product->name) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productSlug" class="form-label">Slug</label>
                                    <div class="input-group">
                                        <span class="input-group-text">vapexperience.com/product/</span>
                                        <input type="text" class="form-control" id="productSlug" name="slug" value="{{ old('slug', $product->slug) }}">
                                    </div>
                                    <small class="text-muted">Leave blank to auto-generate from product name.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="productSKU" class="form-label">SKU*</label>
                                    <input type="text" class="form-control" id="productSKU" name="sku" value="{{ old('sku', $product->sku) }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description*</label>
                                    <textarea class="form-control" id="productDescription" name="description" rows="6" required>{{ old('description', $product->description) }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="productShortDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="productShortDescription" name="short_description" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                                    <small class="text-muted">Brief summary displayed in product listings.</small>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Media</h5>
                            </div>
                            <div class="card-body">
                                <div class="product-images-uploader mb-3">
                                    <label class="form-label">Product Images*</label>
                                    <div class="product-images-container">
                                        <div class="row g-3" id="productImagesPreview">
                                            @foreach($product->images as $image)
                                            <div class="col-md-4 col-6">
                                                <div class="image-preview-box">
                                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" alt="Product Image">
                                                    <div class="image-actions">
                                                        <button type="button" class="btn btn-sm btn-light preview-image" title="Preview">
                                                            <i class="fas fa-eye"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-danger remove-image" data-image-id="{{ $image->id }}" title="Remove">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </div>
                                                    <input type="hidden" name="existing_images[]" value="{{ $image->id }}">
                                                </div>
                                            </div>
                                            @endforeach
                                            <div class="col-md-4 col-6">
                                                <div class="image-upload-box">
                                                    <div class="upload-placeholder">
                                                        <i class="fas fa-plus"></i>
                                                        <span>Add Image</span>
                                                    </div>
                                                    <input type="file" class="image-upload-input" name="images[]" accept="image/*" multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Upload at least one image. First image will be used as the product thumbnail.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="productVideo" class="form-label">Product Video URL (Optional)</label>
                                    <input type="url" class="form-control" id="productVideo" name="video_url" value="{{ old('video_url', $product->video_url) }}" placeholder="YouTube or Vimeo URL">
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Pricing</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="regularPrice" class="form-label">Regular Price*</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="regularPrice" name="regular_price" step="0.01" value="{{ old('regular_price', $product->regular_price) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="salePrice" class="form-label">Sale Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="salePrice" name="sale_price" step="0.01" value="{{ old('sale_price', $product->sale_price) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="scheduleSale" name="schedule_sale" {{ $product->sale_start ? 'checked' : '' }}>
                                    <label class="form-check-label" for="scheduleSale">Schedule Sale</label>
                                </div>
                                <div class="row sale-schedule {{ $product->sale_start ? '' : 'd-none' }}">
                                    <div class="col-md-6 mb-3">
                                        <label for="saleStart" class="form-label">Sale Start Date</label>
                                        <input type="date" class="form-control" id="saleStart" name="sale_start" value="{{ old('sale_start', $product->sale_start ? $product->sale_start->format('Y-m-d') : '') }}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="saleEnd" class="form-label">Sale End Date</label>
                                        <input type="date" class="form-control" id="saleEnd" name="sale_end" value="{{ old('sale_end', $product->sale_end ? $product->sale_end->format('Y-m-d') : '') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Inventory</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="stockQuantity" class="form-label">Stock Quantity*</label>
                                        <input type="number" class="form-control" id="stockQuantity" name="stock_quantity" min="0" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lowStockThreshold" class="form-label">Low Stock Threshold</label>
                                        <input type="number" class="form-control" id="lowStockThreshold" name="low_stock_threshold" min="0" value="{{ old('low_stock_threshold', $product->low_stock_threshold) }}">
                                        <small class="text-muted">Get notified when stock reaches this level.</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stockStatus" class="form-label">Stock Status</label>
                                    <select class="form-select" id="stockStatus" name="stock_status">
                                        <option value="in-stock" {{ old('stock_status', $product->stock_status) == 'in-stock' ? 'selected' : '' }}>In Stock</option>
                                        <option value="out-of-stock" {{ old('stock_status', $product->stock_status) == 'out-of-stock' ? 'selected' : '' }}>Out of Stock</option>
                                        <option value="backorder" {{ old('stock_status', $product->stock_status) == 'backorder' ? 'selected' : '' }}>On Backorder</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="manageStock" name="manage_stock" {{ old('manage_stock', $product->manage_stock) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="manageStock">Track Inventory</label>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Shipping</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="weight" class="form-label">Weight (oz)</label>
                                        <input type="number" class="form-control" id="weight" name="weight" step="0.01" value="{{ old('weight', $product->weight) }}">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label">Dimensions (inches)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="length" name="length" placeholder="Length" step="0.01" value="{{ old('length', $product->length) }}">
                                            <input type="number" class="form-control" id="width" name="width" placeholder="Width" step="0.01" value="{{ old('width', $product->width) }}">
                                            <input type="number" class="form-control" id="height" name="height" placeholder="Height" step="0.01" value="{{ old('height', $product->height) }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingClass" class="form-label">Shipping Class</label>
                                    <select class="form-select" id="shippingClass" name="shipping_class">
                                        <option value="standard" {{ old('shipping_class', $product->shipping_class) == 'standard' ? 'selected' : '' }}>Standard</option>
                                        <option value="express" {{ old('shipping_class', $product->shipping_class) == 'express' ? 'selected' : '' }}>Express</option>
                                        <option value="fragile" {{ old('shipping_class', $product->shipping_class) == 'fragile' ? 'selected' : '' }}>Fragile</option>
                                        <option value="hazardous" {{ old('shipping_class', $product->shipping_class) == 'hazardous' ? 'selected' : '' }}>Hazardous Materials</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Variants</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="hasVariants" name="has_variants" {{ old('has_variants', $product->has_variants) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="hasVariants">This product has multiple variants</label>
                                </div>
                                <div id="variantsSection" class="{{ $product->has_variants ? '' : 'd-none' }}">
                                    <div class="mb-3">
                                        <label class="form-label">Variant Attributes</label>
                                        <div class="variant-attributes">
                                            <!-- Attributes will be dynamically added here -->
                                        </div>
                                        <button type="button" class="btn btn-outline-light btn-sm mt-2" id="addAttributeBtn">
                                            <i class="fas fa-plus me-1"></i>Add Another Attribute
                                        </button>
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-light" id="generateVariantsBtn">Generate Variants</button>
                                    </div>
                                    <div id="variantsTable">
                                        <label class="form-label">Product Variants</label>
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Variant</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>SKU</th>
                                                        <th>Image</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="variantsTableBody">
                                                    @foreach($product->variants as $variant)
                                                    <tr>
                                                        <td>{{ $variant->name }}</td>
                                                        <td>
                                                            <div class="input-group input-group-sm">
                                                                <span class="input-group-text">$</span>
                                                                <input type="number" class="form-control" name="variants[{{ $variant->id }}][price]" value="{{ $variant->price }}" step="0.01">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="number" class="form-control form-control-sm" name="variants[{{ $variant->id }}][stock_quantity]" value="{{ $variant->stock_quantity }}" min="0">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control form-control-sm" name="variants[{{ $variant->id }}][sku]" value="{{ $variant->sku }}">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-outline-light btn-sm variant-image-btn">
                                                                <i class="fas fa-image"></i>
                                                            </button>
                                                            <input type="hidden" name="variants[{{ $variant->id }}][image]" value="{{ $variant->image }}">
                                                            <input type="hidden" name="variants[{{ $variant->id }}][id]" value="{{ $variant->id }}">
                                                            <input type="hidden" name="variants[{{ $variant->id }}][attributes]" value="{{ json_encode($variant->attributes) }}">
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">

                        <div class="dashboard-card mb-4" style="background-color: #52cff2;">
                            <div class="card-header">
                                <h5 class="card-title">Categories</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   name="categories[]" 
                                                   value="{{ $category->id }}" 
                                                   id="category{{ $category->id }}"
                                                   {{ in_array($category->id, old('categories', $product->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <label class="form-check-label text-white" for="category{{ $category->id }}">
                                                {{ $category->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                        
                                @error('categories')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('categories.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Tags</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    @foreach($tags as $tag)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   name="tags[]" value="{{ $tag->id }}" 
                                                   id="tag{{ $tag->id }}"
                                                   {{ in_array($category->id, old('categories', $product->categories->pluck('id')->toArray())) ? 'checked' : '' }}>
                                            <label class="form-check-label text-white" for="tag{{ $tag->id }}">
                                                {{ $tag->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('tags')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @error('tags.*')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Featured Image</h5>
                            </div>
                            <div class="card-body">
                                <div class="featured-image-uploader">
                                    <div class="featured-image-preview">
                                        @if($product->featuredImage)
                                        <img src="{{ asset('storage/' . $product->featuredImage) }}" class="img-fluid" alt="Featured Image">
                                        <div class="image-actions">
                                            <button type="button" class="btn btn-sm btn-light preview-image" title="Preview">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger remove-image" title="Remove">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                        @else
                                        <div class="upload-placeholder">
                                            <i class="fas fa-image"></i>
                                            <span class="text-white">Set Featured Image</span>
                                        </div>
                                        @endif
                                    </div>
                                    <input type="file" class="featured-image-input text-white" name="featured_image" accept="image/*">
                                </div>
                                <small class="text-white">This image will be used in product listings and social sharing.</small>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imagePreviewModalLabel">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="/placeholder.svg" id="previewImage" class="img-fluid" alt="Preview">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Product Updated</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-success fa-4x"></i>
                        <h4 class="mt-3">Product Updated Successfully!</h4>
                        <p>Your changes have been saved and the product has been updated.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('products') }}" class="btn btn-outline-light">Go to Products</a>
                    <a href="{{ route('productGallery', $product) }}" class="btn btn-orange" target="_blank">View Product</a>
                </div>
            </div>
        </div>
    </div>


    <script>
         // Toggle sale schedule fields
         document.getElementById('scheduleSale').addEventListener('change', function() {
            const saleSchedule = document.querySelector('.sale-schedule');
            if (this.checked) {
                saleSchedule.classList.remove('d-none');
            } else {
                saleSchedule.classList.add('d-none');
            }
        });

        // Toggle password protection field
        document.getElementById('productVisibility').addEventListener('change', function() {
            const passwordProtection = document.querySelector('.password-protection');
            if (this.value === 'password-protected') {
                passwordProtection.classList.remove('d-none');
            } else {
                passwordProtection.classList.add('d-none');
            }
        });

        // Toggle variants section
        document.getElementById('hasVariants').addEventListener('change', function() {
            const variantsSection = document.getElementById('variantsSection');
            if (this.checked) {
                variantsSection.classList.remove('d-none');
            } else {
                variantsSection.classList.add('d-none');
            }
        });

        // Add attribute row
        document.getElementById('addAttributeBtn').addEventListener('click', function() {
            const variantAttributes = document.querySelector('.variant-attributes');
            const newRow = document.createElement('div');
            newRow.className = 'row mb-2';
            newRow.innerHTML = `
                <div class="col-md-5">
                    <select class="form-select attribute-name">
                        <option value="nicotine">Nicotine Strength</option>
                        <option value="size">Size</option>
                        <option value="flavor">Flavor Intensity</option>
                        <option value="color">Color</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control attribute-values" placeholder="Values (comma separated)">
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-outline-danger btn-sm remove-attribute">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            `;
            variantAttributes.appendChild(newRow);

            // Add event listener to remove button
            newRow.querySelector('.remove-attribute').addEventListener('click', function() {
                variantAttributes.removeChild(newRow);
            });
        });

        // Generate variants
        document.getElementById('generateVariantsBtn').addEventListener('click', function() {
            const attributeNames = Array.from(document.querySelectorAll('.attribute-name')).map(select => select.value);
            const attributeValues = Array.from(document.querySelectorAll('.attribute-values')).map(input => input.value.split(',').map(val => val.trim()));
            
            // Check if values are provided
            if (attributeValues.some(values => values.length === 0 || (values.length === 1 && values[0] === ''))) {
                alert('Please provide values for all attributes.');
                return;
            }

            // Generate combinations
            const generateCombinations = (arrays, current = [], index = 0) => {
                if (index === arrays.length) {
                    return [current];
                }
                
                return arrays[index].flatMap(item => 
                    generateCombinations(arrays, [...current, item], index + 1)
                );
            };

            const combinations = generateCombinations(attributeValues);
            
            // Generate variant rows
            const variantsTableBody = document.getElementById('variantsTableBody');
            variantsTableBody.innerHTML = '';
            
            combinations.forEach((combination, index) => {
                const variantName = combination.map((value, i) => `${attributeNames[i]}: ${value}`).join(' / ');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${variantName}</td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" name="variants[new_${index}][price]" value="${document.getElementById('regularPrice').value || ''}" step="0.01">
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control form-control-sm" name="variants[new_${index}][stock_quantity]" value="${document.getElementById('stockQuantity').value || '0'}" min="0">
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="variants[new_${index}][sku]" value="${document.getElementById('productSKU').value || ''}-${index + 1}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-light btn-sm variant-image-btn">
                            <i class="fas fa-image"></i>
                        </button>
                        <input type="hidden" name="variants[new_${index}][attributes]" value='${JSON.stringify(Object.fromEntries(attributeNames.map((name, i) => [name, combination[i]]))}'>
                    </td>
                `;
                variantsTableBody.appendChild(row);
            });

            // Show variants table
            document.getElementById('variantsTable').classList.remove('d-none');
        });

        // Handle image uploads
        document.querySelector('.image-upload-input').addEventListener('change', function(e) {
            const files = e.target.files;
            if (!files.length) return;

            const previewContainer = document.getElementById('productImagesPreview');
            const uploadBox = previewContainer.querySelector('.image-upload-box');

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-4 col-6';
                    col.innerHTML = `
                        <div class="image-preview-box">
                            <img src="${e.target.result}" class="img-fluid" alt="Product Image">
                            <div class="image-actions">
                                <button type="button" class="btn btn-sm btn-light preview-image" title="Preview">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger remove-image" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    previewContainer.insertBefore(col, uploadBox.parentNode);

                    // Add event listeners to buttons
                    col.querySelector('.preview-image').addEventListener('click', function() {
                        document.getElementById('previewImage').src = e.target.result;
                        const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
                        previewModal.show();
                    });

                    col.querySelector('.remove-image').addEventListener('click', function() {
                        previewContainer.removeChild(col);
                    });
                };

                reader.readAsDataURL(file);
            }
        });

        // Add event listeners to existing preview buttons
        document.querySelectorAll('.preview-image').forEach(button => {
            button.addEventListener('click', function() {
                const img = this.closest('.image-preview-box, .featured-image-preview').querySelector('img');
                document.getElementById('previewImage').src = img.src;
                const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
                previewModal.show();
            });
        });

        // Add event listeners to existing remove buttons
        document.querySelectorAll('.remove-image').forEach(button => {
            button.addEventListener('click', function() {
                const container = this.closest('.image-preview-box, .featured-image-preview');
                if (container.classList.contains('featured-image-preview')) {
                    container.innerHTML = `
                        <div class="upload-placeholder">
                            <i class="fas fa-image"></i>
                            <span>Set Featured Image</span>
                        </div>
                    `;
                } else {
                    const col = container.closest('.col-md-4, .col-6');
                    col.parentNode.removeChild(col);
                }
            });
        });

        // Handle featured image upload
        document.querySelector('.featured-image-input').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewContainer = document.querySelector('.featured-image-preview');
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid" alt="Featured Image">
                    <div class="image-actions">
                        <button type="button" class="btn btn-sm btn-light preview-image" title="Preview">
                            <i class="fas fa-eye"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger remove-image" title="Remove">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;

                // Add event listeners to buttons
                previewContainer.querySelector('.preview-image').addEventListener('click', function() {
                    document.getElementById('previewImage').src = e.target.result;
                    const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
                    previewModal.show();
                });

                previewContainer.querySelector('.remove-image').addEventListener('click', function() {
                    previewContainer.innerHTML = `
                        <div class="upload-placeholder">
                            <i class="fas fa-image"></i>
                            <span>Set Featured Image</span>
                        </div>
                    `;
                });
            };

            reader.readAsDataURL(file);
        });

        // Handle tag buttons
        document.querySelectorAll('.tag-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const tagsInput = document.getElementById('productTags');
                const currentTags = tagsInput.value.split(',').map(tag => tag.trim()).filter(tag => tag);
                const tagText = this.textContent.trim();
                
                if (!currentTags.includes(tagText)) {
                    if (currentTags.length > 0 && currentTags[0] !== '') {
                        tagsInput.value = currentTags.join(', ') + ', ' + tagText;
                    } else {
                        tagsInput.value = tagText;
                    }
                }
            });
        });

        // Auto-generate slug from product name
        document.getElementById('productName').addEventListener('input', function() {
            const slugInput = document.getElementById('productSlug');
            if (!slugInput.value) {
                slugInput.value = this.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        });

        // Handle form submission
        document.getElementById('updateBtn').addEventListener('click', function() {
            if (validateForm()) {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });

        document.getElementById('updateProductBtn').addEventListener('click', function() {
            if (validateForm()) {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });

        document.getElementById('previewBtn').addEventListener('click', function() {
            window.open('../product-gallery.html', '_blank');
        });

        // Form validation
        function validateForm() {
            const requiredFields = [
                { id: 'productName', label: 'Product Name' },
                { id: 'productSKU', label: 'SKU' },
                { id: 'productDescription', label: 'Description' },
                { id: 'regularPrice', label: 'Regular Price' },
                { id: 'stockQuantity', label: 'Stock Quantity' }
            ];

            let isValid = true;
            let errorMessage = 'Please fill in the following required fields:\n';

            requiredFields.forEach(field => {
                const element = document.getElementById(field.id);
                if (!element.value.trim()) {
                    errorMessage += `- ${field.label}\n`;
                    element.classList.add('is-invalid');
                    isValid = false;
                } else {
                    element.classList.remove('is-invalid');
                }
            });

            if (!isValid) {
                alert(errorMessage);
            }

            return isValid;
        }
    </script>
</x-admin-layout>