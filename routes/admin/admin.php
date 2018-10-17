<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('login', 'Auth\LoginController@login')->name('admin.login');
Route::post('logout', 'Auth\LoginController@logout')->name('admin.logout');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
Route::post('register', 'Auth\RegisterController@register')->name('admin.register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.reset');

Route::get('/home', 'HomeController@index')->name('admin.home');
Route::get('/', 'HomeController@redirect')->name('admin.redirect');

Route::get('edit-account-info', 'Auth\AdminAccountController@showAccountInfoForm')->name('admin.account.info');
Route::post('edit-account-info', 'Auth\AdminAccountController@accountInfoForm')->name('admin.account.info');
Route::get('change-password', 'Auth\AdminAccountController@showChangePasswordForm')->name('admin.account.password');
Route::post('change-password', 'Auth\AdminAccountController@changePasswordForm')->name('admin.account.password');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('admin.verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('admin.verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('admin.verification.resend');
