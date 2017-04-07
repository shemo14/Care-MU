<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();


// Admin Routes
Route::group(['middleware' => ['auth','admin']], function (){
    Route::resource('/hospital', 'HospitalController');
});

Route::group(['middleware' => ['auth','hospital']], function (){
    Route::resource('/intensive_care', 'CareController');
    Route::resource('/beds', 'BedController');
    Route::get('select_care','BedController@selectCare');
    Route::get('select_bed','PatientController@selectBed');
    Route::get('patients/remove/{id}','PatientController@removePatient');
    Route::get('patients/edit/{id}','BedController@editBed');
    Route::resource('/patients','PatientController');
    Route::resource('/receptionist','ReceptionistController');
});

Route::group(['middleware' => 'auth'],function (){
    Route::get('/','AdminController@index');
    Route::get('/account','AdminController@editAccount');
});

Route::get('/hospitals','webService@hospitals');
Route::get('/showHospital/{id}','webService@showHospital');
Route::get('/showCare/{id}','webService@showCares');
Route::get('/allCares','webService@allCares');
Route::get('/allBeds','webService@allBed');
Route::get('/allowBeds','webService@allowBed');
Route::get('/hospitalsnew','webService@hospitalsArr');
