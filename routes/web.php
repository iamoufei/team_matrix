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

Route::get('/confirm_email/{confirm_code}', 'HomeController@registerConfirm');

Auth::routes();

Route::group(['middleware' =>  ['web', 'userProfile']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
});