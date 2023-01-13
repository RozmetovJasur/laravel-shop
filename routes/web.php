<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RolesController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return redirect(app()->getLocale());
});

Route::prefix('{locale}')
    ->middleware('setlocale')
    ->group(function () {

        Route::group(['namespace' => 'App\Http\Controllers'], function () {
            Route::get('/home', [HomeController::class, 'index'])->name('home');

            Route::get('/', [HomeController::class, 'index']);

            Route::auth();

            Route::group(['middleware' => ['auth', 'permission'], 'prefix' => 'admin', 'as' => 'admin.'], function () {

                Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');
                Route::resource('roles', RolesController::class);
                Route::resource('permissions', PermissionsController::class);
                Route::resource('category', CategoryController::class);
                Route::resource('product', ProductController::class);
            });
        });
    });
