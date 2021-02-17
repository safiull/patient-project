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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('users', 'UsersController@index');
Route::get('/patients', 'PatientController@index');
Route::get('/patient/card/{card_id}', 'PatientController@card');

Route::get('/e_prescription', 'E_PrescriptionController@index');




