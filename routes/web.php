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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');


// Residence
Route::get('/residence/view', 'ResidenceController@viewResidence');
Route::get('/residence/form', function () {
    return view('residence/form');
});
Route::post('/residence', 'ResidenceController@store')->name('residence');
Route::get('/residence/edit/{id}', 'ResidenceController@editResidence');
Route::post('/residence/edit/{id}', 'ResidenceController@storeEdit')->name('storeEdit');