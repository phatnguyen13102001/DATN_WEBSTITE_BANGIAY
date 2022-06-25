<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;
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

Route::get('admin', function () {
    return view('admin.dashboard.index');
})->name('admin');

/*user*/
Route::get('', function () {
    return view('user.body.index');
})->name('indexuser');
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
// gio hang
Route::get('giohang', function () {
    return view('user.cart.index');
})->name('giohangweb');
// login
Route::get('dangnhap', function () {
    return view('login.index');
})->name('dangnhapweb');
