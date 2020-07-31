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

route::group(['prefix'=>'trang_backend','middleware'=>'auth'], function(){
	Route::get('/','Backend\BackendController@index')->name('admin');
	route::get('trang_danh_sach_danh_muc','Backend\CategoryController@getList')->name('page_list_category');
	route::get('trang_them_danh_muc','Backend\CategoryController@add')->name('page_add_category');
	route::post('trang_them_danh_muc','Backend\CategoryController@setadd')->name('page_add_category');
	route::get('trang_xoa_danh_muc/{id}','Backend\CategoryController@del')->name('page_del_category');
	route::get('trang_sua_danh_muc/{id}','Backend\CategoryController@edit')->name('page_update_category');
	route::post('trang_sua_danh_muc/{id}','Backend\CategoryController@update')->name('page_update_category');
	route::get('tim_kiem_danh_muc','Backend\CategoryController@search')->name('search_category');
	//new
	route::get('trang_danh_sach_tin_tuc','Backend\NewController@getList')->name('page_list_new');
	route::get('trang_them_tin_tuc','Backend\NewController@add')->name('page_add_new');
	route::post('trang_them_tin_tuc','Backend\NewController@setadd')->name('page_add_new');
	route::get('trang_xoa_tin_tuc/{id}','Backend\NewController@del')->name('page_del_new');
	route::get('trang_sua_tin_tuc/{id}','Backend\NewController@edit')->name('page_update_new');
	route::post('trang_sua_tin_tuc/{id}','Backend\NewController@update')->name('page_update_new');
	route::get('tim_kiem_tin_tuc','Backend\NewController@search')->name('search_new');
	//customer
	route::get('trang_danh_sach_khach_hang','Backend\CustomerController@getList')->name('page_list_customer');
	route::get('trang_them_khach_hang','Backend\CustomerController@add')->name('page_add_customer');
	route::post('trang_them_khach_hang','Backend\CustomerController@setadd')->name('page_add_customer');
	route::get('trang_xoa_khach_hang/{id}','Backend\CustomerController@del')->name('page_del_customer');
	route::get('trang_sua_khach_hang/{id}','Backend\CustomerController@edit')->name('page_update_customer');
	route::post('trang_sua_khach_hang/{id}','Backend\CustomerController@update')->name('page_update_customer');
	route::get('tim_kiem_khach_hang','Backend\CustomerController@search')->name('search_customer');
	//product
	route::get('trang_danh_sach_san_pham','Backend\ProductController@listpro')->name('page_list_product');
	route::get('trang_them_san_pham','Backend\ProductController@add')->name('page_add_product');
	route::post('trang_them_san_pham','Backend\ProductController@setadd')->name('page_add_product');
	route::get('trang_xoa_san_pham/{id}','Backend\ProductController@del')->name('page_del_product');
	route::get('trang_sua_san_pham/{id}','Backend\ProductController@edit')->name('page_update_product');
	route::post('trang_sua_san_pham/{id}','Backend\ProductController@update')->name('page_update_product');
	route::get('tim_kiem_san_pham','Backend\ProductController@search')->name('search_product');
	route::get('them_anh_chi_tiet/{id}','Backend\ProductController@add_image')->name('page_add_img');
	route::post('them_anh_chi_tiet1','Backend\ProductController@them_anh')->name('page_add_img1');
	route::get('xoa_chi_tiet_sp/{id}','Backend\ProductController@del_img')->name('page_del_img');
	route::get('xoa_chi_tiet_sp/{id}','Backend\ProductController@del_img')->name('page_del_img');
	route::get('trang_sua_san_pham_detail/{id}','Backend\ProductController@edit_detail')->name('page_update_product_detail');
	route::post('trang_sua_san_pham_detail/{id}','Backend\ProductController@update_detail')->name('page_update_product_detail');
	//slide
	route::get('trang_danh_sach_slide','Backend\SlideController@listSlide')->name('page_list_slide');
	route::get('trang_them_slide','Backend\SlideController@addSlide')->name('page_add_slide');
	route::post('trang_them_slide','Backend\SlideController@setadd')->name('page_add_slide');
	route::get('trang_xoa_slide/{id}','Backend\SlideController@del')->name('page_del_slide');
	route::get('trang_sua_slide/{id}','Backend\SlideController@edit')->name('page_update_slide');
	route::post('trang_sua_slide/{id}','Backend\SlideController@update')->name('page_update_slide');
	route::get('tim_kiem_slide','Backend\SlideController@search')->name('search_slide');
	//order
	route::get('trang_danh_sach_order','Backend\OrderController@listOrder')->name('page_list_order');
	route::get('trang_xoa_order/{id}','Backend\OrderController@del')->name('page_del_order');
	route::get('trang_sua_order/{id}','Backend\OrderController@edit')->name('page_update_order');
	route::post('trang_sua_order/{id}','Backend\OrderController@update')->name('page_update_order');
	route::get('trang_tim_kiem_order','Backend\OrderController@search')->name('page_search_order');
	route::get('trang_xem_chi_tiet_order/{id}','Backend\OrderController@xem_chi_tiet')->name('page_xem_chi_tiet_order');
	route::get('trang_sua_order_detal/{id_order}','Backend\OrderController@edit_order_detail')->name('page_update_order_detail');
	route::post('trang_sua_order_detal/{id_order}','Backend\OrderController@update_order_detail')->name('page_update_order_detail');
	route::get('trang_in_don_hang/{id_order}','Backend\OrderController@in_don_hang')->name('page_in_don_hang');
	//order_detail
	route::get('trang_danh_sach_orderdetail','Backend\OrderdetailController@listOrderdetail')->name('page_list_orderdetail');
	//user
	route::get('account','Backend\UserController@index')->name('account');
	route::post('account','Backend\UserController@create')->name('post_account');
	route::get('trang_xoa_acc/{id}','Backend\UserController@del')->name('page_del_acc');
	//comment
	route::get('trang_danh_sach_binh_luan','Backend\BinhluanController@list')->name('page_list_binh_luan');
	route::get('trang_xóa_binh_luan/{id}','Backend\BinhluanController@del')->name('page_del_binh_luan');
	//rating
	route::get('trang_danh_sach_dang_gia','Backend\BinhluanController@list_rating')->name('page_list_danh_gia');
	route::get('trang_xóa_danh_gia/{id}','Backend\BinhluanController@del_rating')->name('page_del_danh_gia');
	//report
	route::get('trang_gui_bao_cao','Backend\ReportController@getReport')->name('getReport');
	route::get('trang_bao_cao_1_ngay','Backend\ReportController@onedayReport')->name('onedayReport');
	route::get('trang_bao_cao_nhieu_ngay','Backend\ReportController@manydayReport')->name('manydayReport');
	route::get('trang_bao_cao_san_pham_cu','Backend\ReportController@product_old')->name('productOld');
	route::get('xuat_bao_cao_1_ngay/{created_at}','Backend\ReportController@xuatReportoneday')->name('xuatReportoneday');
	route::get('xuat_bao_cao_nhieu_ngay/{created_at_1}/{created_at_2}','Backend\ReportController@xuatReportmanyday')->name('xuatReportmanyday');
	
}); 
	route::get('admin/login','Backend\BackendController@login')->name('login');
	route::post('admin/login','Backend\BackendController@postlogin')->name('postlogin');
	route::get('admin/logout','Backend\BackendController@logout')->name('logout');

///////////////////////////////////////////////////////////////////////////////////////////

route::get('/','HomeController@index')->name('home');
route::get('getinfor&{id}','HomeController@getinfor')->name('prinfo');
route::get('trang_san_pham','HomeController@getProduct')->name('getProduct');
route::get('spc',function(){return view('layout.shop.shoping-cart');})->name('shoping-cart');
route::get('check_out','HomeController@checkOut')->name('checkOut');
route::post('check_out','HomeController@postcheckOut');
route::get('dang_nhap','HomeController@dangnhap')->name('dang_nhap');
route::post('dang_nhap','HomeController@post_dangnhap');
route::get('dang_xuat','HomeController@dangxuat')->name('dang_xuat');
route::get('dang_ky','HomeController@dangky')->name('dang_ky');
route::post('dang_ky','HomeController@post_dangky');
route::get('gioi_thieu','HomeController@gioithieu')->name('gioithieu');
route::get('lien_he','HomeController@lienhe')->name('lienhe');
Route::get('search', 'HomeController@search')->name('search');
Route::get('tin tuc', 'HomeController@new')->name('new');
route::get('product_detail/{id}','HomeController@product_detail')->name('product_detail');
route::post('comment/{id}','HomeController@postComment')->name('post_comment');
route::post('rating_star/{id}','HomeController@rating_star')->name('rating_star');
route::get('rating_star/{id}','HomeController@get_rating_star')->name('get_rating_star');

///////////////////////////////////////////////////////////////////////////////////////////

route::group(['prefix'=>'cart'],function(){
	route::get('add/{id}','CartController@add')->name('add');
	route::post('update','CartController@update')->name('update');
	route::get('delete/{id}','CartController@delete')->name('delete');
	route::get('deleteAll','CartController@deleteAll')->name('deleteAll');
	route::get('/','CartController@show')->name('show_cart');

});

