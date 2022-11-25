<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\CategoryController;
use Illuminate\Routing\Controller;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\CartController;




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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [FrontendController::class, 'index'] );
// {{-- resuorse.frontend.index --}}
Route::get('category', [FrontendController::class, 'category']);
Route::get('view_category/{slug}', [FrontendController::class, 'view_category']);
Route::get('view_category/{cate_slug}/{prod_slug}', [FrontendController::class, 'product_view']);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//  Route::middleware(['auth', 'isAdmin'])->group(function(){
//     Route::get('/dashboard', function () {
//         return view('admin.index');
//      });
  
//  });
Route::post('add-to-cart', [CartController::class, 'addProduct']);
Route::post('delete-cart-item', [CartController::class, 'deleteProduct']);
Route::post('update-cart',[CartController::class, 'updatecart'] );
 Route::middleware(['auth'])->group(function(){
   Route::get('cart', [CartController::class, 'viewcart']);
     });





 Route::middleware(['auth', 'isAdmin'])->group(function(){
    Route::get('/dashboard','Admin\FrontendController@index');
    Route::get('categories','Admin\CategoryController@index');
    Route::get('add-categories','Admin\CategoryController@add');
    Route::post('insert-category','Admin\CategoryController@insert');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit']);
    Route::put('update-category/{id}', [CategoryController::class, 'update']);
    // function update
    Route::get('delete-category/{id}', [CategoryController::class, 'delete']);

    

    Route::get('products', [ProductController::class, 'index']);
    Route::get('add-products', [ProductController::class, 'add']);
    Route::post('insert-product','Admin\ProductController@insert');
    Route::get('edit-prod/{id}', [ProductController::class, 'edit']);
    Route::put('update-product/{id}', [ProductController::class, 'update']);
    Route::get('delete-prod/{id}', [ProductController::class, 'delete']);

  
 });
 
 
