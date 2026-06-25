<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Models\Product;
use App\Models\Post;

Route::get('/informacoes', [PostController::class, 'index'])->name('posts.index');
Route::get('/informacoes/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/admin/informacoes/criar', [PostController::class, 'create'])->name('posts.create');
Route::post('/admin/informacoes', [PostController::class, 'store'])->name('posts.store');
Route::delete('/admin/produtos/{product}', [ProductController::class, 'destroy'])->name('produtos.destroy');
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/produtos', [ProductController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/{id}', [ProductController::class, 'show'])->name('produtos.show');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/admin/produtos/criar', [ProductController::class, 'create'])->name('produtos.create');
    Route::post('/admin/produtos', [ProductController::class, 'store'])->name('produtos.store');
});
Route::get('/', function () {
    $produtos = Product::latest()->take(3)->get();
    $posts = Post::latest()->take(2)->get();
    return view('home', compact('produtos', 'posts'));
});

require __DIR__.'/auth.php';
