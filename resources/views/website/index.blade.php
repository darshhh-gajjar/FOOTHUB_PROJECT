@extends('website.layouts.app')

@section('title', 'FILA India | Sportswear, Tennis, Running, Training & Fitness')

@section('content')
    <!-- Hero Section -->
    <!-- Hero Section -->
    <!-- Hero Section -->
    <!-- Hero Section -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active bg-white"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" class="bg-white"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" class="bg-white"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://images.unsplash.com/photo-1552346154-21d32810aba3?auto=format&fit=crop&w=1920&h=800&q=90" class="d-block w-100" alt="New Arrivals" style="height: 85vh; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block text-start" style="left: 5%; bottom: 15%;">
                    <h5 class="text-uppercase fw-bold text-white mb-2" style="letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">New Collection</h5>
                    <h1 class="display-2 fw-bold text-white mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">STEP INTO STYLE</h1>
                    <a href="{{ route('men') }}" class="btn btn-light px-5 py-3 fw-bold rounded-0">SHOP NOW</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=1920&h=800&q=90" class="d-block w-100" alt="Tennis Performance" style="height: 85vh; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block text-start text-white" style="left: 5%; bottom: 15%;">
                    <h5 class="text-uppercase fw-bold mb-2" style="letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Performance</h5>
                    <h1 class="display-2 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">ACE YOUR GAME</h1>
                    <a href="{{ route('tennis') }}" class="btn btn-light px-5 py-3 fw-bold rounded-0">DISCOVER MORE</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.unsplash.com/photo-1519415943484-9fa1873496d4?auto=format&fit=crop&w=1920&h=800&q=90" class="d-block w-100" alt="Kids Shoes" style="height: 85vh; object-fit: cover;">
                <div class="carousel-caption d-none d-md-block text-start" style="left: 5%; bottom: 15%;">
                    <h5 class="text-uppercase fw-bold text-white mb-2" style="letter-spacing: 2px; text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">For Kids</h5>
                    <h1 class="display-2 fw-bold text-white mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">LITTLE STEPS</h1>
                    <a href="{{ route('kids') }}" class="btn btn-light px-5 py-3 fw-bold rounded-0">SHOP KIDS</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- New Arrivals -->
    <section class="container-fluid px-lg-5 py-5 bg-white">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-uppercase fw-bold text-navy">New Arrivals</h2>
            <a href="{{ route('men') }}" class="btn btn-link text-navy fw-bold text-decoration-none text-uppercase">View All <i class="fas fa-arrow-right ms-2"></i></a>
        </div>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
            @foreach($products as $product)
            <div class="col">
                <div class="card h-100 border-0 product-card myntra-card">
                    <div class="position-relative overflow-hidden">
                        <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                            @php
                                $images = json_decode($product->images, true);
                                $mainImage = !empty($images) ? asset('uploads/products/' . $images[0]) : 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=400&q=80';
                            @endphp
                            <img src="{{ $mainImage }}" class="card-img-top rounded-0" alt="{{ $product->name }}" style="height: 300px; object-fit: cover;">
                        </a>
                        <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                @php
                                    $inWishlist = auth()->check() ? \App\Models\wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->exists() : false;
                                @endphp
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="{{ $inWishlist ? 'fas text-danger' : 'far text-dark' }} fa-heart small"></i>
                                </button>
                            </form>
                        <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                    </div>
                    <div class="card-body px-3 pt-3 pb-2">
                        <h6 class="brand-name">{{ $product->brand_name }}</h6>
                        <p class="product-name">{{ $product->name }}</p>
                        <div class="price-row">
                            <span>₹ {{ number_format($product->sale_price, 2) }}</span>
                            @if($product->mrp && $product->mrp > $product->sale_price)
                            <span class="original-price">₹ {{ number_format($product->mrp, 2) }}</span>
                            @php
                                $discount = (($product->mrp - $product->sale_price) / $product->mrp) * 100;
                            @endphp
                            <span class="discount-off">({{ round($discount) }}% OFF)</span>
                            @endif
                        </div>
                        <div class="myntra-actions">
                            <a href="{{ route('checkout') }}" class="btn btn-danger btn-sm w-100 fw-bold text-uppercase mb-1" style="font-size: 12px;">Buy Now</a>
                            <form action="{{ route('cart.store') }}" method="POST" class="w-100 m-0 p-0">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-warning btn-sm w-100 fw-bold text-uppercase" style="font-size: 12px;">Add to Cart</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if($products->isEmpty())
            <div class="col-12 text-center py-5">
                <p class="text-muted">No products available at the moment. Coming soon!</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Shop by Category -->
    <section class="container-fluid px-lg-5 mb-5">
        <h2 class="text-center fw-bold text-uppercase mb-5 text-navy">Shop By Category</h2>
        <div class="row g-4 justify-content-center">
            @foreach(['Men', 'Women', 'Kids', 'Tennis', 'Heritage', 'Sale'] as $category)
            <div class="col-6 col-md-4 col-lg-2">
                <a href="{{ route(strtolower($category)) }}" class="text-decoration-none">
                    <div class="position-relative overflow-hidden mb-3">
                         <img src="https://source.unsplash.com/random/400x500/?{{ strtolower($category) }},fashion" class="w-100" style="height: 300px; object-fit: cover;" alt="{{ $category }}">
                         <div class="position-absolute bottom-0 start-0 w-100 bg-white py-2 text-center border-top border-dark">
                             <h6 class="fw-bold text-navy text-uppercase mb-0" style="letter-spacing: 1px;">{{ $category }}</h6>
                         </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Brand Heritage Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 order-md-2">
                    <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?auto=format&fit=crop&w=800&q=80" alt="Fila Heritage" class="img-fluid border border-white border-5 shadow-sm">
                </div>
                <div class="col-md-6 order-md-1">
                    <h2 class="display-5 fw-bold mb-4 text-uppercase text-navy">110 Years of Excellence</h2>
                    <p class="lead text-muted mb-4">From the foothills of the Italian Alps to the streets of the world, FILA has been a champion of style and performance since 1911.</p>
                    <a href="{{ route('heritage') }}" class="btn btn-outline-danger btn-lg px-5 rounded-0 text-uppercase">Explore Heritage</a>
                </div>
            </div>
        </div>
    </section>
@endsection
