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
                            <button type="button" class="btn btn-primary me-2" id="saveAsDraftBtn">Save as
                                Draft</button>
                            <button type="button" class="btn btn-success" id="publishProductBtn">Publish
                                Product</button>
                        </div>
                    </div>
                </div>
            </div>

            <form id="productForm">
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
                                    <input type="text" class="form-control" id="productName" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productSlug" class="form-label">Slug</label>
                                    <div class="input-group">
                                        <span class="input-group-text">vapexperience.com/product/</span>
                                        <input type="text" class="form-control" id="productSlug">
                                    </div>
                                    <small class="text-muted">Leave blank to auto-generate from product name.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="productSKU" class="form-label">SKU*</label>
                                    <input type="text" class="form-control" id="productSKU" required>
                                </div>
                                <div class="mb-3">
                                    <label for="productDescription" class="form-label">Description*</label>
                                    <textarea class="form-control" id="productDescription" rows="6" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="productShortDescription" class="form-label">Short Description</label>
                                    <textarea class="form-control" id="productShortDescription" rows="3"></textarea>
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
                                                    <input type="file" class="image-upload-input" accept="image/*"
                                                        multiple>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <small class="text-muted">Upload at least one image. First image will be used as the
                                        product thumbnail.</small>
                                </div>
                                <div class="mb-3">
                                    <label for="productVideo" class="form-label">Product Video URL (Optional)</label>
                                    <input type="url" class="form-control" id="productVideo"
                                        placeholder="YouTube or Vimeo URL">
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
                                            <input type="number" class="form-control" id="regularPrice" step="0.01"
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="salePrice" class="form-label">Sale Price</label>
                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" id="salePrice" step="0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="scheduleSale">
                                    <label class="form-check-label text-white" for="scheduleSale">Schedule Sale</label>
                                </div>
                                <div class="row sale-schedule d-none">
                                    <div class="col-md-6 mb-3">
                                        <label for="saleStart" class="form-label">Sale Start Date</label>
                                        <input type="date" class="form-control" id="saleStart">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="saleEnd" class="form-label">Sale End Date</label>
                                        <input type="date" class="form-control" id="saleEnd">
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
                                        <input type="number" class="form-control" id="stockQuantity" min="0"
                                            required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="lowStockThreshold" class="form-label">Low Stock Threshold</label>
                                        <input type="number" class="form-control" id="lowStockThreshold"
                                            min="0">
                                        <small class="text-muted">Get notified when stock reaches this level.</small>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="stockStatus" class="form-label">Stock Status</label>
                                    <select class="form-select" id="stockStatus">
                                        <option value="in-stock">In Stock</option>
                                        <option value="out-of-stock">Out of Stock</option>
                                        <option value="backorder">On Backorder</option>
                                    </select>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="manageStock" checked>
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
                                        <input type="number" class="form-control" id="weight" step="0.01">
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <label class="form-label">Dimensions (inches)</label>
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="length"
                                                placeholder="Length" step="0.01">
                                            <input type="number" class="form-control" id="width"
                                                placeholder="Width" step="0.01">
                                            <input type="number" class="form-control" id="height"
                                                placeholder="Height" step="0.01">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="shippingClass" class="form-label">Shipping Class</label>
                                    <select class="form-select" id="shippingClass">
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
                                    <input type="checkbox" class="form-check-input" id="hasVariants">
                                    <label class="form-check-label text-white" for="hasVariants">This product has multiple
                                        variants</label>
                                </div>
                                <div id="variantsSection" class="d-none">
                                    <div class="mb-3">
                                        <label class="form-label">Variant Attributes</label>
                                        <div class="variant-attributes">
                                            <div class="row mb-2">
                                                <div class="col-md-5">
                                                    <select class="form-select attribute-name">
                                                        <option value="nicotine">Nicotine Strength</option>
                                                        <option value="size">Size</option>
                                                        <option value="flavor">Flavor Intensity</option>
                                                        <option value="color">Color</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-7">
                                                    <input type="text" class="form-control attribute-values"
                                                        placeholder="Values (comma separated)">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-light btn-sm mt-2"
                                            id="addAttributeBtn">
                                            <i class="fas fa-plus me-1"></i>Add Another Attribute
                                        </button>
                                    </div>
                                    <div class="mb-3">
                                        <button type="button" class="btn btn-outline-light"
                                            id="generateVariantsBtn">Generate Variants</button>
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
                                                    <tr>
                                                        <td>Variant</td>
                                                        <td>Price</td>
                                                        <td>Stock</td>
                                                        <td>SKU</td>
                                                        <td>Image</td>
                                                    </tr>
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
                                    <select class="form-select" id="productStatus">
                                        <option value="published">Published</option>
                                        <option value="draft">Draft</option>
                                        <option value="pending">Pending Review</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="productVisibility" class="form-label">Visibility</label>
                                    <select class="form-select" id="productVisibility">
                                        <option value="public">Public</option>
                                        <option value="private">Private</option>
                                        <option value="password-protected">Password Protected</option>
                                    </select>
                                </div>
                                <div class="mb-3 password-protection d-none">
                                    <label for="productPassword" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="productPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="publishDate" class="form-label">Publish Date</label>
                                    <input type="datetime-local" class="form-control" id="publishDate">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="button" class="btn btn-orange" id="publishBtn">Publish</button>
                                    <button type="button" class="btn btn-outline-light" id="saveAsDraftBtn2">Save as
                                        Draft</button>
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
                                    <input type="file" class="featured-image-input" accept="image/*">
                                </div>
                                <small class="text-muted">This image will be used in product listings and social
                                    sharing.</small>
                            </div>
                        </div>

                        <div class="dashboard-card mb-4" style="background-color: #52cff2;">
                            <div class="card-header">
                                <h5 class="card-title">Categories</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="menthol"
                                            id="categoryMenthol">
                                        <label class="form-check-label text-white" for="categoryMenthol">Menthol</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="fruity"
                                            id="categoryFruity">
                                        <label class="form-check-label text-white" for="categoryFruity">Fruity</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="tropical"
                                            id="categoryTropical">
                                        <label class="form-check-label text-white" for="categoryTropical">Tropical</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="dessert"
                                            id="categoryDessert">
                                        <label class="form-check-label text-white" for="categoryDessert">Dessert</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="tobacco"
                                            id="categoryTobacco">
                                        <label class="form-check-label text-white" for="categoryTobacco">Tobacco</label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="newCategory" class="form-label">Add New Category</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="newCategory">
                                        <button class="btn btn-outline-light" type="button"
                                            id="addCategoryBtn">Add</button>
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
                                    <input type="text" class="form-control" id="productTags"
                                        placeholder="Enter tags separated by commas">
                                    <small class="text-muted">Example: menthol, cool, refreshing</small>
                                </div>
                                <div class="popular-tags">
                                    <label class="form-label">Popular Tags:</label>
                                    <div class="tag-buttons">
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">menthol</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">fruity</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">sweet</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">tropical</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">dessert</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">cool</button>
                                        <button type="button"
                                            class="btn btn-sm btn-outline-light tag-btn mb-1">refreshing</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>

    <!-- Image Preview Modal -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel"
        aria-hidden="true">
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
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel"
        aria-hidden="true">
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
                    <a href="products.html" class="btn btn-outline-light">Go to Products</a>
                    <a href="#" class="btn btn-orange" id="viewProductBtn">View Product</a>
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
            const attributeNames = Array.from(document.querySelectorAll('.attribute-name')).map(select => select
                .value);
            const attributeValues = Array.from(document.querySelectorAll('.attribute-values')).map(input => input
                .value.split(',').map(val => val.trim()));

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
                const variantName = combination.join(' / ');
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${variantName}</td>
                    <td>
                        <div class="input-group input-group-sm">
                            <span class="input-group-text">$</span>
                            <input type="number" class="form-control" value="${document.getElementById('regularPrice').value || ''}" step="0.01">
                        </div>
                    </td>
                    <td>
                        <input type="number" class="form-control form-control-sm" value="${document.getElementById('stockQuantity').value || '0'}" min="0">
                    </td>
                    <td>
                        <input type="text" class="form-control form-control-sm" value="${document.getElementById('productSKU').value || ''}-${index + 1}">
                    </td>
                    <td>
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
                        const previewModal = new bootstrap.Modal(document.getElementById(
                            'imagePreviewModal'));
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
                    const previewModal = new bootstrap.Modal(document.getElementById(
                        'imagePreviewModal'));
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
        document.getElementById('publishBtn').addEventListener('click', function() {
            if (validateForm()) {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });

        document.getElementById('saveAsDraftBtn').addEventListener('click', function() {
            document.getElementById('productStatus').value = 'draft';
            if (validateForm()) {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });

        document.getElementById('saveAsDraftBtn2').addEventListener('click', function() {
            document.getElementById('productStatus').value = 'draft';
            if (validateForm()) {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });

        document.getElementById('publishProductBtn').addEventListener('click', function() {
            document.getElementById('productStatus').value = 'published';
            if (validateForm()) {
                // Show success modal
                const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                successModal.show();
            }
        });

        // Form validation
        function validateForm() {
            const requiredFields = [{
                    id: 'productName',
                    label: 'Product Name'
                },
                {
                    id: 'productSKU',
                    label: 'SKU'
                },
                {
                    id: 'productDescription',
                    label: 'Description'
                },
                {
                    id: 'regularPrice',
                    label: 'Regular Price'
                },
                {
                    id: 'stockQuantity',
                    label: 'Stock Quantity'
                }
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

        // View product button in success modal
        document.getElementById('viewProductBtn').addEventListener('click', function(e) {
            e.preventDefault();
            window.open('../product-gallery.html', '_blank');
        });
    </script>
</x-admin-layout>
