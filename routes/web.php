<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\pagescontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PagesController::class,'home'])->name('home');
Route::get('/about' , [PagesController::class,'about'])->name('about');
Route::get('/contact' , [PagesController::class,'contact'])->name('contact');

Route::get('/viewpackage/{id}', [PagesController::class,'viewpackage'])->name('viewpackage');

Route::middleware(['auth'])->group(function () {
    Route::get('/bookpackage/{id}',[PagesController::class,'bookpackage'])->name('bookpackage');

    Route::get('/cart',[CartController::class,'index'])->name('cart.index');

    Route::get('/cart/{id}/destroy',[CartController::class, 'destroy'])->name('cart.destroy');

    Route::post('/addtocart',[CartController::class,'store'])->name('addtocart');

    Route::get('/checkout/{cartid}',[CartController::class,'checkout'])->name('checkout');

    Route::get('/orders/{cartid}/{totalprice}',[OrderController::class,'store'])->name('orders.store');


 });



Route::get('/dashboard', [DashboardController::class,'dashboard'])->middleware(['auth', 'isadmin'])->name('dashboard');

//category
Route::middleware(['auth','isadmin'])->group(function () {
    Route::get('/category',[CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create',[CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store',[CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit',[CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}/update',[CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/{id}/destroy',[CategoryController::class, 'destroy'])->name('category.destroy');


    //Notice
    Route::get('/notice',[NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/create',[NoticeController::class, 'create'])->name('notice.create');
    Route::post('/notice/store',[NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/{id}/edit',[NoticeController::class, 'edit'])->name('notice.edit');
    Route::post('/notice/{id}/update',[NoticeController::class, 'update'])->name('notice.update');
    Route::get('/notice/{id}/destroy',[NoticeController::class, 'destroy'])->name('notice.destroy');

    //For Items
    Route::get('/items',[ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create',[ItemController::class, 'create'])->name('items.create');
    Route::post('/items/store',[ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{id}/edit',[ItemController::class, 'edit'])->name('items.edit');
    Route::post('/items/{id}/update',[ItemController::class, 'update'])->name('items.update');
    Route::get('/items/{id}/destroy',[ItemController::class, 'destroy'])->name('items.destroy');

     //For packages
     Route::get('/packages',[PackageController::class, 'index'])->name('packages.index');
     Route::get('/packages/create',[PackageController::class, 'create'])->name('packages.create');
     Route::post('/packages/store',[PackageController::class, 'store'])->name('packages.store');
     Route::get('/packages/{id}/edit',[PackageController::class, 'edit'])->name('packages.edit');
     Route::post('/packages/{id}/update',[PackageController::class, 'update'])->name('packages.update');
     Route::get('/packages/{id}/destroy',[PackageController::class, 'destroy'])->name('packages.destroy');

     //For Banner
     Route::get('/banners',[BannerController::class, 'index'])->name('banners.index');
     Route::get('/banners/create',[BannerController::class, 'create'])->name('banners.create');
     Route::post('/banners/store',[BannerController::class, 'store'])->name('banners.store');
     Route::get('/banners/{id}/edit',[BannerController::class, 'edit'])->name('banners.edit');
     Route::post('/banners/{id}/update',[BannerController::class, 'update'])->name('banners.update');
     Route::get('/banners/{id}/destroy',[BannerController::class, 'destroy'])->name('banners.destroy');

     //For Orders
     Route::get('/orders',[OrderController::class, 'index'])->name('orders.index');
     Route::get('/orders/{id}/{status}',[OrderController::class,'status'])->name('orders.status');

     Route::get('/orders/{id}/destroy',[OrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
