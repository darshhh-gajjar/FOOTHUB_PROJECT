<?php

$files = [
    'resources/views/website/index.blade.php',
    'resources/views/website/men.blade.php',
    'resources/views/website/women.blade.php',
    'resources/views/website/kids.blade.php',
    'resources/views/website/tennis.blade.php',
    'resources/views/website/heritage.blade.php',
    'resources/views/website/sale.blade.php',
];

$search = <<<'EOD'
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
EOD;

$replace = <<<'EOD'
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
EOD;

foreach ($files as $file) {
    if (file_exists($file)) {
        $content = file_get_contents($file);
        $content = str_replace($search, $replace, $content);
        file_put_contents($file, $content);
        echo "Updated $file\n";
    }
}

// Special case for product-detail.blade.php
$detailFile = 'resources/views/website/product-detail.blade.php';
if (file_exists($detailFile)) {
    $content = file_get_contents($detailFile);
    
    // First button (main action area)
    $search1 = <<<'EOD'
                <form action="{{ route('wishlist.store') }}" method="POST" class="w-100 m-0">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn w-100 btn-outline-navy btn-lg rounded-0 fw-bold text-uppercase py-3"><i class="far fa-heart me-2"></i> Add to Wishlist</button>
                </form>
EOD;
    $replace1 = <<<'EOD'
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
EOD;
    $content = str_replace($search1, $replace1, $content);
    
    file_put_contents($detailFile, $content);
    echo "Updated $detailFile\n";
}
echo "Done.\n";
