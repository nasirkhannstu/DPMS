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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'visitors'], function(){
	Route::get('/register', 'RegistrationController@register');
	Route::post('/register', 'RegistrationController@postRegister');

	Route::get('/login', 'LoginController@login');
	Route::post('/login', 'LoginController@postLogin');

	Route::get('/forgot-password', 'ForgotPasswordController@forgotPassword');

	Route::post('/forgot-password', 'ForgotPasswordController@postForgotPassword');

	Route::get('/reset/{email}/{resetCode}', 'ForgotPasswordController@resetPassword');
	Route::post('/reset/{email}/{resetCode}', 'ForgotPasswordController@postResetPassword');
});
Route::post('/logout', 'LoginController@logout');

			//Doctor Users
Route::group(['middleware' => 'user'], function(){

	Route::get('doctor', 'DoctorController@index');
	Route::get('doctor/edit-info','DoctorController@profileUpdate')->name('editInfo');
	Route::post('doctor/edit-profesional-info','DoctorController@postInfoUpdate')->name('postProfessionalInfo');
	Route::get('doctor/prescription','PrescriptionController@create')->name('getPrescription');
	Route::post('doctor/post-prescription','PrescriptionController@store')->name('postPrescription');
	Route::get('doctor/find-medicine','PrescriptionController@findMedicine')->name('findMedicine');
});


Route::group(['middleware' => 'user'], function(){
	Route::get('/patient', 'PatientController@index');
	Route::get('patient/find-doctor','PatientController@getFindDoctor')->name('getFindDoctor');
	Route::post('patient/Search-Doctor','PatientController@postFindDoctor')->name('postFindDoctor');
	Route::get('patient/message-doctor/{id}','PatientController@messageDoctor')->name('messageDoctor');
	Route::post('patient/post-message-doctor/{id}','PatientController@postMessageDoctor')->name('postMessageDoctor');
});


Route::group(['middleware' => 'user'], function(){
	Route::get('/user', 'UserController@index');
	Route::post('user/account-info','UserController@postAccountUpdate')->name('postAccountInfo');
	Route::post('user/personal-info','UserController@postPersonalUpdate')->name('postPersonalInfo');
});


Route::group(['middleware' => 'user'], function(){
	Route::get('/pharmacy', 'PharmacyController@index');
	Route::get('/pharmacy/invoice/{id}','PharmacyController@invoice')->name('invoice');
	Route::get('/pharmacy/sell','PharmacyController@sell')->name('sell');
	Route::get('/pharmacy/getPrice/{id}','PharmacyController@getPrice');
});

Route::get('/activation/{email}/{activationCode}', 'ActivationController@activate');

Route::resource('invoices', 'InvoiceController');
