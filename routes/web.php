<?php
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greeting', function () {
    return 'Hello World';
});


Route::get('/home', [HomeController::class, 'index']);

Route::get('/admin', [AdminHomeController::class, 'index'])->name('admin');

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');

Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');

Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');

Route::get('/admin/categories/{category}', [CategoryController::class, 'show'])->name('admin.categories.show');

Route::get('/admin/categories/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');

Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');