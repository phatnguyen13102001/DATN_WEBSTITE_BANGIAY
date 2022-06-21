<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProductController;

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
    return view('/admin/index');
});
Route::get('dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard');
Route::get('account', function () {
    return view('admin.account.index');
})->name('account');
Route::get('product', function () {
    return view('admin.product.index');
})->name('product');
Route::get('product-edit', function () {
    return view('admin.product.edit');
})->name('product-edit');
Route::get('product-add', function () {
    return view('admin.product.add');
})->name('product-add');
Route::get('manufacturer', function () {
    return view('admin.manufacturer.index');
})->name('manufacturer');
Route::get('manufacturer-edit', function () {
    return view('admin.manufacturer.edit');
})->name('manufacturer-edit');
Route::get('manufacturer-add', function () {
    return view('admin.manufacturer.add');
})->name('manufacturer-add');
Route::get('about', function () {
    return view('admin.about.index');
})->name('about');
Route::get('logo', function () {
    return view('admin.logo.index');
})->name('logo');
Route::get('favicon', function () {
    return view('admin.favicon.index');
})->name('favicon');
Route::get('slideshow', function () {
    return view('admin.slideshow.index');
})->name('slideshow');
Route::get('slideshow-edit', function () {
    return view('admin.slideshow.edit');
})->name('slideshow-edit');
Route::get('slideshow-add', function () {
    return view('admin.slideshow.add');
})->name('slideshow-add');
Route::get('social', function () {
    return view('admin.social.index');
})->name('social');
Route::get('social-edit', function () {
    return view('admin.social.edit');
})->name('social-edit');
Route::get('social-add', function () {
    return view('admin.social.add');
})->name('social-add');
Route::get('news', function () {
    return view('admin.news.index');
})->name('news');
Route::get('news-edit', function () {
    return view('admin.news.edit');
})->name('news-edit');
Route::get('news-add', function () {
    return view('admin.news.add');
})->name('news-add');
Route::get('policy', function () {
    return view('admin.policy.index');
})->name('policy');
Route::get('policy-edit', function () {
    return view('admin.policy.edit');
})->name('policy-edit');
Route::get('policy-add', function () {
    return view('admin.policy.add');
})->name('policy-add');
Route::get('setting', function () {
    return view('admin.settingweb.index');
})->name('setting');
Route::get('order', function () {
    return view('admin.order.index');
})->name('order');
Route::get('order-detail', function () {
    return view('admin.order.order-detail');
})->name('order-detail');
Route::get('payment', function () {
    return view('admin.payment.index');
})->name('payment');
Route::get('payment-edit', function () {
    return view('admin.payment.edit');
})->name('payment-edit');
Route::get('payment-add', function () {
    return view('admin.payment.add');
})->name('payment-add');
Route::get('contact', function () {
    return view('admin.contact.index');
})->name('contact');
Route::get('contact-edit', function () {
    return view('admin.contact.edit');
})->name('contact-edit');
Route::get('inforadmin', function () {
    return view('admin.inforadmin.index');
})->name('inforadmin');
Route::get('changepassword', function () {
    return view('admin.changepassword.index');
})->name('changepassword');
