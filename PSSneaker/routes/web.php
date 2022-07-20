<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AccountController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\ManufacturerController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\AboutController;
use App\Http\Controllers\admin\LogoController;
use App\Http\Controllers\admin\ColorController;
use App\Http\Controllers\admin\SizeController;
use App\Http\Controllers\admin\SlideshowController;
use App\Http\Controllers\admin\NewsController;
use App\Http\Controllers\admin\PoliciesController;
use App\Http\Controllers\admin\SocialController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\FacebookController;
use App\Http\Controllers\admin\GoogleController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\OrderAdminController;
use App\Http\Controllers\admin\StatisticController;
/* Controller FrontEnd */
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
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
// 
// Route::get('/lienhe', [EmailController::class,'create'])->name('lienheweb');
// Route::post('/lienhe', [EmailController::class,'sendEmail1'])->name('lienhewweb.submit');
Route::middleware('admin')->group(function () {
    Route::resource('/admin/account', AccountController::class);
    Route::resource('/admin/information', AdminController::class);
    Route::resource('/admin/payment', PaymentController::class);
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
    Route::resource('/admin/order', OrderAdminController::class);
    Route::resource('/admin/statistic', StatisticController::class);
    Route::get('admin/doimatkhauadmin', [AccountController::class, 'changepasswordadmin'])->name('doimatkhauadmin'); 
    Route::post('admin/capnhatmatkhauadmin', [AccountController::class, 'updatepasswordadmin'])->name('capnhatmatkhauadmin');
    Route::get('admin', function () {
        return view('admin.dashboard.index');
    })->name('admin');
    // 
    Route::post('/filter-by-date', [StatisticController::class, 'filter_by_date']);
    /* Destroy */
    Route::get('/admin/size/destroy', [SizeController::class, 'destroy'])->name('size.destroy');
    Route::get('/admin/slideshow/destroy', [SlideshowController::class, 'destroy'])->name('slideshow.destroy');
    Route::get('/admin/color/destroy', [ColorController::class, 'destroy'])->name('color.destroy');
    Route::get('/admin/manufacturer/destroy', [ManufacturerController::class, 'destroy'])->name('manufacturer.destroy');
    Route::get('/admin/news/destroy', [NewsController::class, 'destroy'])->name('news.destroy');
    Route::get('/admin/policy/destroy', [PoliciesController::class, 'destroy'])->name('policy.destroy');
    Route::get('/admin/social/destroy', [SocialController::class, 'destroy'])->name('social.destroy');
    Route::get('/admin/product/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/admin/payment/destroy', [PaymentController::class, 'destroy'])->name('payment.destroy');
    Route::get('/admin/order/destroy', [OrderController::class, 'destroy'])->name('order.destroy');
    /* Search */
    Route::get('/searchsize', [SizeController::class, 'search']);
    Route::get('/searchcolor', [ColorController::class, 'search']);
    Route::get('/searchmanufacturer', [ManufacturerController::class, 'search']);
    Route::get('/searchpolicy', [PoliciesController::class, 'search']);
    Route::get('/searchnews', [NewsController::class, 'search']);
    Route::get('/searchslideshow', [SlideshowController::class, 'search']);
    Route::get('/searchsocial', [SoicalController::class, 'search']);
    Route::get('/searchproduct', [ProductController::class, 'search']);
    Route::get('/searchuser', [AccountController::class, 'search']);
    Route::get('/searchpayment', [PaymentController::class, 'search']);
    Route::get('/searchproductindex', [FrontendController::class, 'search']);
    /* Block User */
    Route::put('/admin/account/update', [AccountController::class, 'update'])->name('user.update');
    Route::get('/admin/account/edit/{id}', [AccountController::class, 'edit']);

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
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
/*Route Handle FrondEnd */
Route::get('/gioithieu', [FrontendController::class, 'getabout'])->name('gioithieuweb');
Route::get('/index', [FrontendController::class, 'getindex'])->name('index');
Route::get('/product', [FrontendController::class, 'getproduct'])->name('product');
Route::get('/news', [FrontendController::class, 'getnews'])->name('news');
Route::get('/productdetail/{id}', [FrontendController::class, 'getproductdetail'])->name('productdetail');
Route::get('/product_by_manufacturer/{id}', [FrontendController::class, 'getproductbymanu'])->name('productbymanu');
Route::get('/newsdetail/{id}', [FrontendController::class, 'getnewsdetail'])->name('newsdetail');
Route::get('/index/{id}', [FrontendController::class, 'getindex']);
Route::post('/autocomplete-ajax', [FrontendController::class, 'autocomplete_ajax']);
Route::post('/tim-kiem', [FrontendController::class, 'search'])->name('timkiem');

/* Add To Cart */
Route::post('/add-to-cart', [CartController::class, 'addtocart'])->name('addtocart');
Route::get('/show-cart', [CartController::class, 'show_cart'])->name('showcart');
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/update-to-cart/{rowId}/{qty}', [CartController::class, 'update_to_cart']);
Route::get('getdistrict', [CartController::class, 'getDistrict'])->name('getdistrict');
Route::get('getward', [CartController::class, 'getWard'])->name('getward');

/* Add Order OrderDetail */

Route::post('/order', [OrderController::class, 'insertOrder'])->name('order');
Route::get('/chinhsach/{id}', [FrontendController::class, 'getpolicesdetail'])->name('chinhsach');
Route::get('/thongtincanhan/{id}', [FrontendController::class, 'getprofile'])->name('thongtincanhanweb');
Route::get('/lichsu/{id}', [FrontendController::class, 'showhistory'])->name('lichsudonhang'); 
Route::get('/chitietdonhang/{id}', [FrontendController::class, 'showhistorydetail'])->name('chitietdonhang'); 
 
// 
Route::get('google', [GoogleController::class, 'redirectToGoogle']);
Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::get('/auth/redirect/{provider}', [FacebookController::class, 'redirect']);
Route::get('/auth/callback/{provider}', [FacebookController::class, 'callback']);
Route::get('Forgotpassword', function () {
    return view('Email.Forgotpassword');
})->name('Forgotpassword');

// dang nhap
Route::get('dangnhap', [LoginController::class, 'index'])->name('dangnhapweb');
Route::post('dangnhap', [LoginController::class, 'authenticate'])->name('dangnhapweb');
Route::get('dangki', [LoginController::class, 'showFormRegister'])->name('showdangkiweb');
Route::post('dangki', [LoginController::class, 'Register'])->name('dangkiweb');
// 
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/getsection', [LoginController::class, 'getsecsion'])->name('section');
Route::get('edit/thongtincanhan', [LoginController::class, 'editprofile'])->name('chinhsuatthongtin');
Route::post('edit/thongtincanhan', [LoginController::class, 'Updateprofile'])->name('capnhatthongtin');
// đổi mật khẩu
Route::get('/doimatkhau', [LoginController::class, 'changepassword'])->name('doimatkhau'); 
Route::post('/capnhatmatkhau', [LoginController::class, 'updatepassword'])->name('capnhatmatkhau');
//

Route::get('/lienhe', [EmailController::class, 'create'])->name('lienheweb');
Route::post('/lienhepost', [EmailController::class, 'sendEmail'])->name('lienheweb.post');

// 
Route::get('/quen-mat-khau', [EmailController::class, 'quenmatkhau']);
Route::get('/update-new-pass', [EmailController::class, 'update_new_pass']);
Route::post('/recover-pass', [EmailController::class, 'recover_pass']);
Route::post('/reset-new-pass', [EmailController::class, 'reset_new_pass']);
// composer require laravel/ui