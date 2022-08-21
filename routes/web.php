<?php

use App\Http\Controllers\CategorController;
use App\Http\Controllers\PostController;

use Illuminate\Support\Facades\Route;

//post.create

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //post Is dane
    Route::get('/post/create', [PostController::class, 'create'])->name('post.create');
    Route::get('/post',[PostController::class,'index'])->name('post.index');
    Route::get('/post/{post:slug}',[PostController::class,'show'])->name('post.show');
    Route::post('/post',[PostController::class,'store'])->name('post.store');
    Route::get('/post/{post}/edit',[PostController::class,'edit'])->name('post.edit');
    Route::put('/post/{id}',[PostController::class,'update'])->name('post.update');
    Route::delete('/post/{id}',[PostController::class,'destroy'])->name('post.destroy');

    //Category Routes
    Route::get('/category',[CategorController::class,'index'])->name('category.index');
    Route::get('/category/create',[CategorController::class,'create'])->name('category.create');
    Route::post('/category',[CategorController::class,'store'])->name('category.store');
    Route::get('/category/{category:slug}',[CategorController::class,'show'])->name('category.show');
    Route::get('/category/{id}/edit',[CategorController::class,'edit'])->name('category.edit');
    Route::put('/category/{id}',[CategorController::class,'update'])->name('category.update');
    Route::delete('/category/{category}',[CategorController::class,'destroy'])->name('category.destroy');

});


