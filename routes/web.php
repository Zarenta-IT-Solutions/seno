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


Route::middleware(['auth', 'verified','role:Admin'])->name('admin.')->prefix('admin')->namespace('admin')->group(function () {
//    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('gifts', 'GiftItemController');
    Route::resource('products', 'ProductController');
    Route::resource('reports', 'ReportController');
});

Route::middleware(['auth', 'verified','role:Stockist'])->name('stockist.')->prefix('stockist')->namespace('stockist')->group(function () {
    Route::resource('gifts', 'GiftItemController');
    Route::resource('products', 'ProductController');

});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::get('/dashboard', 'HomeController@index');
    Route::resource('/notifications', 'NotificationController');

});

Route::get('migrate',function (){
    return \Illuminate\Support\Facades\Artisan::call('migrate');
});
Route::get('country/{id}', 'AddressController@country')->name('country');
Route::get('state/{id}', 'AddressController@state')->name('state');
