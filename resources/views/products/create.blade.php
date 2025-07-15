<x-admin-layout>
    <!-- Create Product Content -->
    <div class="create-product-content py-4">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('products') }}" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                        </a>
                        <div>
                            <button type="submit" form="productForm" name="status" value="draft" class="btn btn-primary me-2">
                                Save as Draft
                            </button>
                            <button type="submit" form="productForm" name="status" value="published" class="btn btn-success">
                                Publish Product
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="productForm" action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="status" value="draft" id="productStatus">
                
                <div class="row">
                    <!-- Main Product Information -->
                    <div class="col-lg-8">
                        <!-- Basic Information -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Basic Information</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Product Name*</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="slug" class="form-label">Slug*</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ url('/product/') }}/</span>
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                               id="slug" name="slug" value="{{ old('slug') }}" required>
                                        <button type="button" class="btn btn-outline-secondary" id="generateSlugBtn">
                                            Generate
                                        </button>
                                    </div>
                                    <small class="text-muted">Leave blank to auto-generate from product name.</small>
                                    @error('slug')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="sku" class="form-label">SKU*</label>
                                    <input type="text" class="form-control @error('sku') is-invalid @enderror" 
                                           id="sku" name="sku" value="{{ old('sku') }}" required>
                                    @error('sku')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description*</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              id="description" name="description" rows="6" required>{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="short_description" class="form-label">Short Description</label>
                                    <textarea class="form-control @error('short_description') is-invalid @enderror" 
                                              id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                                    <small class="text-muted">Brief summary displayed in product listings.</small>
                                    @error('short_description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Media</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Product Images</label>
                                    <div class="product-images-preview row mb-3" id="productImagesPreview">
                                        <div class="col-md-4 col-6 image-upload-box" style="min-height: 150px; border: 2px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                            <div class="upload-placeholder">
                                                <i class="fas fa-image"></i>
                                                <span>Add Images</span>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" class="form-control @error('images') is-invalid @enderror" 
                                           name="images[]" id="images" multiple accept="image/*">
                                    <small class="text-muted">Upload product images (max 2MB each). First image will be used as the product thumbnail if no featured image is set.</small>
                                    @error('images')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @error('images.*')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3">
                                    <label for="video_url" class="form-label">Product Video URL (Optional)</label>
                                    <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                           id="video_url" name="video_url" value="{{ old('video_url') }}" 
                                           placeholder="YouTube or Vimeo URL">
                                    @error('video_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Pricing</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="regular_price" class="form-label">Regular Price*</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control @error('regular_price') is-invalid @enderror" 
                                                   id="regular_price" name="regular_price" step="0.01" min="0"
                                                   value="{{ old('regular_price') }}" required>
                                        </div>
                                        @error('regular_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="sale_price" class="form-label">Sale Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control @error('sale_price') is-invalid @enderror" 
                                                   id="sale_price" name="sale_price" step="0.01" min="0"
                                                   value="{{ old('sale_price') }}">
                                        </div>
                                        @error('sale_price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="scheduleSale" 
                                           {{ old('sale_start') || old('sale_end') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white" for="scheduleSale">Schedule Sale</label>
                                </div>
                                
                                <div class="row sale-schedule {{ old('sale_start') || old('sale_end') ? '' : 'd-none' }}">
                                    <div class="col-md-6 mb-3">
                                        <label for="sale_start" class="form-label">Sale Start Date</label>
                                        <input type="date" class="form-control @error('sale_start') is-invalid @enderror" 
                                               id="sale_start" min="{{ \Carbon\Carbon::today()->toDateString() }}" name="sale_start" value="{{ old('sale_start') }}">
                                        @error('sale_start')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="sale_end" class="form-label">Sale End Date</label>
                                        <input type="date" class="form-control @error('sale_end') is-invalid @enderror" 
                                               id="sale_end" min="{{ \Carbon\Carbon::today()->toDateString() }}" name="sale_end" value="{{ old('sale_end') }}">
                                        @error('sale_end')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Inventory -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Inventory</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="stock_quantity" class="form-label">Stock Quantity*</label>
                                        <input type="number" class="form-control @error('stock_quantity') is-invalid @enderror" 
                                               id="stock_quantity" name="stock_quantity" min="0" 
                                               value="{{ old('stock_quantity', 0) }}" required>
                                        @error('stock_quantity')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="low_stock_threshold" class="form-label">Low Stock Threshold</label>
                                        <input type="number" class="form-control @error('low_stock_threshold') is-invalid @enderror" 
                                               id="low_stock_threshold" name="low_stock_threshold" min="0" 
                                               value="{{ old('low_stock_threshold') }}">
                                        <small class="text-muted">Get notified when stock reaches this level.</small>
                                        @error('low_stock_threshold')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="stock_status" class="form-label">Stock Status</label>
                                    <select class="form-select @error('stock_status') is-invalid @enderror" 
                                            id="stock_status" name="stock_status" required>
                                        <option value="in-stock" {{ old('stock_status', 'in-stock') == 'in-stock' ? 'selected' : '' }}>
                                            In Stock
                                        </option>
                                        <option value="out-of-stock" {{ old('stock_status') == 'out-of-stock' ? 'selected' : '' }}>
                                            Out of Stock
                                        </option>
                                        <option value="backorder" {{ old('stock_status') == 'backorder' ? 'selected' : '' }}>
                                            On Backorder
                                        </option>
                                    </select>
                                    @error('stock_status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="manage_stock" name="manage_stock" 
                                           value="1" {{ old('manage_stock', true) ? 'checked' : '' }}>
                                    <label class="form-check-label text-white" for="manage_stock">Track Inventory</label>
                                </div>
                            </div>
                        </div>

                        <!-- Shipping -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Shipping</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="weight" class="form-label">Weight (oz)</label>
                                        <input type="number" class="form-control @error('weight') is-invalid @enderror" 
                                               id="weight" name="weight" step="0.01" min="0" value="{{ old('weight') }}">
                                        @error('weight')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label">Dimensions (inches)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control @error('length') is-invalid @enderror" 
                                                   id="length" name="length" placeholder="Length" step="0.01" min="0"
                                                   value="{{ old('length') }}">
                                            <input type="number" class="form-control @error('width') is-invalid @enderror" 
                                                   id="width" name="width" placeholder="Width" step="0.01" min="0"
                                                   value="{{ old('width') }}">
                                            <input type="number" class="form-control @error('height') is-invalid @enderror" 
                                                   id="height" name="height" placeholder="Height" step="0.01" min="0"
                                                   value="{{ old('height') }}">
                                        </div>
                                        @error('length')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @error('width')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        @error('height')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="shipping_class" class="form-label">Shipping Class</label>
                                    <select class="form-select @error('shipping_class') is-invalid @enderror" 
                                            id="shipping_class" name="shipping_class">
                                        <option value="">Select Shipping Class</option>
                                        <option value="standard" {{ old('shipping_class') == 'standard' ? 'selected' : '' }}>Standard</option>
                                        <option value="express" {{ old('shipping_class') == 'express' ? 'selected' : '' }}>Express</option>
                                        <option value="fragile" {{ old('shipping_class') == 'fragile' ? 'selected' : '' }}>Fragile</option>
                                        <option value="hazardous" {{ old('shipping_class') == 'hazardous' ? 'selected' : '' }}>Hazardous Materials</option>
                                    </select>
                                    @error('shipping_class')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Product Settings -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Product Settings</h5>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="visibility" class="form-label">Visibility</label>
                                        <select class="form-select @error('visibility') is-invalid @enderror" 
                                                id="visibility" name="visibility">
                                            <option value="public" {{ old('visibility', 'public') == 'public' ? 'selected' : '' }}>Public</option>
                                            <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private</option>
                                            <option value="password-protected" {{ old('visibility') == 'password-protected' ? 'selected' : '' }}>Password Protected</option>
                                        </select>
                                        @error('visibility')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 password-protection {{ old('visibility') == 'password-protected' ? '' : 'd-none' }}">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control @error('password') is-invalid @enderror" 
                                               id="password" name="password" value="{{ old('password') }}">
                                        <small class="text-muted">Only required if visibility is set to password protected</small>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="publish_date" class="form-label">Publish Date</label>
                                    <input type="datetime-local" class="form-control @error('publish_date') is-invalid @enderror" 
                                           id="publish_date" min="{{ \Carbon\Carbon::today()->toDateString() }}" name="publish_date" value="{{ old('publish_date') }}">
                                    @error('publish_date')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Variants -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Variants</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="has_variants" name="has_variants" 
                                           value="1" {{ old('has_variants') ? 'checked' : '' }}>
                                    <label class="form-check-label text-white" for="has_variants">
                                        This product has multiple variants
                                    </label>
                                </div>
                                
                                <div id="variantsSection" class="{{ old('has_variants') ? '' : 'd-none' }}">
                                    <div class="mb-3">
                                        <label class="form-label">Variant Attributes</label>
                                        <div class="variant-attributes">
                                            <div class="row mb-2">
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control attribute-name" 
                                                           placeholder="Attribute name (e.g., Size)" value="Size">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control attribute-values" 
                                                           placeholder="Values (comma separated)" value="Small, Medium, Large">
                                                </div>
                                                <div class="col-md-2">
                                                    <button type="button" class="btn btn-outline-danger btn-sm remove-attribute d-none">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-light btn-sm mt-2" id="addAttributeBtn">
                                            <i class="fas fa-plus me-1"></i>Add Another Attribute
                                        </button>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="base_sku" class="form-label">Base SKU</label>
                                                <input type="text" class="form-control" id="base_sku" value="{{ old('sku') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="base_price" class="form-label">Base Price</label>
                                                <input type="number" class="form-control" id="base_price" step="0.01" min="0" value="{{ old('regular_price') }}">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="base_stock" class="form-label">Base Stock</label>
                                                <input type="number" class="form-control" id="base_stock" min="0" value="{{ old('stock_quantity', 0) }}">
                                            </div>
                                            <div class="col-md-3 d-flex align-items-end">
                                                <button type="button" class="btn btn-outline-light w-100" id="generateVariantsBtn">
                                                    Generate Variants
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="variantsTable" class="d-none">
                                        <label class="form-label">Product Variants</label>
                                        <div class="table-responsive">
                                            <table class="table table-dark">
                                                <thead>
                                                    <tr>
                                                        <th>Variant</th>
                                                        <th>SKU</th>
                                                        <th>Price</th>
                                                        <th>Stock</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="variantsTableBody">
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
                        <!-- Featured Image -->
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Featured Image</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="featured-image-preview mb-3" style="min-height: 200px; border: 2px dashed #ccc; display: flex; justify-content: center; align-items: center;">
                                        <div class="upload-placeholder">
                                            <i class="fas fa-image fa-3x"></i>
                                            <span>Set Featured Image</span>
                                        </div>
                                    </div>
                                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" 
                                           name="featured_image" id="featured_image" accept="image/*">
                                    <small class="text-muted">This image will be used in product listings and social sharing (max 2MB).</small>
                                    @error('featured_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Categories -->
                        <div class="dashboard-card mb-4" style="background-color: #52cff2;">
                            <div class="card-header">
                                <h5 class="card-title">Categories</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    @foreach($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                   name="categories[]" value="{{ $category->id }}" 
                                                   id="category{{ $category->id }}"
                                                   {{ in_array($category->id, old('categories', [])) ? 'checked' : '' }}>
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

                        <!-- Tags -->
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
                                                   {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
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
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title">Image Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="previewImage" src="" class="img-fluid" style="max-height: 70vh;">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
        document.getElementById('visibility').addEventListener('change', function() {
            const passwordProtection = document.querySelector('.password-protection');
            if (this.value === 'password-protected') {
                passwordProtection.classList.remove('d-none');
            } else {
                passwordProtection.classList.add('d-none');
            }
        });

        // Toggle variants section
        document.getElementById('has_variants').addEventListener('change', function() {
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
                        <option value="size">Size</option>
                        <option value="color">Color</option>
                        <option value="material">Material</option>
                        <option value="style">Style</option>
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
            const attributeNames = Array.from(document.querySelectorAll('.attribute-name')).map(el => 
                el.tagName === 'SELECT' ? el.value : el.value.toLowerCase().replace(/\s+/g, '-')
            );
            const attributeValues = Array.from(document.querySelectorAll('.attribute-values')).map(input => 
                input.value.split(',').map(val => val.trim()).filter(val => val)
            );

            // Check if values are provided
            if (attributeValues.some(values => values.length === 0)) {
                alert('Please provide values for all attributes.');
                return;
            }

            // Generate combinations
            const generateCombinations = (arrays, current = {}, index = 0) => {
                if (index === arrays.length) {
                    return [current];
                }

                return attributeValues[index].flatMap(item =>
                    generateCombinations(arrays, {
                        ...current,
                        [attributeNames[index]]: item
                    }, index + 1)
                );
            };

            const combinations = generateCombinations(attributeValues);

            // Generate variant rows
            const variantsTableBody = document.getElementById('variantsTableBody');
            variantsTableBody.innerHTML = '';

            const baseSku = document.getElementById('base_sku').value || document.getElementById('sku').value || 'PROD';
            const basePrice = document.getElementById('base_price').value || document.getElementById('regular_price').value || 0;
            const baseStock = document.getElementById('base_stock').value || document.getElementById('stock_quantity').value || 0;

            combinations.forEach((combination, index) => {
                const variantName = Object.values(combination).join(' / ');
                const variantSku = `${baseSku}-${index + 1}`;
                
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${variantName}</td>
                    <td>${variantSku}</td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control variant-price" 
                                   name="variants[${index}][price]" value="${basePrice}" step="0.01" min="0">
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control form-control-sm variant-stock" 
                               name="variants[${index}][stock_quantity]" value="${baseStock}" min="0">
                    </td>
                    <td>
                        <input type="hidden" name="variants[${index}][name]" value="${variantName}">
                        <input type="hidden" name="variants[${index}][sku]" value="${variantSku}">
                        ${Object.entries(combination).map(([key, value]) => `
                            <input type="hidden" name="variants[${index}][attributes][${key}]" value="${value}">
                        `).join('')}
                        <button type="button" class="btn btn-outline-light btn-sm variant-image-btn">
                            <i class="fas fa-image"></i>
                        </button>
                    </td>
                `;
                variantsTableBody.appendChild(row);
            });

            // Show variants table
            document.getElementById('variantsTable').classList.remove('d-none');
        });

        // Featured image preview
        document.getElementById('featured_image').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewContainer = document.querySelector('.featured-image-preview');
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid" style="max-height: 200px;">
                    <div class="image-actions mt-2 text-center">
                        <button type="button" class="btn btn-sm btn-light preview-image" title="Preview">
                            <i class="fas fa-eye"></i> Preview
                        </button>
                        <button type="button" class="btn btn-sm btn-danger remove-image" title="Remove">
                            <i class="fas fa-trash"></i> Remove
                        </button>
                    </div>
                `;

                // Add event listeners
                previewContainer.querySelector('.preview-image').addEventListener('click', function() {
                    document.getElementById('previewImage').src = e.target.result;
                    const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
                    previewModal.show();
                });

                previewContainer.querySelector('.remove-image').addEventListener('click', function() {
                    previewContainer.innerHTML = `
                        <div class="upload-placeholder">
                            <i class="fas fa-image fa-3x"></i>
                            <span>Set Featured Image</span>
                        </div>
                    `;
                    document.getElementById('featured_image').value = '';
                });
            };
            reader.readAsDataURL(file);
        });

        // Product images preview
        document.getElementById('images').addEventListener('change', function(e) {
            const files = e.target.files;
            if (!files.length) return;

            const previewContainer = document.getElementById('productImagesPreview');
            const uploadBox = previewContainer.querySelector('.image-upload-box');

            // Clear existing previews except the upload box
            previewContainer.innerHTML = '';
            previewContainer.appendChild(uploadBox);

            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const col = document.createElement('div');
                    col.className = 'col-md-4 col-6 mb-3';
                    col.innerHTML = `
                        <div class="image-preview-box position-relative">
                            <img src="${e.target.result}" class="img-fluid" style="height: 150px; object-fit: cover;">
                            <div class="image-actions position-absolute top-0 end-0 p-1">
                                <button type="button" class="btn btn-sm btn-light preview-image" title="Preview">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger remove-image" title="Remove">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    `;
                    previewContainer.insertBefore(col, uploadBox);

                    // Add event listeners
                    col.querySelector('.preview-image').addEventListener('click', function() {
                        document.getElementById('previewImage').src = e.target.result;
                        const previewModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));
                        previewModal.show();
                    });

                    col.querySelector('.remove-image').addEventListener('click', function() {
                        previewContainer.removeChild(col);
                        // Create a new DataTransfer object to update the files
                        const dataTransfer = new DataTransfer();
                        const input = document.getElementById('images');
                        Array.from(input.files).forEach((f, i) => {
                            if (i !== index) {
                                dataTransfer.items.add(f);
                            }
                        });
                        input.files = dataTransfer.files;
                    });
                };

                reader.readAsDataURL(file);
            });
        });

        // Auto-generate slug from product name
        document.getElementById('name').addEventListener('input', function() {
            const slugInput = document.getElementById('slug');
            if (!slugInput.value) {
                slugInput.value = this.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        });

        // Generate slug button
        document.getElementById('generateSlugBtn').addEventListener('click', function() {
            const nameInput = document.getElementById('name');
            const slugInput = document.getElementById('slug');
            slugInput.value = nameInput.value
                .toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        });

        // Form submission handling
        document.getElementById('productForm').addEventListener('submit', function(e) {
            // Validate variants if they exist
            if (document.getElementById('has_variants').checked && 
                document.getElementById('variantsTable').classList.contains('d-none')) {
                e.preventDefault();
                alert('Please generate variants before submitting the form.');
                return false;
            }
            return true;
        });
    </script>
</x-admin-layout>