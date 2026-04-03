<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product - KicksAdmin</title>
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
                    <h2 class="fs-2 m-0">Edit Product</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Edit Product</h5>
                                <form action="{{ route('admin.admin_update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="productBrand" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name" value="{{ $product->brand_name }}" id="productBrand" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ $product->name }}" id="productName" required>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="productPrice" class="form-label">Sale Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="sale_price" value="{{ $product->sale_price }}" id="productPrice" step="0.01" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productMRP" class="form-label">Original Price (MRP)</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="mrp" value="{{ $product->mrp }}" id="productMRP" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productStock" class="form-label">Stock Quantity</label>
                                            <input type="number" class="form-control" name="stock" value="{{ $product->stock }}" id="productStock" min="0" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="productCategory" class="form-label">Category</label>
                                            <select class="form-select" name="category_id" id="productCategory" required>
                                                <option disabled>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productColor" class="form-label">Color</label>
                                            <input type="text" class="form-control" name="color" value="{{ $product->color }}" id="productColor">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productStatus" class="form-label">Status</label>
                                            <select class="form-select" name="status" id="productStatus" required>
                                                <option value="Active" {{ $product->status == 'Active' ? 'selected' : '' }}>Active</option>
                                                <option value="Inactive" {{ $product->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Available Sizes</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            @php
                                                $selected_sizes = json_decode($product->sizes, true) ?? [];
                                            @endphp
                                            @foreach([6, 7, 8, 9, 10, 11, 12] as $size)
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="{{$size}}" id="size{{$size}}" {{ in_array($size, $selected_sizes) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="size{{$size}}">{{$size}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <h6 class="mb-3 mt-2 text-muted text-uppercase small fw-bold">Product Specifications</h6>
                                        <div class="col-md-6 mb-3">
                                            <label for="upperMaterial" class="form-label">Upper Material</label>
                                            <input type="text" class="form-control" name="upper_material" value="{{ $product->upper_material }}" id="upperMaterial">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="soleMaterial" class="form-label">Sole Material</label>
                                            <input type="text" class="form-control" name="sole_material" value="{{ $product->sole_material }}" id="soleMaterial">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="closureType" class="form-label">Closure</label>
                                            <select class="form-select" name="closure" id="closureType">
                                                <option disabled>Select Closure</option>
                                                <option value="Lace-Up" {{ $product->closure == 'Lace-Up' ? 'selected' : '' }}>Lace-Up</option>
                                                <option value="Slip-On" {{ $product->closure == 'Slip-On' ? 'selected' : '' }}>Slip-On</option>
                                                <option value="Velcro" {{ $product->closure == 'Velcro' ? 'selected' : '' }}>Velcro</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="fitType" class="form-label">Fit</label>
                                            <select class="form-select" name="fit" id="fitType">
                                                <option disabled>Select Fit</option>
                                                <option value="Regular" {{ $product->fit == 'Regular' ? 'selected' : '' }}>Regular</option>
                                                <option value="Narrow" {{ $product->fit == 'Narrow' ? 'selected' : '' }}>Narrow</option>
                                                <option value="Wide" {{ $product->fit == 'Wide' ? 'selected' : '' }}>Wide</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productDescription" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="productDescription" rows="4">{{ $product->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productImages" class="form-label">Product Images (Leave blank to keep current images)</label>
                                        <input type="file" class="form-control" name="images[]" id="productImages" multiple>
                                        @php
                                            $images = json_decode($product->images, true);
                                        @endphp
                                        @if($images)
                                            <div class="mt-2 d-flex gap-2">
                                                @foreach($images as $img)
                                                    <img src="{{ url('uploads/products/'.$img) }}" width="60" class="img-thumbnail" alt="Product Image">
                                                @endforeach
                                            </div>
                                        @endif
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Update Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin/assets/js/script.js') }}"></script>
</body>

</html>
