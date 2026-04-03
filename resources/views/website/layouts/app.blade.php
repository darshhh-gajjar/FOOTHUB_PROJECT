<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Foot Hub | Sportswear, Tennis, Running, Training & Fitness')</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    @stack('styles')
</head>
<body>

    <!-- Header / Navbar -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white sticky-top border-bottom">
        <div class="container-fluid px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}" style="font-family: 'Russo One', sans-serif; transform: skewX(-10deg);">
                <i class="fas fa-shoe-prints text-danger fs-3"></i>
                <span class="text-navy fs-2">FOOT</span><span class="text-danger fs-2">HUB</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav gap-4 text-uppercase fw-bold text-dark">
                    <li class="nav-item"><a class="nav-link text-navy" href="{{ route('new.arrivals') }}">New Arrivals</a></li>
                    <li class="nav-item"><a class="nav-link text-navy" href="{{ route('men') }}">Men</a></li>
                    <li class="nav-item"><a class="nav-link text-navy" href="{{ route('women') }}">Women</a></li>
                    <li class="nav-item"><a class="nav-link text-navy" href="{{ route('kids') }}">Kids</a></li>
                    <li class="nav-item"><a class="nav-link text-navy" href="{{ route('tennis') }}">Tennis</a></li>
                    <li class="nav-item"><a class="nav-link text-navy" href="{{ route('heritage') }}">Heritage</a></li>
                    <li class="nav-item"><a class="nav-link text-danger" href="{{ route('sale') }}">Sale</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center gap-3">
                <div class="input-group d-none d-lg-flex border-bottom border-dark" style="width: 200px;">
                    <input type="text" class="form-control border-0 rounded-0 px-0 bg-transparent" placeholder="Search">
                    <button class="btn btn-link text-dark p-0 text-decoration-none"><i class="fas fa-search"></i></button>
                </div>
                <div class="d-flex gap-3 align-items-center">
                    @auth
                    <div class="nav-item dropdown">
                        <a class="nav-link text-navy d-flex align-items-center gap-1 p-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="far fa-user fs-5"></i>
                            <span class="d-none d-md-inline small fw-bold">{{ strtok(auth()->user()->name, ' ') }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end rounded-0 shadow-sm mt-3 border-0" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item small py-2" href="{{ route('profile') }}"><i class="far fa-id-card me-2 text-muted"></i>Profile</a></li>
                            <li><a class="dropdown-item small py-2" href="{{ route('my.orders') }}"><i class="fas fa-box me-2 text-muted"></i>Orders</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item small py-2 text-danger fw-bold"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="text-navy text-decoration-none" title="Login / Register">
                        <i class="far fa-user fs-5"></i>
                    </a>
                    @endauth
                    <a href="{{ route('wishlist') }}" class="text-navy text-decoration-none position-relative">
                        <i class="far fa-heart fs-5"></i>
                        @auth
                            @php $wishlistCount = \App\Models\wishlist::where('user_id', auth()->id())->count(); @endphp
                            @if($wishlistCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger text-white" style="font-size: 10px;">{{ $wishlistCount }}</span>
                            @endif
                        @endauth
                    </a>
                    <a href="{{ route('cart') }}" class="text-navy text-decoration-none position-relative">
                        <i class="fas fa-shopping-bag fs-5"></i>
                        @auth
                            @php $cartCount = \App\Models\cart::where('user_id', auth()->id())->count(); @endphp
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-danger text-white" style="font-size: 10px;">{{ $cartCount }}</span>
                            @endif
                        @endauth
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-light text-navy pt-5 pb-3">
        <div class="container">
            <div class="row g-4 mb-5">
                <div class="col-lg-4">
                    <h5 class="fw-bold mb-4 text-uppercase">Stay in the loop</h5>
                    <p class="small text-muted mb-3">Sign up for exclusive offers, original stories, activism awareness, events and more.</p>
                    <form class="mb-3">
                        <div class="input-group border-bottom border-dark">
                            <input type="email" class="form-control border-0 bg-transparent px-0" placeholder="Enter your email">
                            <button class="btn btn-link text-navy p-0 text-decoration-none fw-bold text-uppercase">Sign Up</button>
                        </div>
                    </form>
                    <div class="d-flex gap-3 mt-4">
                        <a href="#" class="text-navy fs-5"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-navy fs-5"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-navy fs-5"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-navy fs-5"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-6 col-lg-2 offset-lg-1">
                    <h5 class="fw-bold mb-3 text-uppercase small">Products</h5>
                    <ul class="list-unstyled small text-muted gap-2 d-flex flex-column">
                        <li><a href="{{ route('men') }}" class="text-decoration-none text-muted hover-danger">Men</a></li>
                        <li><a href="{{ route('women') }}" class="text-decoration-none text-muted hover-danger">Women</a></li>
                        <li><a href="{{ route('kids') }}" class="text-decoration-none text-muted hover-danger">Kids</a></li>
                        <li><a href="{{ route('tennis') }}" class="text-decoration-none text-muted hover-danger">Tennis</a></li>
                        <li><a href="{{ route('heritage') }}" class="text-decoration-none text-muted hover-danger">Heritage</a></li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <h5 class="fw-bold mb-3 text-uppercase small">Support</h5>
                    <ul class="list-unstyled small text-muted gap-2 d-flex flex-column">
                        <li><a href="{{ route('contact') }}" class="text-decoration-none text-muted hover-danger">Contact Us</a></li>
                        <li><a href="{{ route('delivery.returns') }}" class="text-decoration-none text-muted hover-danger">Shipping & Returns</a></li>
                        <li><a href="{{ route('size.guide') }}" class="text-decoration-none text-muted hover-danger">Size Guide</a></li>
                        <li><a href="{{ route('faq') }}" class="text-decoration-none text-muted hover-danger">FAQ</a></li>
                        <li><a href="{{ route('store.locator') }}" class="text-decoration-none text-muted hover-danger">Store Locator</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold mb-3 text-uppercase small">Company</h5>
                    <ul class="list-unstyled small text-muted gap-2 d-flex flex-column">
                        <li><a href="#" class="text-decoration-none text-muted hover-danger">About Foot Hub</a></li>
                        <li><a href="#" class="text-decoration-none text-muted hover-danger">Careers</a></li>
                        <li><a href="#" class="text-decoration-none text-muted hover-danger">Terms & Conditions</a></li>
                        <li><a href="#" class="text-decoration-none text-muted hover-danger">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary opacity-25">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small text-muted">&copy; 2026 Foot Hub. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <span class="opacity-50 d-inline-flex align-items-center gap-2" style="font-family: 'Russo One', sans-serif; transform: skewX(-10deg);">
                        <i class="fas fa-shoe-prints text-navy fs-4"></i>
                        <span class="text-navy fs-3">FOOT</span><span class="text-danger fs-3">HUB</span>
                    </span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if(session('success'))
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    timer: 3000,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false
                });
            @endif
            @if(session('error'))
                Swal.fire({
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    icon: 'error',
                    timer: 3000,
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false
                });
            @endif
        });
    </script>
    <script src="{{ url('js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
