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
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
EOD;

$replace = <<<'EOD'
                                @php
                                    $inWishlist = auth()->check() ? \App\Models\wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->exists() : false;
                                @endphp
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="{{ $inWishlist ? 'fas text-danger' : 'far text-dark' }} fa-heart small"></i>
                                </button>
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
                            <button type="submit" class="btn btn-outline-dark wishlist-btn px-4 fw-bold rounded-0" style="height: 50px;">
                                <i class="far fa-heart fs-5"></i>
                            </button>
EOD;
    $replace1 = <<<'EOD'
                            @php
                                $mainInWishlist = auth()->check() ? \App\Models\wishlist::where('user_id', auth()->id())->where('product_id', $product->id)->exists() : false;
                            @endphp
                            <button type="submit" class="btn btn-outline-dark wishlist-btn px-4 fw-bold rounded-0" style="height: 50px;">
                                <i class="{{ $mainInWishlist ? 'fas text-danger' : 'far' }} fa-heart fs-5"></i>
                            </button>
EOD;
    $content = str_replace($search1, $replace1, $content);
    
    // Second button (related products loop)
    $search2 = <<<'EOD'
                                    <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                        <i class="far fa-heart text-dark small"></i>
                                    </button>
EOD;
    $replace2 = <<<'EOD'
                                    @php
                                        $relatedInWishlist = auth()->check() ? \App\Models\wishlist::where('user_id', auth()->id())->where('product_id', $related->id)->exists() : false;
                                    @endphp
                                    <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                        <i class="{{ $relatedInWishlist ? 'fas text-danger' : 'far text-dark' }} fa-heart small"></i>
                                    </button>
EOD;
    $content = str_replace($search2, $replace2, $content);
    
    file_put_contents($detailFile, $content);
    echo "Updated $detailFile\n";
}
