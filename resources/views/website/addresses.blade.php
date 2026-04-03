@extends('website.layouts.app')

@section('title', 'My Addresses - FOOT HUB')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <!-- Sidebar -->
        @include('website.layouts.user_sidebar')

        <!-- Content -->
         <div class="col-md-9">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                         <h5 class="fw-bold text-uppercase mb-0 text-navy">My Addresses</h5>
                         <button class="btn btn-navy btn-sm rounded-0 text-uppercase fw-bold"><i class="fas fa-plus me-2"></i> Add New Address</button>
                    </div>

                    <div class="row g-3">
                        <!-- Current Address (from DB) -->
                        <div class="col-md-6">
                            <div class="card h-100 border shadow-sm rounded-0">
                                <div class="card-body position-relative">
                                    <span class="badge bg-navy position-absolute top-0 end-0 m-2 rounded-0">Default</span>
                                    <h6 class="fw-bold mb-2">John Doe</h6>
                                    <p class="text-muted small mb-2">
                                        123, Sports Avenue<br>
                                        Mumbai, Maharashtra - 400001<br>
                                        India
                                    </p>
                                    <p class="text-muted small mb-3">
                                        <strong>Phone:</strong> +91 9876543210
                                    </p>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-outline-navy btn-sm rounded-0 text-uppercase fw-bold w-50">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm rounded-0 text-uppercase fw-bold w-50">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Dummy Address 2 -->
                         <div class="col-md-6">
                            <div class="card h-100 border shadow-sm rounded-0">
                                <div class="card-body position-relative">
                                    <h6 class="fw-bold mb-2">Work</h6>
                                    <p class="text-muted small mb-2">
                                        123, Corporate Park, Near City Mall<br>
                                        Mumbai, Maharashtra - 400053<br>
                                        India
                                    </p>
                                    <p class="text-muted small mb-3">
                                        <strong>Phone:</strong> +91 9876543210
                                    </p>
                                     <div class="d-flex gap-2">
                                        <button class="btn btn-outline-navy btn-sm rounded-0 text-uppercase fw-bold w-50">Edit</button>
                                        <button class="btn btn-outline-danger btn-sm rounded-0 text-uppercase fw-bold w-50">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
