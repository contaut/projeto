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

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/admin/login', 'Auth\AdminLoginController@index')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

Route::get('clientes/import', 'ClienteController@import')->name('clientes/import');
Route::post('clientes/importFile', 'ClienteController@importFile')->name('clientes/importFile');

Route::resource('clientes', 'ClienteController', ['except' => 'destroy']);
Route::get('cliente/delete/{id}', 'ClienteController@destroy');
Route::get('cliente/updateStatus/{id}', 'ClienteController@updateStatus');

Route::post('/script', 'PythonController@run');
