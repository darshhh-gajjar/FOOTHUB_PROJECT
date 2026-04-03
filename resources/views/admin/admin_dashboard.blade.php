


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Footwear eCommerce</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('admin/assets/css/style.css') }}">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<!--
2 Include these two files 
-->
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

<!--
3 Call this single function 
-->
<script>
	$(document).ready(function() 
	{
		$('#table').DataTable();
	} );
</script>


</head>

<body>

    <div class="d-flex" id="wrapper">
        @include('admin.layout.sidebar')

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Dashboard</h2>
                </div>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ Auth::check() ? url('admin/admin_profile') : route('admin.login') }}">Profile</a></li>
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <!-- Summary Cards -->
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex flex-column rounded h-100">
                            <p class="text-muted fw-bold mb-1">Total Page Views</p>
                            <div class="d-flex align-items-center mb-2">
                                <h3 class="fs-2 mb-0 me-2">4,42,236</h3>
                                <span class="badge bg-primary-subtle text-primary rounded-pill"><i
                                        class="fas fa-arrow-up me-1"></i>59.3%</span>
                            </div>
                            <small class="text-muted">You made an extra <span class="text-primary fw-bold">35,000</span>
                                this year</small>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex flex-column rounded h-100">
                            <p class="text-muted fw-bold mb-1">Total Users</p>
                            <div class="d-flex align-items-center mb-2">
                                <h3 class="fs-2 mb-0 me-2">78,250</h3>
                                <span class="badge bg-success-subtle text-success rounded-pill"><i
                                        class="fas fa-arrow-up me-1"></i>70.5%</span>
                            </div>
                            <small class="text-muted">You made an extra <span class="text-success fw-bold">8,900</span>
                                this year</small>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex flex-column rounded h-100">
                            <p class="text-muted fw-bold mb-1">Total Order</p>
                            <div class="d-flex align-items-center mb-2">
                                <h3 class="fs-2 mb-0 me-2">18,800</h3>
                                <span class="badge bg-warning-subtle text-warning rounded-pill"><i
                                        class="fas fa-arrow-down me-1"></i>27.4%</span>
                            </div>
                            <small class="text-muted">You made an extra <span class="text-warning fw-bold">1,943</span>
                                this year</small>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="p-3 bg-white shadow-sm d-flex flex-column rounded h-100">
                            <p class="text-muted fw-bold mb-1">Total Sales</p>
                            <div class="d-flex align-items-center mb-2">
                                <h3 class="fs-2 mb-0 me-2">$35,078</h3>
                                <span class="badge bg-danger-subtle text-danger rounded-pill"><i
                                        class="fas fa-arrow-down me-1"></i>27.4%</span>
                            </div>
                            <small class="text-muted">You made an extra <span class="text-danger fw-bold">$20,395</span>
                                this year</small>
                        </div>
                    </div>
                </div>

                <!-- Charts Section -->
                <div class="row g-3 my-2">
                    <!-- Unique Visitor Chart -->
                    <div class="col-md-8">
                        <div class="p-3 bg-white shadow-sm rounded h-100">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h5 class="fw-bold">Unique Visitor</h5>
                                <div>
                                    <button class="btn btn-sm btn-outline-secondary">Month</button>
                                    <button class="btn btn-sm btn-primary">Week</button>
                                </div>
                            </div>
                            <canvas id="uniqueVisitorChart"></canvas>
                        </div>
                    </div>

                    <!-- Income Overview Chart -->
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm rounded h-100">
                            <div class="mb-4">
                                <h5 class="fw-bold">Income Overview</h5>
                                <p class="text-muted small mb-0">This Week Statistics</p>
                                <h3 class="fw-bold">$7,650</h3>
                            </div>
                            <canvas id="incomeOverviewChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders and New Customers -->
                <div class="row g-3 my-2">
                    <div class="col-md-8">
                        <div class="p-3 bg-white shadow-sm rounded h-100 table-responsive">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="fw-bold mb-0">Recent Orders</h5>
                                <a href="#" class="btn btn-sm btn-primary">View All</a>
                            </div>
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">#1234</th>
                                        <td>Nike Air Jordan</td>
                                        <td>John Doe</td>
                                        <td>$120</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#1235</th>
                                        <td>Adidas Yeezy</td>
                                        <td>Jane Smith</td>
                                        <td>$250</td>
                                        <td><span class="badge bg-warning text-dark">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#1236</th>
                                        <td>Fila Disruptor</td>
                                        <td>Mike Johnson</td>
                                        <td>$85</td>
                                        <td><span class="badge bg-info text-dark">Processing</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#1237</th>
                                        <td>Puma RS-X</td>
                                        <td>Emily Davis</td>
                                        <td>$110</td>
                                        <td><span class="badge bg-danger">Cancelled</span></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">#1238</th>
                                        <td>Reebok Classic</td>
                                        <td>Chris Brown</td>
                                        <td>$75</td>
                                        <td><span class="badge bg-success">Completed</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 bg-white shadow-sm rounded h-100">
                            <h5 class="fw-bold mb-3">New Customers</h5>
                            <ul class="list-group list-group-flush">
                                @forelse($recentUsers as $user)
                                <li class="list-group-item d-flex align-items-center px-0 border-0">
                                    <div class="me-3">
                                        <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-0 fw-bold">{{ $user->name }}</h6>
                                        <small class="text-muted">{{ $user->email }}</small>
                                    </div>
                                    <span class="text-muted small">{{ $user->created_at->diffForHumans() }}</span>
                                </li>
                                @empty
                                <li class="list-group-item border-0 text-center text-muted">No new users found.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('admin/assets/js/script.js') }}"></script>
</body>

</html>



