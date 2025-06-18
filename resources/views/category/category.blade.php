<x-admin-layout>
    <div class="categories-content py-4">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="text-white mb-0">Categories</h2>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal" data-mode="create">
                            <i class="fas fa-plus me-2"></i>Add New Category
                        </button>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="dashboard-card mb-4">
                <div class="card-header">
                    <h5 class="card-title">Category List</h5>
                </div>
                <div class="card-body">
                    @if ($categories->isEmpty())
                        <p class="text-muted">No categories found.</p>
                    @else
                        <div class="table-responsive">
                            <table class="table table-dark table-hover">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Products</th>
                                        <th width="20%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="categoriesTableBody">
                                    @foreach($categories as $key => $category)
                                        <tr data-category-id="{{ $category->id }}">
                                            <td>{{$key+1}}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>{{ $category->products_count }}</td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-outline-light edit-category-btn me-2"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#categoryModal{{ $category->id }}"
                                                        data-mode="edit"
                                                        data-id="{{ $category->id }}"
                                                        data-name="{{ $category->name }}"
                                                        data-slug="{{ $category->slug }}">
                                                    <i class="fas fa-edit"></i> Edit
                                                </button>
                                                <a href="{{route('deleteCategory', ['category' => $category->id])}}" onclick="return confirm('Are you sure, you want to delete this?')" class="btn btn-sm btn-outline-danger delete-category-btn">
                                                    <i class="fas fa-trash"></i> Delete
                                                </a>
                                            </td>

                                             <!--Delete Category Modal -->
                                            <div class="modal fade" id="categoryModal{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="categoryModalLabel">Update Category</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('updateCategory', ['category' => $category->id])}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" id="categoryId" name="id">
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label for="categoryName" class="form-label">Category Name*</label>
                                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="categoryName" name="name" value="{{ $category->name }}" required>
                                                                    @error('name')
                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary" id="saveCategoryBtn">Update Category</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Category Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="categoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('createCategory')}}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="categoryId" name="id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="categoryName" class="form-label">Category Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="categoryName" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" id="saveCategoryBtn">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this category? This action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                </div>
            </div>
        </div>
    </div>

    
</x-admin-layout>