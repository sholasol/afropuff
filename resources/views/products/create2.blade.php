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
    
            <form id="productForm" method="POST" action="{{ route('storeProduct') }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="productStatus" name="status" value="published">
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
                                <div class="mb-3" style="background-color: #fff;">
                                    <label for="productDescription" class="form-label">Description*</label>
                                    <textarea class="form-control" id="editor" name="description" rows="6" required></textarea>
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
                    </div>
    
                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <div class="dashboard-card mb-4" style="background-color: #48575c;">
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
                                <small class="text-white">This image will be used in product listings and social sharing.</small>
                            </div>
                        </div>
                    
                        <div class="dashboard-card mb-4" style="background-color: #44626b;">
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
                                        <input type="text" class="form-control" id="newCategory" placeholder="New category name">
                                        <button class="btn btn-outline-light" type="button" id="addCategoryBtn">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <div class="dashboard-card mb-4" style="background-color: #44626b;">
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
                    <a href="{{ route('products') }}" class="btn btn-outline-light">Go to Products</a>
                    <a href="#" class="btn btn-orange" id="viewProductBtn">View Product</a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Quill editor
            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image'],
                        ['clean']
                    ]
                },
                placeholder: 'Enter product description...',
            });

            // Get the hidden input field for description
            const descriptionInput = document.querySelector('input[name="description"]');
            
            // Update the hidden input when Quill content changes
            quill.on('text-change', function() {
                const html = document.querySelector('.ql-editor').innerHTML;
                descriptionInput.value = html;
            });

            // Toggle sale schedule fields
            document.getElementById('scheduleSale').addEventListener('change', function() {
                document.querySelector('.sale-schedule').classList.toggle('d-none', !this.checked);
            });

            // Generate slug from product name
            document.getElementById('productName').addEventListener('input', function() {
                const slugInput = document.getElementById('productSlug');
                if (!slugInput.value) {
                    slugInput.value = this.value.toLowerCase()
                        .replace(/\s+/g, '-')           // Replace spaces with -
                        .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                        .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                        .replace(/^-+/, '')             // Trim - from start of text
                        .replace(/-+$/, '');            // Trim - from end of text
                }
            });

            // Handle adding new category
            document.getElementById('addCategoryBtn').addEventListener('click', function() {
                const categoryName = document.getElementById('newCategory').value.trim();
                if (!categoryName) {
                    alert('Please enter a category name');
                    return;
                }

                axios.post('{{ route("createCategory") }}', { name: categoryName })
                    .then(response => {
                        const category = response.data.category;
                        const categoriesContainer = document.querySelector('.dashboard-card:nth-of-type(2) .card-body .mb-3');
                        
                        // Create new checkbox for the category
                        const div = document.createElement('div');
                        div.className = 'form-check';
                        div.innerHTML = `
                            <input class="form-check-input" type="checkbox" value="${category.id}" id="category${category.id}" name="categories[]" checked>
                            <label class="form-check-label text-white" for="category${category.id}">${category.name}</label>
                        `;
                        
                        categoriesContainer.appendChild(div);
                        document.getElementById('newCategory').value = '';
                        
                        // Show success message
                        alert('Category added successfully!');
                    })
                    .catch(error => {
                        console.error('Error adding category:', error);
                        alert(error.response?.data?.message || 'Error adding category. Please try again.');
                    });
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
                        document.querySelector('.featured-image-input').value = '';
                    });
                };

                reader.readAsDataURL(file);
            });

            // Form submission
            document.getElementById('productForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                const formData = new FormData(this);
                const isDraft = e.submitter?.id === 'saveAsDraftBtn';
                
                if (isDraft) {
                    document.getElementById('productStatus').value = 'draft';
                } else {
                    document.getElementById('productStatus').value = 'published';
                }
                
                // Submit the form
                this.submit();
            });
        });
    </script>
    @endpush
</x-admin-layout>