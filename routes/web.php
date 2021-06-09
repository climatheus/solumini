<?php

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


Route::namespace('Front')->group(function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/company/{company}/show', 'HomeController@showCompany')
        ->name('front.company.show');

    Route::get('/category/{category}/show', 'HomeController@showCategory')
        ->name('front.category.show');
});

Route::namespace('Admin')->prefix('admin')->group(function () {
    Route::get('dashboard', 'DashboardController')->name('admin.dashboard');
    Route::resource('contract', 'ContractController');
    Route::resource('category', 'CategoryController');
    Route::resource('company', 'CompanyController');
});
