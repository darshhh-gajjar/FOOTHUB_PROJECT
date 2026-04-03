@extends('website.layouts.app')

@section('title', 'Store Locator - Foot Hub India')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold text-uppercase mb-5">Find a Store</h2>
    <div class="row g-4">
        <!-- Store 1 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Foot Hub Mumbai</h5>
                    <p class="card-text text-muted">Thinking Mall, Lower Parel<br>Mumbai, Maharashtra 400013</p>
                    <p class="card-text"><small class="text-muted"><i class="fas fa-phone me-2"></i>+91 22 1234 5678</small></p>
                    <a href="#" class="btn btn-outline-navy btn-sm">Get Directions</a>
                </div>
            </div>
        </div>
        <!-- Store 2 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Foot Hub Delhi</h5>
                    <p class="card-text text-muted">Select Citywalk, Saket<br>New Delhi, Delhi 110017</p>
                    <p class="card-text"><small class="text-muted"><i class="fas fa-phone me-2"></i>+91 11 8765 4321</small></p>
                    <a href="#" class="btn btn-outline-navy btn-sm">Get Directions</a>
                </div>
            </div>
        </div>
        <!-- Store 3 -->
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title fw-bold">Foot Hub Bangalore</h5>
                    <p class="card-text text-muted">Phoenix Marketcity, Whitefield<br>Bangalore, Karnataka 560048</p>
                    <p class="card-text"><small class="text-muted"><i class="fas fa-phone me-2"></i>+91 80 1122 3344</small></p>
                    <a href="#" class="btn btn-outline-navy btn-sm">Get Directions</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
