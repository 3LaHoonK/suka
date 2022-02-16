<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Dashbord\AdminLoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;
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
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

Auth::routes();

Route::get('/', function (){
    return view('site/index');})
    ->name('home_page');

//Route::get('/', [HomeController::class, 'index'])->name('home');

});



//Route::get('admin/login', [AdminLoginController::class, 'loginPage'])->name('admin.login');
//Route::post('checkLogin', [AdminLoginController::class, 'checkLogin'])->name('admin.checkLogin');

