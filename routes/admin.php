<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Dashbord\AdminLoginController;
use App\Http\Controllers\Dashbord\brandController;
use App\Http\Controllers\Dashbord\DashbordConrtroller;
use App\Http\Controllers\Dashbord\categoryController;
use App\Http\Controllers\Dashbord\productController;
use App\Http\Controllers\Dashbord\tagController;
use App\Http\Controllers\Dashbord\vendorController;
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
        'prefix' => LaravelLocalization::setLocale()  . "/admin",
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

        //login route

Route::get('/login', [AdminLoginController::class, 'loginPage'])->name('admin.login');
Route::post('checkLogin', [AdminLoginController::class, 'checkLogin'])->name('admin.checkLogin');

//        login done
    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('/', [DashbordConrtroller::class, 'index'])->name('Dashbord');


        // categories routes

    Route::group(['prefix' => 'categories'],function(){

        Route::get('/{type?}/', [categoryController::class, 'view'])                 ->name('admin.categories');
        Route::get('/type/{type?}/{action?}', [categoryController::class, 'select'])     ->name('admin.selectCategories');
        Route::get('/detail/{type?}/{id?}', [categoryController::class, 'detail'])     ->name('admin.detailCategories');
        Route::get('/create/{type?}', [categoryController::class, 'createForm'])     ->name('admin.createFormCategories');
        Route::post('/store/{type?}', [categoryController::class, 'storeDb'])        ->name('admin.storeCategories');
        Route::get('edit/{type?}/{slug?}', [categoryController::class, 'editForm'])    ->name('admin.editCategories');
        Route::post('/update/{type?}/{id?}', [categoryController::class, 'updateDb'])->name('admin.updateCategories');
        Route::get('/delete/{type?}/{id?}', [categoryController::class, 'delete'])   ->name('admin.deleteCategories');
        Route::get('/isActive/{type?}/{id?}', [categoryController::class, 'isActive'])->name('admin.activeCategories');
    });

    // brands routes

    Route::group(['prefix' => 'brand'],function(){

        Route::get('/', [brandController::class, 'view'])                 ->name('admin.brands');
        Route::get('/type/{action?}', [brandController::class, 'select'])     ->name('admin.selectBrands');
        Route::get('/detail/{id?}', [brandController::class, 'detail'])     ->name('admin.detailBrands');
        Route::get('/create', [brandController::class, 'createForm'])     ->name('admin.createFormBrands');
        Route::post('/store', [brandController::class, 'storeDb'])        ->name('admin.storeBrands');
        Route::get('edit/{id?}', [brandController::class, 'editForm'])    ->name('admin.editBrands');
        Route::post('/update/{id?}', [brandController::class, 'updateDb'])->name('admin.updateBrands');
        Route::get('/delete/{id?}', [brandController::class, 'delete'])   ->name('admin.deleteBrands');
        Route::get('/isActive/{id?}', [brandController::class, 'isActive'])->name('admin.activeBrands');
    });


        // vendors routes

        Route::group(['prefix' => 'vendors'],function(){

            Route::get('/', [vendorController::class, 'view'])                 ->name('admin.vendors');
            Route::get('/type/{action?}', [vendorController::class, 'select'])     ->name('admin.selectVendors');
            Route::get('/detail/{slug?}', [vendorController::class, 'detail'])     ->name('admin.detailVendors');
            Route::get('/create', [vendorController::class, 'createForm'])     ->name('admin.createFormVendors');
            Route::post('/store', [vendorController::class, 'storeDb'])        ->name('admin.storeVendors');
            Route::get('edit/{slug?}', [vendorController::class, 'editForm'])    ->name('admin.editVendors');
            Route::post('/update/{id?}', [vendorController::class, 'updateDb'])->name('admin.updateVendors');
            Route::get('/delete/{id?}', [vendorController::class, 'delete'])   ->name('admin.deleteVendors');
            Route::get('/isActive/{id?}', [vendorController::class, 'isActive'])->name('admin.activeVendors');
        });

        // Tags routes

        Route::group(['prefix' => 'tags'],function(){

            Route::get('/', [tagController::class, 'view'])                 ->name('admin.tags');
            Route::get('/type/{action?}', [tagController::class, 'select'])     ->name('admin.selectTags');
            Route::get('/detail/{slug?}', [tagController::class, 'detail'])     ->name('admin.detailTags');
            Route::get('/create', [tagController::class, 'createForm'])     ->name('admin.createFormTags');
            Route::post('/store', [tagController::class, 'storeDb'])        ->name('admin.storeTags');
            Route::get('edit/{slug?}', [tagController::class, 'editForm'])    ->name('admin.editTags');
            Route::post('/update/{id?}', [tagController::class, 'updateDb'])->name('admin.updateTags');
            Route::get('/delete/{id?}', [tagController::class, 'delete'])   ->name('admin.deleteTags');
            Route::get('/isActive/{id?}', [tagController::class, 'isActive'])->name('admin.activeTags');
        });

        // Products routes

        Route::group(['prefix' => 'products'],function(){

            Route::get('/', [productController::class, 'view'])                 ->name('admin.products');
            Route::get('/type/{action?}', [productController::class, 'select'])     ->name('admin.selectProducts');
            Route::get('/detail/{slug?}', [productController::class, 'detail'])     ->name('admin.detailProducts');
            Route::get('/create', [productController::class, 'createForm'])     ->name('admin.createFormProducts');
            Route::post('/store', [productController::class, 'storeDb'])        ->name('admin.storeProducts');
            Route::get('edit/{slug?}', [productController::class, 'editForm'])    ->name('admin.editProducts');
            Route::post('/update/{id?}', [productController::class, 'updateDb'])->name('admin.updateProducts');
            Route::get('/delete/{id?}', [productController::class, 'delete'])   ->name('admin.deleteProducts');
            Route::get('/isActive/{id?}', [productController::class, 'isActive'])->name('admin.activeProducts');
        });

});

});





// Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>['auth','admin']], function()
// {
//     Route::get('/', function () {
//         return view('welcome');
//     });
//     Route::get('/login','AdminLogin@index');
// });


Route::get('/erorr404', [erorrController::class, 'erorr404'])->name('admin.erorr');

