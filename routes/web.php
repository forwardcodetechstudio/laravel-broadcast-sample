<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

//Logging In User 1
Route::get('login-user1', function(){
    Auth::loginUsingId(1);
    return redirect(route('home'));
});

//Logging In User 2
Route::get('login-user2', function () {
    Auth::loginUsingId(2);
    return redirect(route('home'));
});

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('home');
    })->name('home');

    Route::get('/test', [TestController::class, 'test'])->name('test');
});
