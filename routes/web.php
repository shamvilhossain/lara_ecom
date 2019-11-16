<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','WelcomeController@index');
Route::get('/contact-us','WelcomeController@contact_us');
Route::get('/category-product/{id}','WelcomeController@category_product');


// for admin
Route::get('/adda','AdminController@index');
Route::post('/admin-login-check','AdminController@admin_login_check');
Route::get('/dashboard','SuperAdminController@index');
Route::get('/add-category','SuperAdminController@add_category');
Route::get('/manage-category','SuperAdminController@manage_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/unpublish-category/{id}','SuperAdminController@unpublish_category');
Route::get('/publish-category/{id}','SuperAdminController@publish_category');
Route::get('/delete-category/{id}','SuperAdminController@delete_category');
Route::get('/edit-category/{id}','SuperAdminController@edit_category');
Route::post('/update-category','SuperAdminController@update_category');


Route::get('/add-coupon','SuperAdminController@add_coupon');
Route::post('/save-coupon','SuperAdminController@save_coupon');

Route::get('/add-manufacturer','SuperAdminController@add_manufacturer');
Route::post('/save-manufacturer','SuperAdminController@save_manufacturer');
Route::get('/manage-manufacturer','SuperAdminController@manage_manufacturer');
Route::get('/unpublish-manufacturer/{id}','SuperAdminController@unpublish_manufacturer');
Route::get('/publish-manufacturer/{id}','SuperAdminController@publish_manufacturer');
Route::get('/delete-manufacturer/{id}','SuperAdminController@delete_manufacturer');
Route::get('/edit-manufacturer/{id}','SuperAdminController@edit_manufacturer');
Route::post('/update-manufacturer','SuperAdminController@update_manufacturer');


Route::get('/add-product','SuperAdminController@add_product');
Route::post('/save-product','SuperAdminController@save_product');
Route::get('/manage-product','SuperAdminController@manage_product');
Route::get('/unpublish-product/{id}','SuperAdminController@unpublish_product');
Route::get('/publish-product/{id}','SuperAdminController@publish_product');
Route::get('/delete-product/{id}','SuperAdminController@delete_product');
Route::get('/edit-product/{id}','SuperAdminController@edit_product');
Route::post('/update-product','SuperAdminController@update_product');

// product
Route::get('/product-details/{id}','WelcomeController@product_details');


// cart

Route::post('/add-to-cart','CartController@add_to_cart');
Route::get('/show-cart','CartController@show_cart');
Route::get('/remove-from-cart/{id}','CartController@remove_from_cart');


// checkout

Route::get('/customer-registration','CheckoutController@customer_registration');
Route::post('/save-customer','CheckoutController@save_customer');
Route::get('/payment','CheckoutController@payment');
Route::post('/place-order','CheckoutController@place_order');
Route::post('/order-successfull','CheckoutController@order_successfull');
Route::get('/customer-logout','CheckoutController@customer_logout');

// customer login 29-oct-2019
Route::post('/login-customer','WelcomeController@login_customer');
Route::get('/register','WelcomeController@register');


Route::get('/logout','SuperAdminController@logout');