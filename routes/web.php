<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;

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
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

//ROUTES AUTH
Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('register','HomeController@index');
Route::get('password/reset','HomeController@index');
Route::get('/sideface', 'UserController@sideface')->name('sideface');

//ROUTES COMPANY
Route::resource('company','CompanyController')->except('destroy');
Route::post('company.search','CompanyController@search')->name('company.search');

//ROUTES USER
Route::resource('user','UserController')->except('destroy');
Route::post('user.search','UserController@search')->name('user.search');
Route::post('/user','UserController@store')->name('user.store');
Route::get('/edituser/{user}','UserController@edituser')->name('user.edituser');
Route::put('/userupdate/{user}','UserController@updateuser')->name('user.updateuser');
Route::get('user/sideface', 'UserController@sideface');

//ROUTES SERVICES
Route::resource('service','ServiceController')->except('destroy');
Route::post('service.search','ServiceController@search')->name('service.search');

//ROUTES ROLES
Route::resource('role','RoleController')->except('destroy');
Route::post('role.search','RoleController@search')->name('role.search');
Route::get('role/sideface', 'UserController@sideface')->name('role/sideface');

//ROUTES SOLICITUDES
Route::resource('solicitude','SolicitudeController')->except('destroy');
Route::post('solicitude.search','SolicitudeController@search')->name('solicitude.search');
Route::post('/solicitude/selectcity','SolicitudeController@cities');

Route::get('/editsolicitude/{solicitude}','solicitudeController@editsolicitude')->name('solicitude.editsolicitude');






































