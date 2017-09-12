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

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


Route::get('/confirm_register/{confirm_code?}', 'Auth\RegisterController@confirmRegister');

//Route::get('/mail/send', function (){
//    Mail::to('hihere123@sina.com')->send(new \App\Mail\OrderShipped());
//});