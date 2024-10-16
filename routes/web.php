<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class,'home']);

Route::get('/dashboard', [HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/myorders', [HomeController::class,'myorders'])->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
//admin routes
Route::get('admin/dashboard',[HomeController::class, 'index'])->middleware(['auth','admin']); 
Route::get('view_category',[AdminController::class, 'view_category'])->middleware(['auth','admin']); 
Route::post('add_category',[AdminController::class, 'add_category'])->middleware(['auth','admin']); 
Route::get('delete_category/{id}',[AdminController::class, 'delete_category'])->middleware(['auth','admin']);
Route::get('edit_category/{id}',[AdminController::class, 'edit_category'])->middleware(['auth','admin']);
Route::post('update_category/{id}',[AdminController::class, 'update_category'])->middleware(['auth','admin']);
Route::get('add_product',[AdminController::class, 'add_product'])->middleware(['auth','admin']);
Route::post('upload_product',[AdminController::class, 'upload_product'])->middleware(['auth','admin']);
Route::get('view_product',[AdminController::class, 'view_product'])->middleware(['auth','admin']);
Route::get('delete_product/{id}',[AdminController::class, 'delete_product'])->middleware(['auth','admin']);
Route::get('update_product/{id}',[AdminController::class, 'update_product'])->middleware(['auth','admin']);
Route::post('edit_product/{id}',[AdminController::class, 'edit_product'])->middleware(['auth','admin']);
route::get('view_orders',[AdminController::class,'view_order'])->middleware(['auth', 'admin']);
route::get('on_the_way/{id}',[AdminController::class,'on_the_way'])->middleware(['auth', 'admin']);
route::get('delivered/{id}',[AdminController::class,'delivered'])->middleware(['auth', 'admin']);
//downloadable csv for orders table
Route::get('/export_orders_csv', [App\Http\Controllers\AdminController::class, 'exportOrdersCSV'])->name('admin.export_orders_csv');


route::get('product_details/{id}',[HomeController::class,'product_details']);

route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
Route::delete('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');

route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth', 'verified']);

