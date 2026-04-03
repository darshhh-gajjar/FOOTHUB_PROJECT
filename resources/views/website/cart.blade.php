@extends('website.layouts.app')

@section('title', 'Shopping Cart - FILA India')

@section('content')
<div class="container py-5">
    <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <h4 class="fw-bold m-0 text-uppercase text-navy">Shopping Cart <span class="text-muted fs-6 fw-normal small">({{ isset($carts) ? count($carts) : 0 }} Items)</span></h4>
            </div>

            <!-- Cart Item Loop -->
            <div class="row g-4">
                <div class="col-12">
                    @php
                        $totalMRP = 0;
                        $totalSalePrice = 0;
                    @endphp
                    @if(isset($carts) && count($carts) > 0)
                        @foreach($carts as $cart)
                        @php
                            $product = $cart->product;
                            if(!$product) continue;
                            $images = json_decode($product->images, true);
                            $image = !empty($images) ? asset('uploads/products/'.$images[0]) : 'https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=200&q=80';
                            $mrp = $product->mrp && $product->mrp > $product->sale_price ? $product->mrp : $product->sale_price;
                            $totalMRP += $mrp * $cart->quantity;
                            $totalSalePrice += $product->sale_price * $cart->quantity;
                            $discount = $mrp > $product->sale_price ? round((($mrp - $product->sale_price) / $mrp) * 100) : 0;
                        @endphp
                        <!-- Cart List Item -->
                        <div class="card border-0 border-bottom rounded-0 p-3 mb-3">
                            <div class="row align-items-center">
                                <div class="col-3 col-md-2">
                                    <a href="{{ route('product.detail', $product->id) }}"><img src="{{ $image }}" class="img-fluid rounded-0 border border-light" alt="{{ $product->name }}"></a>
                                </div>
                                <div class="col-9 col-md-10">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <a href="{{ route('product.detail', $product->id) }}" class="text-decoration-none"><h6 class="fw-bold mb-1 text-uppercase text-navy">{{ $product->name }}</h6></a>
                                            <p class="text-muted small mb-1 text-uppercase">{{ $product->brand_name }}</p>
                                            <div class="d-flex align-items-center gap-3 mb-2">
                                                @if($cart->size) <span class="small fw-bold text-muted text-uppercase">Size: {{ $cart->size }}</span> @endif
                                                <span class="small fw-bold text-muted text-uppercase">Qty: {{ $cart->quantity }}</span>
                                            </div>
                                            <div class="d-flex align-items-center gap-2">
                                                <span class="fw-bold text-navy">₹ {{ number_format($product->sale_price, 2) }}</span>
                                                @if($mrp > $product->sale_price)
                                                <span class="text-muted text-decoration-line-through small">₹ {{ number_format($mrp, 2) }}</span>
                                                <span class="text-danger small fw-bold">{{ $discount }}% OFF</span>
                                                @endif
                                            </div>
                                        </div>
                                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST" class="m-0 p-0">
                                            @csrf
                                            <button type="submit" class="btn btn-link text-decoration-none text-muted small hover-text-danger p-0 border-0 bg-transparent" title="Remove"><i class="fas fa-times fs-5"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="text-center py-5">
                            <h5 class="text-muted text-uppercase">Your Cart is Empty</h5>
                            <a href="{{ route('home') }}" class="btn btn-navy mt-3 rounded-0 px-4 py-2 text-uppercase fw-bold">Continue Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card border-0 bg-light rounded-0 p-4 sticky-top" style="top: 100px;">
                <h6 class="fw-bold text-uppercase mb-3 small text-navy">Coupons</h6>
                <div class="input-group mb-4">
                    <span class="input-group-text bg-white border-end-0 rounded-0"><i class="fas fa-tag text-muted"></i></span>
                    <input type="text" class="form-control border-start-0 ps-0 rounded-0" placeholder="Enter Coupon Code">
                    <button class="btn btn-navy text-uppercase fw-bold small rounded-0 border-navy" type="button">Apply</button>
                </div>

                <h6 class="fw-bold text-uppercase mb-3 small text-navy">Order Summary</h6>
                <div class="d-flex justify-content-between mb-2 small text-muted">
                    <span>Total MRP</span>
                    <span>₹ {{ number_format(isset($totalMRP) ? $totalMRP : 0, 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2 small text-success">
                    <span>Discount on MRP</span>
                    <span>- ₹ {{ number_format((isset($totalMRP) ? $totalMRP : 0) - (isset($totalSalePrice) ? $totalSalePrice : 0), 2) }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3 small text-muted">
                    <span>Shipping Fee</span>
                    <span class="text-success fw-bold">FREE</span>
                </div>
                <hr class="my-3 border-secondary">
                <div class="d-flex justify-content-between fw-bold mb-4 fs-5 text-navy">
                    <span>Total Amount</span>
                    <span>₹ {{ number_format(isset($totalSalePrice) ? $totalSalePrice : 0, 2) }}</span>
                </div>
                <a href="{{ route('checkout') }}" class="btn btn-danger w-100 fw-bold text-uppercase py-3 rounded-0 hover-lift shadow-sm position-relative overflow-hidden {{ (isset($carts) && count($carts) > 0) ? '' : 'disabled' }}">
                    <span class="position-relative z-1">Proceed to Buy</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
