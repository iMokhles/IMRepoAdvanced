<?php

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register user routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "user" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('login', 'Auth\LoginController@login')->name('user.login');
Route::post('logout', 'Auth\LoginController@logout')->name('user.logout');
Route::get('logout', 'Auth\LoginController@logout')->name('user.logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('register', 'Auth\RegisterController@register')->name('user.register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('user.password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('user.password.reset');

Route::get('/home', 'HomeController@index')->name('user.home');
Route::get('/', 'HomeController@redirect')->name('user.redirect');

Route::get('edit-account-info', 'Auth\UserAccountController@showAccountInfoForm')->name('user.account.info');
Route::post('edit-account-info', 'Auth\UserAccountController@accountInfoForm')->name('user.account.info');
Route::get('change-password', 'Auth\UserAccountController@showChangePasswordForm')->name('user.account.password');
Route::post('change-password', 'Auth\UserAccountController@changePasswordForm')->name('user.account.password');

Route::get('/email/verify', 'Auth\VerificationController@show')->name('user.verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('user.verification.verify');
Route::get('/email/resend', 'Auth\VerificationController@resend')->name('user.verification.resend');
