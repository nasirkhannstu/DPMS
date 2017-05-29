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
	$complains = \App\Complain::all();
	$complns = array();
	foreach($complains as $v){
        $complns[] = ['complain'=>$v->complain, 'doctor'=> \App\User::find($v->doctor_id), 'patient'=> \App\User::find($v->patient_id)];
    }
    return view('home')->withComplains($complns);
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

Route::group(['middleware' => 'user'], function(){
	Route::get('doctor', 'DoctorController@index')->name('doctor.index');

	Route::get('doctor/prescription-view/{id}', 'DoctorController@doctorPresView')->name('doctorPresView');

	Route::get('doctor/prescription-search/{s}', 'DoctorController@getDocPresSearch')->name('getDocPresSearch');
	Route::post('doctor/post-prescription-search', 'DoctorController@docPresSearch')->name('docPresSearch');

	Route::get('doctor/edit-info','DoctorController@profileUpdate')->name('editInfo');
	Route::post('doctor/edit-profesional-info','DoctorController@postInfoUpdate')->name('postProfessionalInfo');
	Route::get('doctor/prescription','PrescriptionController@create')->name('getPrescription');

	Route::get('doctor/messages','DoctorController@messages')->name('messages');
	Route::get('doctor/emergency_patient','DoctorController@emergency')->name('emergency');
	Route::post('doctor/post_emergency_patient','DoctorController@postEmergency')->name('postEmergency');

	Route::post('doctor/post-prescription','PrescriptionController@store')->name('postPrescription');
	Route::get('doctor/find-medicine','PrescriptionController@findMedicine')->name('findMedicine');
});


Route::group(['middleware' => 'user'], function(){
	Route::get('/patient', 'PatientController@index')->name('patient.index');
	Route::get('/patient/view-prescription/{id}', 'PatientController@presview')->name('pres.view');
	Route::get('patient/find-doctor','PatientController@getFindDoctor')->name('getFindDoctor');
	Route::post('patient/Search-Doctor','PatientController@postFindDoctor')->name('postFindDoctor');
	Route::get('patient/message-doctor/{id}','PatientController@messageDoctor')->name('messageDoctor');
	Route::post('patient/post-message-doctor/{id}','PatientController@postMessageDoctor')->name('postMessageDoctor');
	Route::get('patient/complain/{id}','ComplainController@complain')->name('patient.complain');
	Route::post('patient/post-complain/{id}','ComplainController@postcomplain')->name('patient.post.complain');
	Route::get('patient/edit-info','UserController@editPatientInfo')->name('edit.Patient.Info');
	Route::get('patient/medication-history','PatientController@medicationHistory')->name('medication.history');
});


Route::group(['middleware' => 'user'], function(){
	Route::get('/user', 'UserController@index');
	Route::post('user/account-info','UserController@postAccountUpdate')->name('postAccountInfo');
	Route::post('user/personal-info','UserController@postPersonalUpdate')->name('postPersonalInfo');
});


Route::group(['middleware' => 'user'], function(){
	Route::get('/pharmacy', 'PharmacyController@index')->name('pharmacy');
	Route::get('/pharmacy/invoice/{id}','PharmacyController@invoice')->name('invoice');
	Route::get('/pharmacy/invoice-full/{id}','PharmacyController@invoiceFull')->name('invoice.full');
	Route::post('/pharmacy/sell/{id}','PharmacyController@sell')->name('sell');
	Route::get('/pharmacy/search-prescriptions/{s}','PharmacyController@getPresSearch')->name('getPresSearch');
	Route::post('/pharmacy/post-search-prescriptions','PharmacyController@presSearch')->name('presSearch');


	Route::get('/pharmacy/add-product-to-store/{id}','StoreController@storeAdd')->name('store.add');
	Route::get('/pharmacy/store-medicines','StoreController@storemedicines')->name('store.medicines');
	Route::post('/pharmacy/store-update/{id}','StoreController@storeUpdate')->name('store.update');

	
	Route::post('/pharmacy/medicine/{id}','MedicineController@medicineUpdatemed')->name('medicine.updatemed');
	Route::resource('/pharmacy/medicine','MedicineController');
});

Route::get('/activation/{email}/{activationCode}', 'ActivationController@activate');

Route::resource('invoices', 'InvoiceController');
