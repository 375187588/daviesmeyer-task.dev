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

Route::get('/', 'Home\HomeController@index')->name('home.index');

Route::get('/login', 'Admin\AdminController@login')->name('admin.login');

Route::post('/login', 'Auth\AuthController@login')->name('auth.login');
Route::get('/logout',  'Auth\AuthController@logout')->name('auth.logout');

Route::get('/forgot-password', 'User\UserController@forgotPasswordForm')->name('forgot-password');
Route::post('/forgot-password', 'User\UserController@requestResetPassword')->name('forgot-password');
Route::get('/password-recover/{secret_token}', 'User\UserController@resetPasswordForm')->name('password-recover');
Route::post('/reset-password', 'User\UserController@resetPassword')->name('reset-password');

Route::group([
    'prefix'        => 'admin',
    'middleware'    => ['web','auth','permission'],
    'roles'         => ['admin']
], function () {
    Route::get('/', 'Admin\AdminController@index')->name('admin');
    Route::get('/profile/{id}', 'User\UserController@getProfile')->name('admin.getprofile');
    Route::post('/profile', 'User\UserController@profile')->name('admin.profile');
});