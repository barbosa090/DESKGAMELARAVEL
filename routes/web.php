<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Models\Product;
use App\Models\Post;

// Rotas públicas
Route::get('/', function () {
    $produtos = Product::latest()->take(3)->get();
    $posts = Post::latest()->take(2)->get();
    return view('home', compact('produtos', 'posts'));
});

Route::get('/welcome', function () {
    return view('welcome');
});

// Rotas de informações (posts) - públicas
Route::get('/informacoes', [PostController::class, 'index'])->name('posts.index');
Route::get('/informacoes/{slug}', [PostController::class, 'show'])->name('posts.show');

// Rotas autenticadas (usuário normal)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware('verified');
    
    // Visualização de produtos
    Route::get('/produtos', [ProductController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/{id}', [ProductController::class, 'show'])->name('produtos.show');
});

// Rotas apenas para ADMIN
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    // Produtos - Admin
    Route::get('/admin/produtos/criar', [ProductController::class, 'create'])->name('produtos.create');
    Route::post('/admin/produtos', [ProductController::class, 'store'])->name('produtos.store');
    Route::get('/admin/produtos/{product}/editar', [ProductController::class, 'edit'])->name('produtos.edit');
    Route::patch('/admin/produtos/{product}', [ProductController::class, 'update'])->name('produtos.update');
    Route::delete('/admin/produtos/{product}', [ProductController::class, 'destroy'])->name('produtos.destroy');
    
    // Notícias - Admin
    Route::get('/admin/informacoes/criar', [PostController::class, 'create'])->name('posts.create');
    Route::post('/admin/informacoes', [PostController::class, 'store'])->name('posts.store');
    Route::get('/admin/informacoes/{post}/editar', [PostController::class, 'edit'])->name('posts.edit');
    Route::patch('/admin/informacoes/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/admin/informacoes/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

require __DIR__.'/auth.php';
