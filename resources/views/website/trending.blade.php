@extends('website.layouts.app')

@section('title', 'Trending Now - FILA India')

@section('content')
<div class="container py-5">
    <h1 class="text-center fw-bold mb-5 text-uppercase">Trending Now</h1>
    
    <div class="row row-cols-1 row-cols-md-4 g-4">
        <!-- Product 1 -->
        <div class="col">
            <div class="card h-100 border-0 product-card myntra-card">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('product.detail', ['id' => 1]) }}">
                        <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 1">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Blaze Runner</p>
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
        <!-- Product 2 -->
        <div class="col">
            <div class="card h-100 border-0 product-card myntra-card">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('product.detail', ['id' => 1]) }}">
                        <img src="https://images.unsplash.com/photo-1595950653106-6c9ebd614d3a?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 2">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">White Fire</p>
                    <div class="price-row">
                        <span>₹ 7,299</span>
                        <span class="original-price">₹ 9,999</span>
                        <span class="discount-off">(27% OFF)</span>
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
                        <img src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 3">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Retro High</p>
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
        <!-- Product 4 -->
        <div class="col">
            <div class="card h-100 border-0 product-card myntra-card">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('product.detail', ['id' => 1]) }}">
                        <img src="https://images.unsplash.com/photo-1606107557195-0e29a4b5b4aa?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 4">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Tech Speed</p>
                    <div class="price-row">
                        <span>₹ 8,199</span>
                        <span class="original-price">₹ 10,999</span>
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
        <!-- Product 5 -->
        <div class="col">
            <div class="card h-100 border-0 product-card myntra-card">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('product.detail', ['id' => 1]) }}">
                        <img src="https://images.unsplash.com/photo-1552346154-21d32810aba3?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 5">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Gold Standard</p>
                    <div class="price-row">
                        <span>₹ 9,999</span>
                        <span class="original-price">₹ 12,999</span>
                        <span class="discount-off">(23% OFF)</span>
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
                        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 6">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Urban Drift</p>
                    <div class="price-row">
                        <span>₹ 6,899</span>
                        <span class="original-price">₹ 8,999</span>
                        <span class="discount-off">(23% OFF)</span>
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
                        <img src="https://images.unsplash.com/photo-1605348532760-6753d2c43329?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 7">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Velocity Pink</p>
                    <div class="price-row">
                        <span>₹ 5,599</span>
                        <span class="original-price">₹ 7,599</span>
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
        <!-- Product 8 -->
        <div class="col">
            <div class="card h-100 border-0 product-card myntra-card">
                <div class="position-relative overflow-hidden">
                    <a href="{{ route('product.detail', ['id' => 1]) }}">
                        <img src="https://images.unsplash.com/photo-1515347619252-60a6bf4fffce?auto=format&fit=crop&w=400&q=80" class="card-img-top rounded-0" alt="Trending 8">
                    </a>
                    <form action="{{ route('wishlist.store') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>
                    <span class="badge bg-white text-muted shadow-sm position-absolute bottom-0 start-0 m-2 px-1 rounded small fw-bold" style="font-size: 10px;">TRENDING</span>
                </div>
                <div class="card-body px-3 pt-3 pb-2">
                    <h6 class="brand-name">FILA</h6>
                    <p class="product-name">Future Step</p>
                    <div class="price-row">
                        <span>₹ 7,499</span>
                        <span class="original-price">₹ 9,499</span>
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
    </div>
</div>
@endsection
