<?php

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

// Route::get()

// Route::get("/iti",function(){
//     return "Hello World from ITI";
// });


// Route::get("/iti",function(){
//     return "<h1 style='color:red'> Hello World from ITI </h1>";
// });

Route::get("/iti",function(){
    $myinfo = [
        "name"=>"noha",
        "track"=> "PHP"
    ];

    return $myinfo;
});

// Route::get('/hello/{username}', function($username){
//         return "Hello ${username}";
// });


// use
use App\Http\Controllers\ITIController;
Route::get('/hello/{username}', [ITIController::class, 'sayhello']);

use App\Http\Controllers\ProductController;
use Monolog\Handler\RotatingFileHandler;

Route::get("/products/index", [ProductController::class, "index"]);


// Route::get("profile/{username}", function($username){

//     return view("profile", ['username'=>$username]);

// });

use App\Http\Controllers\ProfileController;
Route::get("profile/{username}", [ProfileController::class, 'getProfile']);
