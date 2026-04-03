@extends('website.layouts.app')

@section('title', 'Disruptor II Premium - FILA India')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-transparent p-0 mb-0 small text-uppercase">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url(strtolower($product->category_name ?? '')) }}" class="text-decoration-none text-muted">{{ $product->category_name ?? 'Category' }}</a></li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="card border-0 shadow-sm mb-5">
        <div class="card-body p-4">
            <div class="row">
        <!-- Product Images -->
        <div class="col-lg-7 mb-5 mb-lg-0">
            @php
                $images = json_decode($product->images, true);
                if (empty($images)) {
                    $images = ['https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=800&q=80'];
                } else {
                    foreach ($images as $k => $img) {
                        $images[$k] = asset('uploads/products/' . $img);
                    }
                }
            @endphp
             <div class="row g-2">
                <div class="col-2">
                    <div class="d-flex flex-column gap-2">
                        @foreach($images as $index => $imgData)
                        <div class="thumbnail-item">
                            <img src="{{ $imgData }}" 
                                 class="img-fluid p-1 cursor-pointer img-thumbnail rounded-0 w-100 {{ $index == 0 ? 'opacity-100 border border-dark' : 'opacity-50 border-0' }}" 
                                 onclick="changeImage(this, '{{ $imgData }}')" 
                                 alt="Thumbnail {{ $index + 1 }}">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-10">
                    <div class="bg-white d-flex align-items-center justify-content-center h-100 border border-light">
                        <img src="{{ $images[0] }}" id="mainImage" class="img-fluid" style="max-height: 600px; object-fit: contain;" alt="{{ $product->name }}">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Details -->
        <div class="col-lg-5 ps-lg-5">
            <h1 class="display-6 fw-bold mb-1 text-uppercase text-navy">{{ $product->name }}</h1>
            <p class="text-muted mb-4 small text-uppercase">{{ $product->brand_name }}</p>
            
            <div class="d-flex align-items-center gap-3 mb-4 border-bottom pb-4">
                <span class="fs-3 fw-bold text-navy">₹ {{ number_format($product->sale_price, 2) }}</span>
                @if($product->mrp && $product->mrp > $product->sale_price)
                <span class="text-muted text-decoration-line-through fs-5">₹ {{ number_format($product->mrp, 2) }}</span>
                @php
                    $discount = (($product->mrp - $product->sale_price) / $product->mrp) * 100;
                @endphp
                 <span class="badge bg-danger text-white rounded-0 px-3 py-2">{{ round($discount) }}% OFF</span>
                @endif
            </div>
            
            <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <label class="fw-bold small text-uppercase">Select Size</label>
                    <a href="{{ route('size.guide') }}" class="text-muted small text-decoration-underline">Size Guide</a>
                </div>
                <div class="d-flex flex-wrap gap-2">
                    @php
                        $sizes = json_decode($product->sizes, true) ?? ['6','7','8','9','10'];
                    @endphp
                    @foreach($sizes as $index => $size)
                    <button type="button" class="btn {{ $index == 1 ? 'btn-navy text-white border-navy' : 'btn-outline-dark' }} rounded-0 px-0 py-2 fw-bold size-btn" style="width: 50px;" data-size="{{ $size }}" onclick="selectSize(this)">{{ $size }}</button>
                    @endforeach
                </div>
            </div>
            
            <div class="d-grid gap-2 mb-5">
                 <a href="{{ route('checkout') }}" class="btn btn-danger btn-sm w-100 fw-bold text-uppercase mb-1" style="font-size: 20px;">Buy Now</a>
                 
                <form action="{{ route('cart.store') }}" method="POST" class="w-100 m-0">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="size" id="selected-size-cart" value="{{ $sizes[1] ?? ($sizes[0] ?? '') }}">
                    <button type="submit" class="btn w-100 btn-warning btn-lg rounded-0 fw-bold text-uppercase py-3">Add to Bag</button>
                </form>
                
                @php
                    $mainWishlistItem = auth()->check() ? \App\Models\wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->first() : null;
                @endphp
                @if($mainWishlistItem)
                <form action="{{ route('wishlist.destroy', $mainWishlistItem->id) }}" method="POST" class="w-100 m-0">
                    @csrf
                    <button type="submit" class="btn w-100 btn-outline-navy btn-lg rounded-0 fw-bold text-uppercase py-3" style="border-color: #ff3366; color: #ff3366;" title="Remove from Wishlist"><i class="fas fa-heart me-2"></i> Added to Wishlist</button>
                </form>
                @else
                <form action="{{ route('wishlist.store') }}" method="POST" class="w-100 m-0">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn w-100 btn-outline-navy btn-lg rounded-0 fw-bold text-uppercase py-3" title="Add to Wishlist"><i class="far fa-heart me-2"></i> Add to Wishlist</button>
                </form>
                @endif
            </div>
            
            <!-- Accordion -->
            <div class="accordion accordion-flush bg-transparent" id="productAccordion">
                <div class="accordion-item bg-transparent border-bottom border-secondary">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button fw-bold bg-transparent shadow-none text-uppercase text-navy ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Description
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#productAccordion">
                        <div class="accordion-body ps-0 text-muted small">
                            {{ $product->description ?: 'No description available for this product.' }}
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent border-bottom border-secondary">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed fw-bold bg-transparent shadow-none text-uppercase text-navy ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Product Details
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#productAccordion">
                        <div class="accordion-body ps-0 text-muted small">
                            <ul class="list-unstyled mb-0">
                                @if($product->upper_material)<li class="mb-1"><strong>Upper Material:</strong> {{ $product->upper_material }}</li>@endif
                                @if($product->sole_material)<li class="mb-1"><strong>Sole Material:</strong> {{ $product->sole_material }}</li>@endif
                                @if($product->closure)<li class="mb-1"><strong>Closure:</strong> {{ $product->closure }}</li>@endif
                                @if($product->fit)<li class="mb-1"><strong>Fit:</strong> {{ $product->fit }}</li>@endif
                                @if($product->color)<li class="mb-1"><strong>Color:</strong> {{ $product->color }}</li>@endif
                                <li class="mb-1"><strong>Stock:</strong> {{ $product->stock }} items</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent border-bottom border-secondary">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed fw-bold bg-transparent shadow-none text-uppercase text-navy ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Shipping & Returns
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#productAccordion">
                        <div class="accordion-body ps-0 text-muted small">
                            <p class="mb-2"><i class="fas fa-truck me-2"></i> Free standard shipping on orders over ₹999.</p>
                            <p class="mb-0"><i class="fas fa-undo me-2"></i> Easy 15-day return policy. Items must be unworn and in original packaging.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
    
    <!-- You May Also Like -->
    <div class="mt-5 pt-5 border-top">
        <h3 class="text-center fw-bold text-uppercase text-navy mb-5">You May Also Like</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            @foreach($related_products as $related)
            <div class="col">
                <div class="card h-100 border-0 product-card">
                    <a href="{{ route('product.detail', ['id' => $related->id]) }}">
                        @php
                            $r_images = json_decode($related->images, true);
                            $r_img = !empty($r_images) ? asset('uploads/products/' . $r_images[0]) : 'https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=400&q=80';
                        @endphp
                         <img src="{{ $r_img }}" class="card-img-top rounded-0" style="height: 250px; object-fit: cover;" alt="{{ $related->name }}">
                    </a>
                    <div class="card-body px-0 pt-3 text-center">
                        <h5 class="card-title fs-6 fw-bold mb-1 text-navy text-uppercase">{{ $related->name }}</h5>
                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <span class="fw-bold text-navy fs-6">₹ {{ number_format($related->sale_price, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            
            @if($related_products->isEmpty())
            <div class="col-12 text-center text-muted">
                No related products found.
            </div>
            @endif
        </div>
    </div>
</div>

<script>
    function selectSize(element) {
        document.querySelectorAll('.size-btn').forEach(btn => {
            btn.classList.remove('btn-navy', 'text-white', 'border-navy');
            btn.classList.add('btn-outline-dark');
        });
        element.classList.remove('btn-outline-dark');
        element.classList.add('btn-navy', 'text-white', 'border-navy');
        
        let size = element.getAttribute('data-size');
        document.getElementById('selected-size-cart').value = size;
    }

    function changeImage(element, src) {
        document.getElementById('mainImage').src = src;
        
        // Reset styles for all thumbnails
        document.querySelectorAll('.img-thumbnail').forEach(el => {
            el.classList.remove('opacity-100', 'border-dark');
            el.classList.add('opacity-50', 'border-0');
        });
        
        // Set styles for clicked thumbnail
        element.classList.remove('opacity-50', 'border-0');
        element.classList.add('opacity-100', 'border', 'border-dark');
    }
</script>
@endsection
