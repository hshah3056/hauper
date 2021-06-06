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

\Illuminate\Support\Facades\Auth::routes();

Route::get('/register/{token}', 'Auth\RegisterController@redirectPath')->name('register-auth');
Route::post('/register/{token}', 'Auth\RegisterController@redirectPath')->name('register-auth');

Route::post('password/reset', 'Auth\RegisterController@redirectLoginPath');

Route::get('dashboard', 'DashboardController@index')->name('dashboard');

Route::get('profile', 'ProfileController@index')->name('profile');
Route::post('profile', 'ProfileController@index')->name('profile');

Route::get('mail', 'MailController@sendSignupEmail')->name('mail');


Route::get('user-view', 'UserController@index')->name('user-view');
Route::post('user-view', 'UserController@index')->name('user-view');

Route::get('user', 'UserController@create')->name('user-create');
Route::post('user', 'UserController@create')->name('user-create');

Route::get('update/{id}', 'UserController@updateUser')->name('user-update');
Route::post('update/{id}', 'UserController@updateUser')->name('user-update');

Route::delete('users/{id}', 'UserController@destroy')->name('users.destroy');
