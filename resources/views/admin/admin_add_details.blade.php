<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Details - KicksAdmin</title>
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
                    <h2 class="fs-2 m-0">Add Product Details</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <div class="col-lg-8">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Add Details needed for Products</h5>
                                <form action="#" method="POST">
                                    <div class="mb-3">
                                        <label for="productSelect" class="form-label">Select Product</label>
                                        <select class="form-select" id="productSelect" required>
                                            <option selected disabled>Choose a product...</option>
                                            <option value="1">Fila Disruptor II</option>
                                            <option value="2">Fila Ray Tracer</option>
                                            <option value="3">Fila Grant Hill 2</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="detailName" class="form-label">Detail Name</label>
                                        <input type="text" class="form-control" id="detailName" placeholder="e.g. Material, Warranty, Origin" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="detailValue" class="form-label">Detail Value</label>
                                        <textarea class="form-control" id="detailValue" rows="3" placeholder="e.g. 100% Leather" required></textarea>
                                    </div>
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">Save Details</button>
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
