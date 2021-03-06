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

// Route::get('/', function () {
//     return view('pages.home');
// });
//------------------------ frontend------------------
Route::get('/trang-chu','HomeController@index')->name('home');
// danh muc va thuong hieu
Route::get('shop/danh-muc-san-pham/{id}','CategoryProductController@showCateHome')->name('cate_pro');
Route::get('shop/thuong-hieu-san-pham/{id}','BrandProductController@showBrandHome')->name('brand');
Route::get('chi-tiet-san-pham/{rowId}','ProductController@detail')->name('detail');
Route::get('tim-kiem-san-pham','HomeController@seach')->name('product.seach');

//gio hang-----------------------------------------------
Route::post('them-vao-gio-hang','CartController@addCart')->name('addToCart');
Route::get('them-vao-gio-hang','CartController@showCart')->name('showCart');
Route::get('xoa-gio-hang/{id}','CartController@destroy')->name('delete.cart');
Route::post('cap-nhat-gio-hang','CartController@update_qty')->name('cart.update_qty');
//dang ky dang nhap----------------------------------------
Route::get('dang-nhap-dang-ky','CheckoutController@check_out')->name('checkout.login');
Route::post('dang-nhap-dang-ky','CheckoutController@check_in')->name('checkout.postlogin');
Route::post('them-tai-khoan-khach-hang','CheckoutController@addCustomer')->name('checkout.addCtm');
Route::post('dang-xuat/{id}','CheckoutController@checkout_logout')->name('checkout.logout');
//thanh toan-------------------------------------------
Route::get('tien-hanh-thanh-toan','CheckoutController@get_out')->name('checkout.out');
Route::post('tien-hanh-thanh-toan','PaymentController@postpayment')->name('postpayment');


Route::get('dat-hang','ShippingController@store')->name('checkout.customer');

Route::get('thanh-toan','ShippingController@payment')->name('payment');
//-------------backend-------------------------------
Route::get('admin','AdminController@index')->name('admin');
Route::get('dashboard','AdminController@show_dashboard')->name('dashboard');
Route::post('dashboard','AdminController@dashboard')->name('admin_dashboard');
Route::get('logout','AdminController@logout')->name('admin_logout');
// danh muc san pham
Route::resource('danh-muc-san-pham','CategoryProductController');
Route::get('an-danh-muc-san-pham/{id}','CategoryProductController@un_active')->name('cate_pro.un_active');
Route::get('hien-danh-muc-san-pham/{id}','CategoryProductController@active')->name('cate_pro.active');
// thuong hieu
Route::resource('thuong-hieu-san-pham','BrandProductController');
Route::get('an-thuong-hieu-san-pham/{id}','BrandProductController@un_active')->name('brand.un_active');
Route::get('hien-thuong-hieu-san-pham/{id}','BrandProductController@active')->name('brand.active');
	// san pham
Route::resource('san-pham','ProductController');
Route::get('an-san-pham/{id}','ProductController@un_active')->name('product.un_active');
Route::get('hien-san-pham/{id}','ProductController@active')->name('product.active');
Route::get('san-pham/cate/{id}','ProductController@brand');
Route::get('add','AdminController@add');
Route::resource('quan-ly-don-hang','CheckoutController');
	

