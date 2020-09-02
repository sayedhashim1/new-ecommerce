<?php

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

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function() {
    Route::group(['namespace' => 'dashboard', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {
        Route::get('login', 'LoginController@getLogin')->name('get.admin.login');

        Route::post('login', 'LoginController@login')->name('admin.login');

    });


    Route::group(['namespace' => 'dashboard', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {
        Route::get('', 'DashboardController@index')->name('admin.dashboard');

        Route::group(['prefix' => 'settings'], function () {

            Route::get('shipping-methods/{type}', 'Settings@editShippingMethod')->name('edit.shipping.method');
            Route::put('shipping-methods', 'Settings@updateShippingMethod')->name('update.shipping.method');
        });

    });
});
