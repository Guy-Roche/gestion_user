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

//restreindre les accès à la page administrateur avec
// le gate manager-users
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manager-clients')->group(function() {
    Route::resource('clients', 'ClientsController');
});
Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manager')->group(function() {
    Route::resource('roles', 'RolesController');
    Route::resource('users', 'UsersController');
});

