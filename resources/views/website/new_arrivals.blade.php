@extends('website.layouts.app')

@section('title', 'New Arrivals - FILA India')

@section('content')
<div class="container-fluid px-lg-5 py-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent p-0 mb-4">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-muted text-decoration-none">Home</a></li>
            <li class="breadcrumb-item active text-dark fw-bold" aria-current="page">New Arrivals</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 d-none d-lg-block pe-5">
            <h5 class="fw-bold text-uppercase mb-4">Filters</h5>
            
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase mb-3 small">Category</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="cat1">
                    <label class="form-check-label small text-muted" for="cat1">Footwear</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="cat2">
                    <label class="form-check-label small text-muted" for="cat2">Apparel</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="cat3">
                    <label class="form-check-label small text-muted" for="cat3">Accessories</label>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="fw-bold text-uppercase mb-3 small">Size</h6>
                <div class="d-flex flex-wrap gap-2">
                    <button class="btn btn-outline-secondary btn-sm rounded-0" style="min-width: 40px;">UK 6</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-0" style="min-width: 40px;">UK 7</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-0" style="min-width: 40px;">UK 8</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-0" style="min-width: 40px;">UK 9</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-0" style="min-width: 40px;">UK 10</button>
                    <button class="btn btn-outline-secondary btn-sm rounded-0" style="min-width: 40px;">UK 11</button>
                </div>
            </div>

            <div class="mb-4">
                <h6 class="fw-bold text-uppercase mb-3 small">Price</h6>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="price1">
                    <label class="form-check-label small text-muted" for="price1">Under ₹ 2000</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="price2">
                    <label class="form-check-label small text-muted" for="price2">₹ 2000 - ₹ 5000</label>
                </div>
                <div class="form-check mb-2">
                    <input class="form-check-input rounded-0" type="checkbox" id="price3">
                    <label class="form-check-label small text-muted" for="price3">Above ₹ 5000</label>
                </div>
            </div>
        </div>

        <!-- Product Grid -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="text-uppercase fw-bold text-navy mb-0">New Arrivals</h2>
                <div class="d-flex align-items-center">
                    <span class="text-muted small me-2">Sort By:</span>
                    <select class="form-select form-select-sm border-0 fw-bold text-navy" style="width: auto; cursor: pointer;">
                        <option selected>Newest First</option>
                        <option value="1">Price: Low to High</option>
                        <option value="2">Price: High to Low</option>
                        <option value="3">Popularity</option>
                    </select>
                </div>
            </div>
            
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4">
                <!-- Product 1 -->
                <div class="col">
                    <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                             <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Performance Runner</p>
                            <div class="price-row">
                                <span>₹ 5,999</span>
                                <span class="original-price">₹ 7,999</span>
                                <span class="discount-off">(25% OFF)</span>
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
                <!-- Product 2 -->
                <div class="col">
                    <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1491553895911-0055eca6402d?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 2">
                            </a>
                           <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                             <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Classic Sneaker Black</p>
                             <div class="price-row">
                                <span>₹ 4,499</span>
                                <span class="original-price">₹ 5,999</span>
                                <span class="discount-off">(25% OFF)</span>
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
                <!-- Product 3 -->
                <div class="col">
                   <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 3">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                             <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Red Impact</p>
                             <div class="price-row">
                                <span>₹ 6,299</span>
                                <span class="original-price">₹ 7,999</span>
                                <span class="discount-off">(21% OFF)</span>
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
                <!-- Product 4 -->
                <div class="col">
                    <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1527011046414-4781f1f94f8c?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 4">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                              <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Urban Trekker</p>
                             <div class="price-row">
                                <span>₹ 5,199</span>
                                <span class="original-price">₹ 6,999</span>
                                <span class="discount-off">(26% OFF)</span>
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
                 <!-- Product 5 -->
                 <div class="col">
                   <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1515955656352-a1fa3ffcd111?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 5">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                            <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Blue Running</p>
                             <div class="price-row">
                                <span>₹ 4,899</span>
                                <span class="original-price">₹ 6,499</span>
                                <span class="discount-off">(25% OFF)</span>
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
                <!-- Product 6 -->
                 <div class="col">
                   <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 6">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                            <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Court White</p>
                             <div class="price-row">
                                <span>₹ 3,599</span>
                                <span class="original-price">₹ 4,999</span>
                                <span class="discount-off">(28% OFF)</span>
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
                  <!-- Product 7 -->
                  <div class="col">
                     <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 7">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                            <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Air Force Style</p>
                             <div class="price-row">
                                <span>₹ 6,499</span>
                                <span class="original-price">₹ 8,999</span>
                                <span class="discount-off">(28% OFF)</span>
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
                  <!-- Product 8 -->
                  <div class="col">
                     <div class="card h-100 border-0 product-card myntra-card">
                        <div class="position-relative overflow-hidden">
                            <a href="{{ route('product.detail', ['id' => 1]) }}">
                                <img src="https://images.unsplash.com/photo-1579338559194-a162d19bd842?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="New Arrival 8">
                            </a>
                            <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                            <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">NEW</span>
                        </div>
                        <div class="card-body px-3 pt-3 pb-2">
                            <h6 class="brand-name">FILA</h6>
                            <p class="product-name">Street Runner</p>
                             <div class="price-row">
                                <span>₹ 5,299</span>
                                <span class="original-price">₹ 6,999</span>
                                <span class="discount-off">(24% OFF)</span>
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
