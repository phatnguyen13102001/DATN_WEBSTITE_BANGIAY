<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    

});
Route::post('sendPasswordResetLink', 'App\Http\Controllers\admin\PasswordResetRequestController@sendEmail');
Route::post('resetPassword', 'App\Http\Controllers\admin\ChangePasswordController@passwordResetProcess');
Route::post('Forgotpassword', 'App\Http\Controllers\admin\PasswordResetRequestController@sendEmail');
Route::post('ResetPasswordForm', 'App\Http\Controllers\admin\ChangePasswordController@passwordResetProcess');
