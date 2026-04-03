<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders - KicksAdmin</title>
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
                    <h2 class="fs-2 m-0">Manage Orders</h2>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Recent Orders</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">#</th>
                                    <th scope="col">Customer</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1001</th>
                                    <td>John Doe</td>
                                    <td>2023-10-25</td>
                                    <td>$120.00</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                    <td>
                                        <a class="btn btn-sm btn-info text-white" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1002</th>
                                    <td>Jane Smith</td>
                                    <td>2023-10-26</td>
                                    <td>$85.50</td>
                                    <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    <td>
                                        <a class="btn btn-sm btn-info text-white" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1003</th>
                                    <td>Mike Johnson</td>
                                    <td>2023-10-26</td>
                                    <td>$210.00</td>
                                    <td><span class="badge bg-primary">Shipped</span></td>
                                    <td>
                                        <a class="btn btn-sm btn-info text-white" href="#"><i class="fas fa-eye"></i></a>
                                        <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin/assets/js/script.js') }}"></script>
</body>

</html>
