<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile - KicksAdmin</title>
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
                    <h2 class="fs-2 m-0">Admin Profile</h2>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
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
                <div class="row g-3 my-2">
                    <div class="col-md-4">
                        <div class="bg-white p-4 shadow-sm rounded text-center h-100">
                            <img src="https://via.placeholder.com/150" alt="Admin Avatar" class="rounded-circle mb-3"
                                width="120" height="120">
                            <h4 class="mb-1">John Doe</h4>
                            <p class="text-muted mb-3">Super Admin</p>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">Change Avatar</button>
                                <button class="btn btn-outline-danger">Delete Account</button>
                            </div>
                            <div class="mt-4 text-start">
                                <h6 class="border-bottom pb-2">Contact Info</h6>
                                <p class="mb-1"><i class="fas fa-envelope me-2 text-muted"></i> admin@kicks.com</p>
                                <p class="mb-1"><i class="fas fa-phone me-2 text-muted"></i> +1 234 567 890</p>
                                <p class="mb-1"><i class="fas fa-map-marker-alt me-2 text-muted"></i> New York, USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="bg-white p-4 shadow-sm rounded h-100">
                            <h4 class="mb-4">Edit Profile</h4>
                            <form>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" id="fullName" value="John Doe">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="userName" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="userName" value="admin_john">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" value="admin@kicks.com">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="tel" class="form-control" id="phone" value="+1 234 567 890">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="bio" class="form-label">Bio</label>
                                    <textarea class="form-control" id="bio"
                                        rows="3">Managing the Kicks store since 2020.</textarea>
                                </div>
                                <h5 class="mt-4 mb-3">Security</h5>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" id="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" id="confirmPassword">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
                            </form>
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





