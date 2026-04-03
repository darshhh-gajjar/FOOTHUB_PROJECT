@extends('website.layouts.app')

@section('title', 'Tennis Collection - FILA India')

@section('content')
<div class="container-fluid px-lg-5 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
             <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">Tennis</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 d-none d-lg-block pe-5">
            <h5 class="fw-bold text-uppercase mb-4">Filters</h5>
            
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase mb-3 small">Type</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="type1">
                    <label class="form-check-label small text-muted" for="type1">Shoes</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="type2">
                    <label class="form-check-label small text-muted" for="type2">Apparel</label>
                </div>
                 <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="type3">
                    <label class="form-check-label small text-muted" for="type3">Equipment</label>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="fw-bold text-uppercase mb-3 small">Surface</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="surf1">
                    <label class="form-check-label small text-muted" for="surf1">Hard Court</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="surf2">
                    <label class="form-check-label small text-muted" for="surf2">Clay</label>
                </div>
                 <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="surf3">
                    <label class="form-check-label small text-muted" for="surf3">Grass</label>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="fw-bold text-uppercase mb-3 small">Price</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="price1">
                    <label class="form-check-label small text-muted" for="price1">Under ₹ 4000</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="price2">
                    <label class="form-check-label small text-muted" for="price2">Above ₹ 4000</label>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-uppercase fw-bold text-navy mb-0">Tennis Collection</h2>
                <div class="d-flex align-items-center">
                    <span class="text-muted small me-2">Sort By:</span>
                    <select class="form-select form-select-sm border-0 fw-bold text-navy" style="width: auto; cursor: pointer;">
                        <option selected>New Arrivals</option>
                        <option value="1">Price: Low to High</option>
                        <option value="2">Price: High to Low</option>
                        <option value="3">Popularity</option>
                    </select>
                </div>
            </div>
            
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
                @foreach($products as $product)
                <div class="col">
                    <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                                @php
                                    $images = json_decode($product->images, true);
                                    $mainImage = !empty($images) ? asset('uploads/products/' . $images[0]) : 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=400&q=80';
                                @endphp
                                <img src="{{ $mainImage }}" class="card-img-top rounded-0" style="height: 300px; object-fit: cover;" alt="{{ $product->name }}">
                            </a>
                            @php
                                $wishlistItem = auth()->check() ? \App\Models\wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->first() : null;
                            @endphp
                            @if($wishlistItem)
                            <form action="{{ route('wishlist.destroy', $wishlistItem->id) }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;" title="Remove from Wishlist">
                                    <i class="fas fa-heart small" style="color: #ff3366;"></i>
                                </button>
                            </form>
                            @else
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;" title="Add to Wishlist">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                            @endif
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
                <div class="col-12 text-center py-5 w-100">
                    <p class="text-muted">No products available in this category yet. Please check back later!</p>
                </div>
                @endif
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-5">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link rounded-0" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link rounded-0" href="#">1</a></li>
                        <li class="page-item"><a class="page-link rounded-0" href="#">2</a></li>
                        <li class="page-item"><a class="page-link rounded-0" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link rounded-0" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
