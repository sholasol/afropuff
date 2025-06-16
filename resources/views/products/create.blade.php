<x-admin-layout>

    <div class="create-product-content py-4">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('products') }}" class="btn btn-outline-light">
                            <i class="fas fa-arrow-left me-2"></i>Back to Products
                        </a>
                        <div>
                            <button type="submit" class="btn btn-primary me-2" id="saveAsDraftBtn" form="productForm">Save as Draft</button>
                            <button type="submit" class="btn btn-success" id="publishProductBtn" form="productForm">Publish Product</button>
                        </div>
                    </div>
                </div>
            </div>
    
            <form id="productForm" method="POST" action="{{ route('storeProducts') }}" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" id="productName" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productSlug" class="form-label">Slug</label>
                                    <div class="input-group">
                                        <span class="input-group-text">{{ config('app.url') }}/product/</span>
                                        <input type="text" class="form-control" id="productSlug" name="slug">
                                    </div>
                                    <small class="text-muted">Leave blank to auto-generate from product name.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="productSKU" class="form-label">SKU*</label>
                                    <input type="text" class="form-control" id="productSKU" name="sku" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description*</label>
                                    <textarea class="form-control" id="productDescription" name="description" rows="6" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="productShortDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="productShortDescription" name="short_description" rows="3"></textarea>
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
                                            <div class="col-md-4 col-6">
                                                <div class="image-upload-box">
                                                    <div class="upload-placeholder">
                                                        <i class="fas fa-plus"></i>
                                                        <span>Add Image</span>
                                                    </div>
                                                    <input type="file" class="image-upload-input" accept="image/*" multiple name="images[]">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Upload at least one image. First image will be used as the product thumbnail.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="productVideo" class="form-label">Product Video URL (Optional)</label>
                                    <input type="url" class="form-control" id="productVideo" name="video_url" placeholder="YouTube or Vimeo URL">
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
                                            <input type="number" class="form-control" id="regularPrice" name="regular_price" step="0.01" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="salePrice" class="form-label">Sale Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="salePrice" name="sale_price" step="0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="scheduleSale" name="schedule_sale">
                                    <label class="form-check-label text-white" for="scheduleSale">Schedule Sale</label>
                                </div>
                                <div class="row sale-schedule d-none">
                                    <div class="col-md-6 mb-3">
                                        <label for="saleStart" class="form-label">Sale Start Date</label>
                                        <input type="date" class="form-control" id="saleStart" name="sale_start">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="saleEnd" class="form-label">Sale End Date</label>
                                        <input type="date" class="form-control" id="saleEnd" name="sale_end">
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
                                        <input type="number" class="form-control" id="stockQuantity" name="stock_quantity" min="0" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lowStockThreshold" class="form-label">Low Stock Threshold</label>
                                        <input type="number" class="form-control" id="lowStockThreshold" name="low_stock_threshold" min="0">
                                        <small class="text-muted">Get notified when stock reaches this level.</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stockStatus" class="form-label">Stock Status</label>
                                    <select class="form-select" id="stockStatus" name="stock_status">
                                        <option value="in-stock">In Stock</option>
                                        <option value="out-of-stock">Out of Stock</option>
                                        <option value="backorder">On Backorder</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="manageStock" name="manage_stock" checked>
                                    <label class="form-check-label text-white" for="manageStock">Track Inventory</label>
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
                                        <input type="number" class="form-control" id="weight" name="weight" step="0.01">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label">Dimensions (inches)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="length" name="length" placeholder="Length" step="0.01">
                                            <input type="number" class="form-control" id="width" name="width" placeholder="Width" step="0.01">
                                            <input type="number" class="form-control" id="height" name="height" placeholder="Height" step="0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingClass" class="form-label">Shipping Class</label>
                                    <select class="form-select" id="shippingClass" name="shipping_class">
                                        <option value="standard">Standard</option>
                                        <option value="express">Express</option>
                                        <option value="fragile">Fragile</option>
                                        <option value="hazardous">Hazardous Materials</option>
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
                                    <input type="checkbox" class="form-check-input" id="hasVariants" name="has_variants">
                                    <label class="form-check-label text-white" for="hasVariants">This product has multiple variants</label>
                                </div>
                                <div id="variantsSection" class="d-none">
                                    <div class="mb-3">
                                        <label class="form-label">Variant Attributes</label>
                                        <div class="variant-attributes">
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <select class="form-select attribute-name">
                                                        <option value="Nicotine Strength">Nicotine Strength</option>
                                                        <option value="Size">Size</option>
                                                        <option value="Flavor">Flavor</option>
                                                        <option value="Color">Color</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control attribute-values" placeholder="Values (comma separated)">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-light btn-sm mt-2" id="addAttributeBtn">
                                            <i class="fas fa-plus me-1"></i>Add Another Attribute
                                        </button>
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-light" id="generateVariantsBtn">Generate Variants</button>
                                    </div>
                                    <div id="variantsTable" class="d-none">
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
                                                    <!-- Variants will be generated here -->
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
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Publish</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="productStatus" class="form-label">Status</label>
                                    <select class="form-select" id="productStatus" name="status">
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending">Pending Review</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="productVisibility" class="form-label">Visibility</label>
                                    <select class="form-select" id="productVisibility" name="visibility">
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                        <option value="password-protected">Password Protected</option>
                                    </select>
                                </div>
                                <div class="mb-3 password-protection d-none">
                                    <label for="productPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="productPassword" name="password">
                                </div>
                                <div class="mb-3">
                                    <label for="publishDate" class="form-label">Publish Date</label>
                                    <input type="datetime-local" class="form-control" id="publishDate" name="publish_date">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-orange" id="publishBtn" form="productForm">Publish</button>
                                    <button type="submit" class="btn btn-outline-light" id="saveAsDraftBtn2" form="productForm">Save as Draft</button>
                                </div>
                            </div>
                        </div>
    
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Featured Image</h5>
                            </div>
                            <div class="card-body">
                                <div class="featured-image-uploader">
                                    <div class="featured-image-preview">
                                        <div class="upload-placeholder">
                                            <i class="fas fa-image"></i>
                                            <span>Set Featured Image</span>
                                        </div>
                                    </div>
                                    <input type="file" class="featured-image-input" accept="image/*" name="featured_image">
                                </div>
                                <small class="text-muted">This image will be used in product listings and social sharing.</small>
                            </div>
                        </div>
    
                        <div class="dashboard-card mb-4" style="background-color: #52cff2;">
                            <div class="card-header">
                                <h5 class="card-title">Categories</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    @foreach($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="{{ $category->id }}" id="category{{ $category->id }}" name="categories[]">
                                        <label class="form-check-label text-white" for="category{{ $category->id }}">{{ $category->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mb-3">
                                    <label for="newCategory" class="form-label">Add New Category</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="newCategory">
                                        <button class="btn btn-outline-light" type="button" id="addCategoryBtn">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="dashboard-card mb-4">
                            <div class="card-header">
                                <h5 class="card-title">Tags</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="productTags" class="form-label">Product Tags</label>
                                    <input type="text" class="form-control" id="productTags" name="tags" placeholder="Enter tags separated by commas">
                                    <small class="text-muted">Example: menthol, cool, refreshing</small>
                                </div>
                                <div class="popular-tags">
                                    <label class="form-label">Popular Tags:</label>
                                    <div class="tag-buttons">
                                        @foreach($tags as $tag)
                                        <button type="button" class="btn btn-sm btn-outline-light tag-btn mb-1">{{ $tag->name }}</button>
                                        @endforeach
                                    </div>
                                </div>
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
                    <h5 class="modal-title" id="successModalLabel">Product Created</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <i class="fas fa-check-circle text-success fa-4x"></i>
                        <h4 class="mt-3">Product Created Successfully!</h4>
                        <p>Your product has been created and is now available in your store.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-light">Go to Products</a>
                    <a href="#" class="btn btn-orange" id="viewProductBtn">View Product</a>
                </div>
            </div>
        </div>
    </div>


   

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Toggle sale schedule fields
        document.getElementById('scheduleSale').addEventListener('change', function() {
            document.querySelector('.sale-schedule').classList.toggle('d-none', !this.checked);
        });

        // Toggle password protection field
        document.getElementById('productVisibility').addEventListener('change', function() {
            document.querySelector('.password-protection').classList.toggle('d-none', this.value !== 'password-protected');
        });

        // Toggle variants section
        document.getElementById('hasVariants').addEventListener('change', function() {
            document.getElementById('variantsSection').classList.toggle('d-none', !this.checked);
        });

        // Add attribute row
        document.getElementById('addAttributeBtn').addEventListener('click', function() {
            const variantAttributes = document.querySelector('.variant-attributes');
            const newRow = document.createElement('div');
            newRow.className = 'row mb-2';
            newRow.innerHTML = `
                <div class="col-md-5">
                    <select class="form-select attribute-name">
                        <option value="Nicotine Strength">Nicotine Strength</option>
                        <option value="Size">Size</option>
                        <option value="Flavor">Flavor</option>
                        <option value="Color">Color</option>
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

        // Generate slug from product name
        document.getElementById('productName').addEventListener('input', function() {
            const slugInput = document.getElementById('productSlug');
            if (!slugInput.value) {
                axios.post('/api/products/generate-slug', { name: this.value })
                    .then(response => {
                        slugInput.value = response.data.slug;
                    })
                    .catch(error => {
                        console.error('Error generating slug:', error);
                    });
            }
        });

        // Generate variants
        document.getElementById('generateVariantsBtn').addEventListener('click', function() {
            const attributes = [];
            document.querySelectorAll('.attribute-name').forEach((nameInput, index) => {
                const valuesInput = document.querySelectorAll('.attribute-values')[index];
                attributes.push({
                    name: nameInput.value,
                    values: valuesInput.value
                });
            });

            axios.post('/api/products/generate-variants', {
                attributes: attributes,
                base_sku: document.getElementById('productSKU').value,
                base_price: document.getElementById('regularPrice').value,
                base_stock: document.getElementById('stockQuantity').value
            })
            .then(response => {
                const variantsTableBody = document.getElementById('variantsTableBody');
                variantsTableBody.innerHTML = '';

                response.data.variants.forEach(variant => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${variant.name}</td>
                        <td>
                            <div class="input-group input-group-sm">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" name="variants[${variant.sku}][price]" 
                                    value="${variant.price}" step="0.01" required>
                            </div>
                        </td>
                        <td>
                            <input type="number" class="form-control form-control-sm" 
                                name="variants[${variant.sku}][stock_quantity]" value="${variant.stock_quantity}" min="0" required>
                        </td>
                        <td>
                            <input type="text" class="form-control form-control-sm" 
                                name="variants[${variant.sku}][sku]" value="${variant.sku}" required>
                            <input type="hidden" name="variants[${variant.sku}][name]" value="${variant.name}">
                            <input type="hidden" name="variants[${variant.sku}][attributes]" value='${JSON.stringify(variant.attributes)}'>
                        </td>
                        <td>
                            <button type="button" class="btn btn-outline-light btn-sm variant-image-btn">
                                <i class="fas fa-image"></i>
                            </button>
                        </td>
                    `;
                    variantsTableBody.appendChild(row);
                });

                document.getElementById('variantsTable').classList.remove('d-none');
            })
            .catch(error => {
                console.error('Error generating variants:', error);
                alert('Error generating variants. Please check your attribute values.');
            });
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
                            <input type="hidden" name="images[]" value="${file.name}">
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
                    <input type="hidden" name="featured_image" value="${file.name}">
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
                        <input type="file" class="featured-image-input" accept="image/*">
                    `;
                    document.querySelector('.featured-image-input').addEventListener('change', arguments.callee);
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

        // Form submission
        document.getElementById('productForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const isDraft = e.submitter?.id === 'saveAsDraftBtn' || e.submitter?.id === 'saveAsDraftBtn2';
            
            if (isDraft) {
                document.getElementById('productStatus').value = 'draft';
            } else if (e.submitter?.id === 'publishProductBtn') {
                document.getElementById('productStatus').value = 'published';
            }
            
            // Add any additional form processing here
            
            this.submit();
        });

        // Initialize any plugins or additional functionality
        if (typeof CKEDITOR !== 'undefined') {
            CKEDITOR.replace('productDescription');
            CKEDITOR.replace('productShortDescription');
        }
    });
    </script>
</x-admin-layout>
