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
Route::resource('/admin/product', ProductController::class);
/* Destroy */
Route::get('/admin/size/destroy', [SizeController::class, 'destroy'])->name('size.destroy');
Route::get('/admin/slideshow/destroy', [SlideshowController::class, 'destroy'])->name('slideshow.destroy');
Route::get('/admin/color/destroy', [ColorController::class, 'destroy'])->name('color.destroy');
Route::get('/admin/manufacturer/destroy', [ManufacturerController::class, 'destroy'])->name('manufacturer.destroy');
Route::get('/admin/news/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
Route::get('/admin/policy/destroy', [PoliciesController::class, 'destroy'])->name('policy.destroy');
Route::get('/admin/social/destroy', [SocialController::class, 'destroy'])->name('social.destroy');
Route::get('/admin/product/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
/* Search */
Route::get('/searchsize', [SizeController::class, 'search']);
Route::get('/searchcolor', [ColorController::class, 'search']);
Route::get('/searchmanufacturer', [ManufacturerController::class, 'search']);
Route::get('/searchpolicy', [PoliciesController::class, 'search']);
Route::get('/searchnews', [NewsController::class, 'search']);
Route::get('/searchslideshow', [SlideshowController::class, 'search']);
Route::get('/searchsocial', [SoicalController::class, 'search']);
Route::get('/searchproduct', [ProductController::class, 'search']);

/* Stock */
Route::get('/admin/product/stock/{id}', [ProductController::class, 'stock'])->name('product.stock');
Route::post('/admin/product/stock/add', [ProductController::class, 'insert'])->name('stock.add');
Route::delete('/admin/product/stock/delete', [ProductController::class, 'delete'])->name('stock.delete');
Route::put('/admin/product/stock/refresh', [ProductController::class, 'refresh'])->name('stock.refresh');
Route::get('/admin/product/stock/edit/{id}', [ProductController::class, 'editstock']);

/* Library */
Route::get('/admin/product/library/{id}', [ProductController::class, 'library'])->name('product.library');
Route::post('/admin/product/library/add', [ProductController::class, 'insertlib'])->name('library.add');
Route::patch('/admin/product/library/updatelib', [ProductController::class, 'updatelib'])->name('library.update');
Route::get('/admin/product/library/edit/{id}', [ProductController::class, 'editlib']);
Route::delete('/admin/product/library/deletelib', [ProductController::class, 'deletelib'])->name('library.deletelib');

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
Route::get('product-index', function () {
    return view('admin.product.index');
})->name('product-index');

Route::get('product-add', function () {
    return view('admin.product.add');
})->name('product-add');
