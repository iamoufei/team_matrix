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
Route::get('/alert', function (){
    return view('alert');
})->name('alert');

Auth::routes();

Route::group(['middleware' =>  ['web', 'userProfile']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    Route::get('/task', 'TaskController@index')->name('task');


    Route::get('/department', 'DepartmentController@index')->name('department');

    Route::get('/staff', 'StaffController@index')->name('staff');
    Route::post('/staff/update', 'StaffController@update')->name('staff_update');


    Route::get('/group', 'GroupController@index')->name('group');
});