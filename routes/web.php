<?php

use App\Http\Controllers\RegisterFormController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/registerForm',function(){
    return view('registerForm');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=> 'client'],function(){
    Route::resource('/registerForm', RegisterFormController::class);

});

Route::group(['prefix' => 'admin','namespace' => 'App\Http\Controllers','middleware' => 'auth'],function(){
    Route::resource('programs',ProgramController::class);
    Route::resource('academic',AcademicController::class);
    Route::resource('register_student',StudentRegisterController::class);
});
