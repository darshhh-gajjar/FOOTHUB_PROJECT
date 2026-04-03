


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products - KicksAdmin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.css') }}">
</head>

<body>
    <div class="d-flex" id="wrapper">
        @include('admin.layout.sidebar')
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Manage Products</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">All Products</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">ID</th>
                                    <th scope="col" width="300">Product</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price (Sale / MRP)</th>
                                    <th scope="col">Color</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="align-middle">
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            @php
                                                $images = json_decode($product->images, true);
                                                $mainImage = !empty($images) ? asset('uploads/products/' . $images[0]) : 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=100&q=80';
                                            @endphp
                                            <img src="{{ $mainImage }}" class="rounded me-3 border" width="50" height="50" style="object-fit: cover;" alt="{{ $product->name }}">
                                            <div>
                                                <h6 class="mb-0 fw-bold">{{ $product->name }}</h6>
                                                <small class="text-muted">{{ $product->brand_name }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge bg-light text-dark border">{{ $product->category_name ?? 'Uncategorized' }}</span></td>
                                    <td>
                                        <div class="fw-bold">₹ {{ number_format($product->sale_price, 2) }}</div>
                                        @if($product->mrp)
                                        <small class="text-decoration-line-through text-muted">₹ {{ number_format($product->mrp, 2) }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $product->color ?? 'N/A' }}</td>
                                    <td><span class="badge {{ $product->stock > 0 ? 'bg-success bg-opacity-10 text-success' : 'bg-danger bg-opacity-10 text-danger' }}">{{ $product->stock }} left</span></td>
                                    <td><span class="badge {{ $product->status == 'Active' ? 'bg-success' : 'bg-secondary' }}">{{ $product->status }}</span></td>
                                    <td>
                                        <a href="{{ route('admin.admin_edit_product', $product->id) }}" class="btn btn-sm btn-outline-primary me-1"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.admin_delete_product', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @if($products->isEmpty())
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">No products found. Add some!</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ url('admin/admin_add_product') }}" class="btn btn-success me-md-2" type="button">
                        <i class="fas fa-plus me-1"></i> Add New Product
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin/assets/js/script.js') }}"></script>
</body>

</html>
