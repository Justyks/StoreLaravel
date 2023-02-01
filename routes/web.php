<?php

use App\Http\Controllers\BasketController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FilterController;
use App\Models\Basket;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register',[SignUpController::class,'register'])->name('signUp');
Route::get('/register/form',[SignUpController::class,'registerForm'])->name('signUpForm');

Route::post('/signin',[SignInController::class,'signIn'])->name('signIn');
Route::get('/signin/form',[SignInController::class,'signInForm'])->name('signInForm');

Route::match(['post','get'],'/main',[StoreController::class,'main'])->name('main')->middleware('auth');
Route::get('/post/{id}',[StoreController::class,'showPost'])->name('post')->middleware('auth')->whereNumber('id');
Route::get('/user/{id}/posts/',[StoreController::class,'showUserPosts'])->name('userPosts')->middleware('auth');

Route::get('/basket',[BasketController::class,'show'])->name('showBasket')->middleware('auth');
Route::get('/basket/add/{id}',[BasketController::class,'add'])->name('addToBasket')->middleware('auth');
Route::post('/basket/plus/{id}', [BasketController::class,'plus'])
    ->where('id', '[0-9]+')
    ->name('basket.plus')->middleware('auth');
Route::post('/basket/minus/{id}', [BasketController::class,'minus'])
    ->where('id', '[0-9]+')
    ->name('basket.minus')->middleware('auth');

Route::get('/post/add/form',[PostController::class,'show'])->name('showAddForm')->middleware('auth');
Route::post('/post/add',[PostController::class,'add'])->name('addPost')->middleware('auth');

Route::get('/post/filter/form',[FilterController::class,'show'])->name('showFilterForm')->middleware('auth');
Route::match(['get','post'],'/post/filter',[FilterController::class,'filter'])->name('filterPost')->middleware('auth');
