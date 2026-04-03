@extends('website.layouts.app')

@section('title', 'My Wishlist - FILA India')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
        <h4 class="fw-bold m-0 text-uppercase text-navy">My Wishlist <span class="text-muted fs-6 fw-normal small">({{ isset($wishlists) ? count($wishlists) : 0 }} Items)</span></h4>
    </div>
        
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @if(isset($wishlists) && count($wishlists) > 0)
            @foreach($wishlists as $wishlist)
            @php
                $product = $wishlist->product;
                if(!$product) continue;
                $images = json_decode($product->images, true);
                $image = !empty($images) ? asset('uploads/products/'.$images[0]) : 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=400&q=80';
                $mrp = $product->mrp && $product->mrp > $product->sale_price ? $product->mrp : $product->sale_price;
                $discount = $mrp > $product->sale_price ? round((($mrp - $product->sale_price) / $mrp) * 100) : 0;
            @endphp
            <div class="col">
                <div class="card h-100 border-0 product-card myntra-card">
                    <div class="position-relative overflow-hidden">
                        <a href="{{ route('product.detail', ['id' => $product->id]) }}">
                            <img src="{{ $image }}" class="card-img-top rounded-0" style="height: 300px; object-fit: cover;" alt="{{ $product->name }}">
                        </a>
                        <form action="{{ route('wishlist.destroy', $wishlist->id) }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                            @csrf
                            <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                <i class="fas fa-times text-danger small"></i>
                            </button>
                        </form>
                    </div>
                    <div class="card-body px-3 pt-3 pb-2">
                        <h6 class="brand-name">{{ $product->brand_name }}</h6>
                        <p class="product-name">{{ $product->name }}</p>
                        <div class="price-row mb-2">
                            <span class="fw-bold text-navy">₹ {{ number_format($product->sale_price, 2) }}</span>
                            @if($mrp > $product->sale_price)
                            <span class="original-price text-muted text-decoration-line-through small">₹ {{ number_format($mrp, 2) }}</span>
                            <span class="discount-off text-danger small fw-bold">({{ $discount }}% OFF)</span>
                            @endif
                        </div>
                        <div class="myntra-actions d-grid gap-2">
                             <a href="{{ route('checkout') }}" class="btn btn-danger btn-sm w-100 fw-bold text-uppercase" style="font-size: 12px;">Buy Now</a>
                            <form action="{{ route('cart.store') }}" method="POST" class="w-100 m-0">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-warning btn-sm w-100 fw-bold text-uppercase" style="font-size: 12px;">Move to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12 text-center py-5 w-100">
                <h5 class="text-muted text-uppercase mb-3">Your Wishlist is Empty</h5>
                <a href="{{ route('home') }}" class="btn btn-navy rounded-0 px-4 py-2 text-uppercase fw-bold">Discover Products</a>
            </div>
        @endif
    </div>
</div>
@endsection
