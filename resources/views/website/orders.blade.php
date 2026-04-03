@extends('website.layouts.app')

@section('title', 'My Orders - FOOT HUB')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar -->
        @include('website.layouts.user_sidebar')

        <!-- Content -->
        <div class="col-md-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4 text-uppercase border-bottom pb-2 text-navy">My Orders</h5>

                    <!-- Dummy Order Item 1 -->
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold text-uppercase small text-muted">Order #FH-12345</span>
                                <span class="mx-2 text-muted">|</span>
                                <span class="small text-muted">Placed on 12 Feb 2026</span>
                            </div>
                            <span class="badge bg-success rounded-0">Delivered</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('website/assets/images/men/1.jpg') }}" alt="Product" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-1">FILA Men's Running Shoes</h6>
                                    <p class="text-muted small mb-0">Size: 9 | Qty: 1</p>
                                    <p class="fw-bold text-navy mb-0">₹ 2,499</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top-0 text-end">
                            <a href="#" class="btn btn-outline-navy btn-sm rounded-0 text-uppercase fw-bold">View Details</a>
                            <a href="#" class="btn btn-navy btn-sm rounded-0 text-uppercase fw-bold ms-2">Track Order</a>
                        </div>
                    </div>

                    <!-- Dummy Order Item 2 -->
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-header bg-white border-bottom-0 d-flex justify-content-between align-items-center">
                            <div>
                                <span class="fw-bold text-uppercase small text-muted">Order #FH-67890</span>
                                <span class="mx-2 text-muted">|</span>
                                <span class="small text-muted">Placed on 10 Jan 2026</span>
                            </div>
                            <span class="badge bg-warning text-dark rounded-0">Shipped</span>
                        </div>
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('website/assets/images/women/2.jpg') }}" alt="Product" class="rounded me-3" style="width: 80px; height: 80px; object-fit: cover;">
                                <div>
                                    <h6 class="fw-bold mb-1">FILA Women's Sportswear</h6>
                                    <p class="text-muted small mb-0">Size: M | Qty: 1</p>
                                    <p class="fw-bold text-navy mb-0">₹ 1,899</p>
                                </div>
                            </div>
                        </div>
                         <div class="card-footer bg-white border-top-0 text-end">
                            <a href="#" class="btn btn-outline-navy btn-sm rounded-0 text-uppercase fw-bold">View Details</a>
                            <a href="#" class="btn btn-navy btn-sm rounded-0 text-uppercase fw-bold ms-2">Track Order</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
