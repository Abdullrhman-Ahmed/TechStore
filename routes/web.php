<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/brand/{id}', [HomeController::class, 'category'])->name('category.filter');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.details');
Route::get('/about-us', [ProductController::class, 'about'])->name('about');
Route::get('/contact-us', [ProductController::class, 'contact'])->name('contact');


Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('/update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
Route::delete('/remove-from-cart', [ProductController::class, 'removeFromCart'])->name('remove.from.cart');


Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
Route::post('/place-order', [ProductController::class, 'storeOrder'])->name('place.order');


Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        if (auth()->user()->email !== 'admin@gmail.com') {
            return redirect('/')->with('error', 'Unauthorized access.');
        }
        return view('dashboard', [
            'productsCount' => \App\Models\Product::count(),
            'categoriesCount' => \App\Models\Category::count()
        ]);
    })->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
