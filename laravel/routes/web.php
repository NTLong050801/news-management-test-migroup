<?php

use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\ManagementNewsController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Frontend\NewsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[LoginController::class,'index'])->name('login');
Route::get('/register',function (){
    $title = "Đăng ký";
    return view('admin.users.regiseter',compact('title'));
})->name('register');
Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/',[LoginController::class,'store'])-> name('store_login');
Route::post('/register',[LoginController::class,'register'])->name('register_store');
Route::prefix('users')->middleware('auth')->group(function (){
    Route::get('/home',[NewsController::class,'index'])->name('users.home.index');
    Route::get('/allnews',[NewsController::class,'allnews'])->name('allnews');
    Route::get('/news/create',[NewsController::class,'create'])->name('news.create');
    Route::post('/news/store',[NewsController::class,'store'])->name('news.store');
    Route::get('{id}/destroy',[NewsController::class,'destroy'])->name('news.destroy');
    Route::get('{id}/edit',[NewsController::class,'edit'])->name('news.edit');
    Route::post('{id}/update',[NewsController::class,'update'])->name('news.update');
});
Route::prefix('admin')->middleware('auth')->group(function (){
    Route::get('/home',[CategoryController::class,'index'])->name('admin.home');
    Route::get('/news',[ManagementNewsController::class,'index'])->name('admin.index');
    Route::get('/{id}/apply',[ManagementNewsController::class,'applly'])->name('admin.apply');

    Route::prefix('/category')->group(function (){
        Route::get('create',[CategoryController::class,'create'])->name('admin.category.create');
        Route::post('store',[CategoryController::class,'store'])->name('admin.category.store');
        Route::get('listCategories',[CategoryController::class,'listCategories'])->name('admin.category.listCategories');
        Route::get('/{id}/destroy',[CategoryController::class,'destroy'])->name('admin.category.destroy');
        Route::get('/{id}/edit',[CategoryController::class,'edit'])->name('admin.category.edit');
        Route::post('/{id}/update',[CategoryController::class,'update'])->name('admin.category.update');

    });
});
