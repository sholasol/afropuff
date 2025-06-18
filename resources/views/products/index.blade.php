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
                    <form action="{{ route('products') }}" method="GET">
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-select" name="category">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                    <option value="">All Statuses</option>
                                    <option value="in-stock" {{ request('stock_status') == 'in-stock' ? 'selected' : '' }}>In Stock</option>
                                    <option value="out-of-stock" {{ request('stock_status') == 'out-of-stock' ? 'selected' : '' }}>Out of Stock</option>
                                    <option value="backorder" {{ request('stock_status') == 'backorder' ? 'selected' : '' }}>Back order</option>
                                </select>
                            </div>
                            <!-- Other filter fields -->
                            <div class="col-md-3 mb-3">
                                <label class="form-label">Sort By</label>
                                <select class="form-select" name="sort">
                                    <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest First</option>
                                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest First</option>
                                    <option value="price-low" {{ request('sort') == 'price-low' ? 'selected' : '' }}>Price: Low to High</option>
                                    <option value="price-high" {{ request('sort') == 'price-high' ? 'selected' : '' }}>Price: High to Low</option>
                                </select>
                            </div>
                            <div class="col-md-3 mb-3">
                                <div class="d-flex justify-content-end mt-5">
                                    <a href="{{ route('products') }}" class="btn btn-outline-light me-2">Reset</a>
                                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>

            <!-- Products Table -->
                <div class="table-responsive">
                    <table class="table table-dark table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Sales</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product )
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($product->featuredImage)
                                        <img src="{{ asset('storage/' . $product->featuredImage) }}" alt="{{ $product->name }}" class="product-thumb" style="height:40px; width:40px;">
                                    @else
                                        <img src="{{asset('img/vape.jpg')}}" alt="No image" class="product-thumb">
                                    @endif
                                </td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->sku}}</td>
                                <td>
                                    @foreach ($product->categories as $cat)
                                    {{$cat->name}},
                                    @endforeach
                                </td>
                                <td>${{$product->regular_price}}</td>
                                <td>${{$product->sale_price}}</td>
                                <td>
                                    @if($product->stock_quantity > 10)
                                        <span class="badge bg-success">In Stock</span>
                                    @elseif($product->stock_quantity > 0)
                                        <span class="badge bg-warning">Low Stock</span>
                                    @else
                                        <span class="badge bg-danger">Out of Stock</span>
                                    @endif
                                </td>
                                <td>{{$product->created_at->format('Y-m-d')}}</td>
                                <td>
                                    <div class="action-buttons">
                                        <a href="{{ route('editProduct', $product->id) }}" class="btn btn-sm btn-outline-light" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('deleteProduct', $product->id) }}" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Delete this product?')">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        <a href="{{route('productGallery', $product->id)}}" class="btn btn-sm btn-outline-light" title="View" target="_blank">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $products->links() }}
            </div>
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
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
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

        // Handle bulk delete
        document.getElementById('bulkDeleteBtn').addEventListener('click', function() {
            const selectedIds = Array.from(document.querySelectorAll('.product-select:checked'))
                .map(checkbox => checkbox.value);
            
            if (selectedIds.length === 0) {
                alert('Please select at least one product to delete');
                return;
            }

            if (confirm(`Are you sure you want to delete ${selectedIds.length} selected product(s)?`)) {
                document.getElementById('selectedIds').value = JSON.stringify(selectedIds);
                document.getElementById('bulkDeleteForm').submit();
            }
        });

        // Handle single delete confirmation
        let productIdToDelete = null;

        function confirmDelete(productId) {
            productIdToDelete = productId;
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.show();
        }

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            if (productIdToDelete) {
                // Create a form for single delete
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/products/${productIdToDelete}`;
                
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = document.querySelector('meta[name="csrf-token"]').content;
                
                const method = document.createElement('input');
                method.type = 'hidden';
                method.name = '_method';
                method.value = 'DELETE';
                
                form.appendChild(csrf);
                form.appendChild(method);
                document.body.appendChild(form);
                form.submit();
            }
        });

        // Search functionality
        document.getElementById('productSearch').addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('tbody tr');
            
            rows.forEach(row => {
                const productName = row.querySelector('td:nth-child(4)').textContent.toLowerCase();
                const productSku = row.querySelector('td:nth-child(5)').textContent.toLowerCase();
                const productCategory = row.querySelector('td:nth-child(6)').textContent.toLowerCase();
                
                if (productName.includes(searchTerm) || productSku.includes(searchTerm) || productCategory.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
</x-admin-layout>