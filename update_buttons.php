<?php
$dir = "c:\\xampp\\htdocs\\laravel\\FILA_INDIA\\resources\\views\\website";
$files = glob($dir . "/*.blade.php");

$replaceCart = '<form action="{{ route(\'cart.store\') }}" method="POST" class="w-100 m-0 p-0">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <button type="submit" class="btn btn-warning btn-sm w-100 fw-bold text-uppercase" style="font-size: 12px;">Add to Cart</button>
                                </form>';

$replaceWishlist = '<form action="{{ route(\'wishlist.store\') }}" method="POST" class="position-absolute top-0 end-0 m-2 z-3" style="z-index: 10;">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <button type="submit" class="btn btn-light rounded-circle shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px; border: none;">
                                    <i class="far fa-heart text-dark small"></i>
                                </button>
                            </form>';

foreach($files as $file) {
    if(in_array(basename($file), ["wishlist.blade.php", "cart.blade.php", "product-detail.blade.php"])) continue;
    
    $content = file_get_contents($file);
    
    $content = preg_replace('/<button class="btn btn-warning btn-sm w-100 fw-bold text-uppercase" style="font-size: 12px;">Add to Cart<\/button>/', $replaceCart, $content);
    
    $content = preg_replace('/<button class="btn btn-light rounded-circle position-absolute top-0 end-0 m-2 shadow-sm wishlist-btn" style="width: 32px; height: 32px; padding: 0; line-height: 32px;">\s*<i class="far fa-heart text-dark small"><\/i>\s*<\/button>/', $replaceWishlist, $content);
    
    file_put_contents($file, $content);
}
echo "Buttons updated perfectly.\n";
