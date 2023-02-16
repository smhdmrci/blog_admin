<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

Route::get('/', function () {
    return view('index');
});

Route::get('users',[UserController::class,'list'])->name('users');


Route::match(['get','post'],'category/store',[CategoryController::class,'store'])->name('category.store');
Route::match(['get','post'],'categories',[CategoryController::class,'list'])->name('category.list');
Route::match(['get','post'],'category/update/{category}',[CategoryController::class,'update'])->name('category.update');
Route::match(['get','post'],'category/delete/{category}',[CategoryController::class,'delete'])->name('category.delete');

Route::match(['get','post'],'blog/store',[BlogController::class,'store'])->name('blog.store');
Route::match(['get','post'],'blogs',[BlogController::class,'list'])->name('blog.list');
Route::match(['get','post'],'blog/update/{blog}',[BlogController::class,'update'])->name('blog.update');
Route::match(['get','post'],'blog/delete/{blog}',[BlogController::class,'delete'])->name('blog.delete');


