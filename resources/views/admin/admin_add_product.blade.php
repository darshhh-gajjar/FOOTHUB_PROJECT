


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - KicksAdmin</title>
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
                    <h2 class="fs-2 m-0">Add Product</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Create New Product</h5>
                                <form action="{{ route('admin.admin_add_product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Brand Name</label>
                                        <input type="text" class="form-control" name="brand_name" id="productName" placeholder="e.g. Fila Disruptor II" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="productName" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" name="name" id="productName" placeholder="e.g. Fila Jordan II" required>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="productPrice" class="form-label">Sale Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="sale_price" id="productPrice" placeholder="0.00" step="0.01" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productMRP" class="form-label">Original Price (MRP)</label>
                                            <div class="input-group">
                                                <span class="input-group-text">₹</span>
                                                <input type="number" class="form-control" name="mrp" id="productMRP" placeholder="0.00" step="0.01">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="productStock" class="form-label">Stock Quantity</label>
                                            <input type="number" class="form-control" name="stock" id="productStock" placeholder="0" min="0" required>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="productCategory" class="form-label">Category</label>
                                            <select class="form-select" name="category_id" id="productCategory" required>
                                                <option selected disabled>Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="productColor" class="form-label">Color</label>
                                            <input type="text" class="form-control" name="color" id="productColor" placeholder="e.g. White/Navy/Red">
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label">Available Sizes</label>
                                        <div class="d-flex flex-wrap gap-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="6" id="size6">
                                                <label class="form-check-label" for="size6">6</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="7" id="size7">
                                                <label class="form-check-label" for="size7">7</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="8" id="size8">
                                                <label class="form-check-label" for="size8">8</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="9" id="size9">
                                                <label class="form-check-label" for="size9">9</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="10" id="size10">
                                                <label class="form-check-label" for="size10">10</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="11" id="size11">
                                                <label class="form-check-label" for="size11">11</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="sizes[]" value="12" id="size12">
                                                <label class="form-check-label" for="size12">12</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <h6 class="mb-3 mt-2 text-muted text-uppercase small fw-bold">Product Specifications</h6>
                                        <div class="col-md-6 mb-3">
                                            <label for="upperMaterial" class="form-label">Upper Material</label>
                                            <input type="text" class="form-control" name="upper_material" id="upperMaterial" placeholder="e.g. Premium Leather">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="soleMaterial" class="form-label">Sole Material</label>
                                            <input type="text" class="form-control" name="sole_material" id="soleMaterial" placeholder="e.g. Ruby/EVA">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="closureType" class="form-label">Closure</label>
                                            <select class="form-select" name="closure" id="closureType">
                                                <option selected disabled>Select Closure</option>
                                                <option value="Lace-Up">Lace-Up</option>
                                                <option value="Slip-On">Slip-On</option>
                                                <option value="Velcro">Velcro</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="fitType" class="form-label">Fit</label>
                                            <select class="form-select" name="fit" id="fitType">
                                                <option selected disabled>Select Fit</option>
                                                <option value="Regular">Regular</option>
                                                <option value="Narrow">Narrow</option>
                                                <option value="Wide">Wide</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="productDescription" class="form-label">Description</label>
                                        <textarea class="form-control" name="description" id="productDescription" rows="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="productImages" class="form-label">Product Images (Select Multiple)</label>
                                        <input type="file" class="form-control" name="images[]" id="productImages" multiple>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Add Product</button>
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
