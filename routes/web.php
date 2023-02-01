<?php

use Illuminate\Support\Facades\Route;
### developer defined controllers
use App\Http\Controllers\ITIController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;


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

Route::get("/iti",function(){
    $myinfo = [
        "name"=>"noha",
        "track"=> "PHP"
    ];

    return $myinfo;
});


Route::get('/hello/{username}', [ITIController::class, 'sayhello']);
Route::get("profile/{username}", [ProfileController::class, 'getProfile']);
##################################################################3
############ Named routes
Route::get("/products/index", [ProductController::class, "index"])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/show/{id}', [ProductController::class, 'show'])->name('products.show');

Route::get('/products/delete/{id}',
    [ProductController::class, 'destory'])->name('products.destroy');


Route::get('/products/edit/{id}',
    [ProductController::class, 'edit'])->name('products.edit');

Route::post('/products/update/{id}',
    [ProductController::class, 'update'])->name('products.update');
