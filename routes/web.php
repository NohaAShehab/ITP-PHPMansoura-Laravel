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
//Route::resource('products',ProductController::class)
//    ->middleware('auth');

Route::resource('products',ProductController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use Laravel\Socialite\Facades\Socialite;

Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('loginwithgithub');

use App\Models\User;
use Illuminate\Support\Facades\Auth;
Route::get('/auth/callback', function () {
    $githubUser = Socialite::driver('github')->user();
//    dd($githubUser);
    $user =User::where('email', $githubUser->email)->first();
    if ($user){
        $user->github_id = $githubUser->id;
        $user->github_token = $githubUser->token;
        $user->update();

    }else{
        # create new user  --> save github token
        ## email , Github token , refresh token , github id
        $user = User::create([
            'name'=>$githubUser->name ? $githubUser->name : $githubUser->email,
            'email'=>$githubUser->email,
            'github_id'=>$githubUser->id,
            'github_token'=>$githubUser->token,
            'github_refresh_token'=> $githubUser->refreshToken ? $githubUser->refreshToken: null
        ]);
    }
        Auth::login($user);
        return  redirect('/home');

});
