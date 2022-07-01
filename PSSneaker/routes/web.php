<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ManufacturerController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\SlideshowController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\LoginController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::middleware('admin')->group(function () {
    Route::resource('/admin/account', AccountController::class);
    Route::resource('/admin/manufacturer', ManufacturerController::class);
    Route::resource('/admin/setting', SettingController::class);
    Route::resource('/admin/about', AboutController::class);
    Route::resource('/admin/logo', LogoController::class);
    Route::resource('/admin/color', ColorController::class);
    Route::resource('/admin/size', SizeController::class);
    Route::resource('/admin/slideshow', SlideshowController::class);
    Route::resource('/admin/news', NewsController::class);
    Route::resource('/admin/policy', PoliciesController::class);
    Route::resource('/admin/social', SocialController::class);
    Route::resource('/admin/payment', PaymentController::class);
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('giohang', function () { return view('user.cart.index'); })->name('giohangweb');
});
// 
Route::get('google', 'App\Http\Controllers\GoogleController@redirectToGoogle');
Route::get('google/callback', 'App\Http\Controllers\GoogleController@handleGoogleCallback');
Route::get('/auth/redirect/{provider}', [FacebookController::class, 'redirect']);
Route::get('/auth/callback/{provider}', [FacebookController::class, 'callback']);

// gioi thieu
Route::get('gioithieu', function () {
    return view('user.introduce.index');
})->name('gioithieuweb');
// tin tuc
Route::get('tintuc', function () {
    return view('user.news.index');
})->name('tintucweb');
// chi tiet tin tuc
Route::get('chitiettintuc', function () {
    return view('user.news_detail.index');
})->name('chitiettintucweb');
// lien he
Route::get('lienhe', function () {
    return view('user.contact.index');
})->name('lienheweb');
// sanpham
Route::get('sanpham', function () {
    return view('user.product.index');
})->name('sanphamweb');
// thong tin ca nhan
Route::get('thongtincanhan', function () {
    return view('user.account.index');
})->name('thongtincanhanweb');
// chi tiet san pham
Route::get('chitietsanpham', function () {
    return view('user.product_detail.index');
})->name('chitietsanphamweb');
// index
Route::get('index', function () {
    return view('user.body.index');
})->name('indexuser');

Route::get('Forgotpassword', function () {
    return view('Email.Forgotpassword');
})->name('Forgotpassword');
Route::get('dangnhap', [LoginController::class, 'index'])->name('dangnhapweb');
Route::post('dangnhap', [LoginController::class, 'authenticate'])->name('dangnhapweb');
Route::get('dangki', [LoginController::class, 'showFormRegister'])->name('showdangkiweb');
Route::post('dangki', [LoginController::class, 'Register'])->name('dangkiweb');
Route::get('email', [LoginController::class, 'email'])->name('mail');

