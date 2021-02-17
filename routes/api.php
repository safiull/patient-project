<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// User controller
Route::get('/users/fetchUserList', 'UsersController@fetchUserList');
Route::post('/users/storeUser', 'UsersController@storeUser');
Route::post('/users/fetchUser', 'UsersController@fetchUser');
Route::post('/users/destroyUser', 'UsersController@destroyUser');

// Patient controller
Route::get('/patient/fetchPatientList', 'PatientController@fetchPatientList');
Route::post('/patient/storePatient', 'PatientController@storePatient');
Route::post('/patient/fetchPatient', 'PatientController@fetchPatient');
Route::post('/patient/destroyPatient', 'PatientController@destroyPatient');


// E-prescription controller
Route::get('/e_prescription/E_prescriptionList', 'E_PrescriptionController@E_prescriptionList');

Route::post('e_prescription/storeE_prescription', 'E_PrescriptionController@storeE_prescription');

Route::post('/e_prescription/fetchEO', 'E_PrescriptionController@fetchEO');

Route::post('/e_prescription/destroyE_prescription', 'E_PrescriptionController@destroyE_prescription');



