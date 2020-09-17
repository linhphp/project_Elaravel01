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
Route::get('chi-tiet-san-pham/{id}','ProductController@detail')->name('detail');


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
	

