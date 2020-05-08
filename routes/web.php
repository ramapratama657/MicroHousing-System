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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/applicant', 'ApplicantController@index');

Route::get('/staff', 'StaffController@index');

Route::get('/logout', function(){
   Auth::logout();
   return Redirect::to('login');
});

//test layout
Route::get('/test', function () {
    return view('layouts/layoutContent');
});

// register new staff
Route::get('/register/staff',function() {
	return view('auth/registerStaff');
});
// register new applicant
Route::get('/register/applicant',function() {
	return view('auth/registerApplicant');
});


Route::post('register/Staff', 'StaffController@newStaff')->name('newStaff');
Route::post('register/Applicant', 'ApplicantController@newApplicant')->name('newApplicant');

// Residence Staff or admin
Route::get('/residence/view', 'ResidenceController@viewResidence');
// Manage residence 
Route::get('/residence/form', 'ResidenceController@formResidence');
Route::post('/residence', 'ResidenceController@store')->name('residence');
Route::get('/residence/edit/{id}', 'ResidenceController@editResidence');
Route::post('/residence/edit/{id}', 'ResidenceController@storeEdit')->name('storeResidenceEdit');

// Alocation staff
Route::get('/residence/allocation/{id}','ResidenceController@viewAllocation');

// Application Staff or admin
Route::get('/residence/{id}', 'ResidenceController@seeApplication');
// Aprove or Decline Application
Route::get('/application/assign/{id}/approve','ResidenceController@applicationApprove');
Route::post('/application/assign/{id}/approve','ResidenceController@progApprove')->name('progApprove');
Route::get('/application/assign/{id}/decline','ResidenceController@applicationDecline');

// Application Applicant
Route::get('/application/', 'ApplicationController@viewApplication');
Route::get('/application/form/{id}', 'ApplicationController@formApplication');
Route::post('/application/form/{id}', 'ApplicationController@newApplication')->name('newApplication');
Route::get('/application/edit/{id}', 'ApplicationController@editApplication');
Route::post('/application/edit/{id}', 'ApplicationController@storeEdit')->name('storeApplicationEdit');

// Residence Applicant
Route::get('/application/residence', 'ApplicationController@viewResidence');

// Alocation Applicant
Route::get('/application/allocation/{id}','ApplicationController@viewAllocation');
