<x-admin-layout>
     <!-- Products Content -->
     <div class="products-content py-4">
        <div class="container-fluid">
            <!-- Action Bar -->
            <div class="action-bar mb-4">
                <div class="row align-items-center">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <a href="{{route('addProduct')}}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Add New Product
                        </a>
                        <button class="btn btn-outline-light ms-2" id="bulkDeleteBtn" disabled>
                            <i class="fas fa-trash me-2"></i>Delete Selected
                        </button>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search products..." id="productSearch">
                                <button class="btn btn-outline-light" type="button">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <button class="btn btn-outline-light ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#filterOptions">
                                <i class="fas fa-filter"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Options (Collapsed by default) -->
            <div class="collapse mb-4" id="filterOptions">
                <div class="filter-card">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Category</label>
                            <select class="form-select">
                                <option value="">All Categories</option>
                                <option value="menthol">Menthol</option>
                                <option value="fruity">Fruity</option>
                                <option value="tropical">Tropical</option>
                                <option value="dessert">Dessert</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Price Range</label>
                            <div class="input-group">
                                <input type="number" class="form-control" placeholder="Min">
                                <span class="input-group-text">-</span>
                                <input type="number" class="form-control" placeholder="Max">
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Stock Status</label>
                            <select class="form-select">
                                <option value="">All</option>
                                <option value="in-stock">In Stock</option>
                                <option value="low-stock">Low Stock</option>
                                <option value="out-of-stock">Out of Stock</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label">Sort By</label>
                            <select class="form-select">
                                <option value="newest">Newest First</option>
                                <option value="oldest">Oldest First</option>
                                <option value="price-low">Price: Low to High</option>
                                <option value="price-high">Price: High to Low</option>
                                <option value="name-asc">Name: A to Z</option>
                                <option value="name-desc">Name: Z to A</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-outline-light me-2">Reset</button>
                        <button class="btn btn-orange">Apply Filters</button>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                </div>
                            </th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Dark Menthol" class="product-thumb">
                            </td>
                            <td>Dark Menthol</td>
                            <td>VP-001</td>
                            <td>Menthol</td>
                            <td>$12.99</td>
                            <td>125</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2024-01-15</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(1)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Mixed Fruits" class="product-thumb">
                            </td>
                            <td>Mixed Fruits</td>
                            <td>VP-002</td>
                            <td>Fruity</td>
                            <td>$14.99</td>
                            <td>87</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2024-01-12</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(2)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Blushed Mango" class="product-thumb">
                            </td>
                            <td>Blushed Mango</td>
                            <td>VP-003</td>
                            <td>Tropical</td>
                            <td>$13.99</td>
                            <td>112</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2024-01-10</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(3)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Vanilla Dream" class="product-thumb">
                            </td>
                            <td>Vanilla Dream</td>
                            <td>VP-004</td>
                            <td>Dessert</td>
                            <td>$16.99</td>
                            <td>8</td>
                            <td><span class="badge bg-warning">Low Stock</span></td>
                            <td>2024-01-08</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(4)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Berry Blast" class="product-thumb">
                            </td>
                            <td>Berry Blast</td>
                            <td>VP-005</td>
                            <td>Fruity</td>
                            <td>$15.99</td>
                            <td>0</td>
                            <td><span class="badge bg-danger">Out of Stock</span></td>
                            <td>2024-01-05</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(5)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Cool Mint" class="product-thumb">
                            </td>
                            <td>Cool Mint</td>
                            <td>VP-006</td>
                            <td>Menthol</td>
                            <td>$11.99</td>
                            <td>95</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2024-01-03</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(6)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Strawberry Cream" class="product-thumb">
                            </td>
                            <td>Strawberry Cream</td>
                            <td>VP-007</td>
                            <td>Dessert</td>
                            <td>$14.49</td>
                            <td>63</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2023-12-28</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(7)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input product-select" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <img src="/placeholder.svg?height=40&width=40" alt="Watermelon Ice" class="product-thumb">
                            </td>
                            <td>Watermelon Ice</td>
                            <td>VP-008</td>
                            <td>Fruity</td>
                            <td>$13.49</td>
                            <td>78</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>2023-12-25</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{route('editProduct')}}" class="btn btn-sm btn-outline-light" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button class="btn btn-sm btn-outline-danger" title="Delete" onclick="confirmDelete(8)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <a href="../product-gallery.html" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <nav class="mt-4">
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this product? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
        </div>
    </div>
</div>
</div>


    <script>
        // Handle select all checkbox
        document.getElementById('selectAll').addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.product-select');
            checkboxes.forEach(checkbox => {
                checkbox.checked = this.checked;
            });
            updateBulkDeleteButton();
        });

        // Handle individual checkboxes
        document.querySelectorAll('.product-select').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkDeleteButton);
        });

        // Update bulk delete button state
        function updateBulkDeleteButton() {
            const checkboxes = document.querySelectorAll('.product-select:checked');
            const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            bulkDeleteBtn.disabled = checkboxes.length === 0;
        }

        // Handle delete confirmation
        let productIdToDelete = null;

        function confirmDelete(productId) {
            productIdToDelete = productId;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (productIdToDelete) {
                // Here you would typically make an API call to delete the product
                console.log(`Deleting product with ID: ${productIdToDelete}`);
                
                // For demo purposes, let's just hide the row
                const row = document.querySelector(`tr[data-product-id="${productIdToDelete}"]`);
                if (row) {
                    row.remove();
                }
                
                // Close the modal
                const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteModal'));
                deleteModal.hide();
                
                // Show success notification
                showNotification('Product deleted successfully!', 'success');
                
                // Reset the product ID
                productIdToDelete = null;
            }
        });

        // Search functionality
        document.getElementById('productSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const productName = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const productSku = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const productCategory = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productSku.includes(searchTerm) || productCategory.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-admin-layout>