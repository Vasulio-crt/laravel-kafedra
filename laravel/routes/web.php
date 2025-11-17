<?php
// ----video 6----
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\MainController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'index']);
Route::get('/test', [MainController::class, 'test']);
Route::get('/single', App\Http\Controllers\TestController::class);

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store')
    ->withoutMiddleware(VerifyCsrfToken::class);
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update')
    ->withoutMiddleware(VerifyCsrfToken::class);
    Route::delete('/products/{product}', [ProductController::class, 'delete'])->name('products.delete')
    ->withoutMiddleware(VerifyCsrfToken::class);

    // php artisan route:list
    // Route::resource('/posts', PostController::class)->only(['create', 'store', 'edit', 'update', 'destroy']);// кроме
    Route::resource('/posts', PostController::class)->only(['index', 'show']);// эти использовать
});