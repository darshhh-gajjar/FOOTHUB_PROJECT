<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\userController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\PaymentController;


// Web Pages


Route::get('/', function () {
    return view('website.index');
});



Route::get('/', function () {
    $products = \App\Models\product::where('status', 'Active')->latest()->take(8)->get();
    return view('website.index', compact('products'));
})->name('home');

Route::get('/men', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Men')
        ->where('products.status', 'Active')
        ->select('products.*')->get();
    return view('website.men', compact('products'));
})->name('men');

Route::get('/women', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Women')
        ->where('products.status', 'Active')
        ->select('products.*')->get();
    return view('website.women', compact('products'));
})->name('women');

Route::get('/kids', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Kids')
        ->where('products.status', 'Active')
        ->select('products.*')->get();
    return view('website.kids', compact('products'));
})->name('kids');

Route::get('/tennis', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Tennis')
        ->where('products.status', 'Active')
        ->select('products.*')->get();
    return view('website.tennis', compact('products'));
})->name('tennis');

Route::get('/heritage', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Heritage')
        ->where('products.status', 'Active')
        ->select('products.*')->get();
    return view('website.heritage', compact('products'));
})->name('heritage');

Route::get('/sale', function () {
    // For sale we might just fetch all discounted items. For now we will check categories.name = 'Sale' or products with Sale price.
    $products = \App\Models\product::whereNotNull('mrp')->whereColumn('mrp', '>', 'sale_price')
        ->where('products.status', 'Active')
        ->select('products.*')->get();
    return view('website.sale', compact('products'));
})->name('sale');

Route::get('/trending', function () {
    return view('website.trending');
})->name('trending');

Route::get('/new-arrivals', function () {
    return view('website.new_arrivals');
})->name('new.arrivals');

Route::get('/delivery-returns', function () {
    return view('website.delivery_returns');
})->name('delivery.returns');

Route::get('/size-guide', function () {
    return view('website.size_guide');
})->name('size.guide');

Route::get('/faq', function () {
    return view('website.faq');
})->name('faq');

Route::get('/store-locator', function () {
    return view('website.store_locator');
})->name('store.locator');

Route::get('/terms-conditions', function () {
    return view('website.terms_conditions');
})->name('terms.conditions');

// User Account
Route::get('/profile', function () {
    return view('website.profile');
})->name('profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

Route::get('/my-orders', function () {
    return view('website.orders');
})->name('my.orders');

Route::get('/my-addresses', function () {
    return view('website.addresses');
})->name('my.addresses');

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist');
Route::post('/add-to-wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
Route::post('/remove-from-wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'store'])->name('cart.store');
Route::post('/remove-from-cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout', [PaymentController::class, 'checkout'])->name('checkout');
Route::post('/payment/order/create', [PaymentController::class, 'createOrder'])->name('payment.order.create');
Route::post('/payment/verify', [PaymentController::class, 'verifyPayment'])->name('payment.verify');
Route::get('/payment/success', function () {
    return view('payment.success');
})->name('payment.success');
Route::post('/payment/webhook', [PaymentController::class, 'webhook'])->name('payment.webhook');

Route::get('/product/{id?}', function ($id = null) {
    if (!$id) return redirect()->route('home');
    $product = \App\Models\product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->where('products.id', $id)
        ->select('products.*', 'categories.name as category_name')
        ->firstOrFail();
        
    $related_products = \App\Models\product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->where('status', 'Active')
        ->take(4)
        ->get();
        
    return view('website.product-detail', compact('product', 'related_products'));
})->name('product.detail');

Route::get('/login', function () {
    return view('website.login');
})->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/signup',[UserController::class,'create'])->name('register');
Route::post('/signup',[UserController::class,'store'])->name('register.store');

// Contact Logic (Must keep controller for functionality)
Route::get('/contact', [ContactController::class, 'create'])->name('contact');
Route::post('/ins_contact', [ContactController::class, 'store'])->name('contact.store');







// Admin Panel
Route::get('/admin/admin_dashboard', function () {
    $recentUsers = [];
    return view('admin.admin_dashboard', compact('recentUsers'));
})->name('admin.admin_dashboard');

Route::get('/admin/admin_men', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Men')
        ->select('products.*', 'categories.name as category_name')->get();
    return view('admin.admin_men', compact('products'));
})->name('admin.admin_men');

Route::get('/admin/admin_women', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Women')
        ->select('products.*', 'categories.name as category_name')->get();
    return view('admin.admin_women', compact('products'));
})->name('admin.admin_women');

Route::get('/admin/admin_kids', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Kids')
        ->select('products.*', 'categories.name as category_name')->get();
    return view('admin.admin_kids', compact('products'));
})->name('admin.admin_kids');

Route::get('/admin/admin_tennis', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Tennis')
        ->select('products.*', 'categories.name as category_name')->get();
    return view('admin.admin_tennis', compact('products'));
})->name('admin.admin_tennis');

Route::get('/admin/admin_heritage', function () {
    $products = \App\Models\product::join('categories', 'products.category_id', '=', 'categories.id')
        ->where('categories.name', 'Heritage')
        ->select('products.*', 'categories.name as category_name')->get();
    return view('admin.admin_heritage', compact('products'));
})->name('admin.admin_heritage');

Route::get('/admin/admin_sale', function () {
    $products = \App\Models\product::leftJoin('categories', 'products.category_id', '=', 'categories.id')
        ->whereNotNull('mrp')->whereColumn('mrp', '>', 'sale_price')
        ->select('products.*', 'categories.name as category_name')->get();
    return view('admin.admin_sale', compact('products'));
})->name('admin.admin_sale');

Route::get('/admin/admin_trending', function () {
    return view('admin.admin_trending');
})->name('admin.admin_trending');

Route::get('/admin/admin_cart', [CartController::class, 'adminIndex'])->name('admin.admin_cart');
Route::post('/admin/admin_cart_delete/{id}', [CartController::class, 'adminDestroy'])->name('admin.admin_cart.destroy');

Route::get('/admin/admin_wishlist', [WishlistController::class, 'adminIndex'])->name('admin.admin_wishlist');
Route::post('/admin/admin_wishlist_delete/{id}', [WishlistController::class, 'adminDestroy'])->name('admin.admin_wishlist.destroy');

Route::get('/admin/admin_users', [UserController::class, 'show'])->name('admin.admin_users');

Route::get('/admin/admin_profile', function () {
    return view('admin.admin_profile');
})->name('admin.admin_profile');

Route::get('/admin/admin_new_arrivals', function () {
    return view('admin.admin_new_arrivals');
})->name('admin.admin_new_arrivals');

// Admin Categories
Route::get('/admin/admin_add_category', [CategoryController::class, 'create'])->name('admin.admin_add_category');
Route::post('/admin/admin_add_category', [CategoryController::class, 'store'])->name('admin.admin_add_category.store');

Route::get('/admin/admin_manage_categories', [CategoryController::class, 'show'])->name('admin.admin_manage_categories');
Route::get('/admin/admin_edit_category/{id}', [CategoryController::class, 'edit'])->name('admin.admin_edit_category');
Route::post('/admin/admin_update_category/{id}', [CategoryController::class, 'update'])->name('admin.admin_update_category');
Route::post('/admin/admin_delete_category/{id}', [CategoryController::class, 'destroy'])->name('admin.admin_delete_category');

// Admin Products
Route::get('/admin/admin_add_product', [ProductController::class, 'create'])->name('admin.admin_add_product');
Route::post('/admin/admin_add_product', [ProductController::class, 'store'])->name('admin.admin_add_product.store');

Route::get('/admin/admin_manage_products', [ProductController::class, 'show'])->name('admin.admin_manage_products');
Route::get('/admin/admin_edit_product/{id}', [ProductController::class, 'edit'])->name('admin.admin_edit_product');
Route::post('/admin/admin_update_product/{id}', [ProductController::class, 'update'])->name('admin.admin_update_product');
Route::post('/admin/admin_delete_product/{id}', [ProductController::class, 'destroy'])->name('admin.admin_delete_product');

Route::get('/admin/admin_manage_orders', function () {
    return view('admin.admin_manage_orders');
})->name('admin.admin_manage_orders');




// Admin Auth
Route::get('/admin/login', function () {
    return view('admin.admin_login');
})->name('admin.login');

// Admin Reports (Must keep controller for functionality)
Route::get('/admin/admin_contact_reports', [ContactController::class, 'show'])->name('admin.admin_contact_reports');











