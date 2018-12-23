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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', 'HomeController@index');
Route::get('/about-us',[
    'uses'=>'HomeCOntroller@about',
    'as'=>'about' 
]);
Route::get('/product', 'HomeController@product');
Route::get('/gallery', 'HomeController@gallery');
Route::get('/safety-concern', 'HomeController@safety_concern');
Route::get('/contact', 'HomeController@contact');


// Cart ----------------------------------------------
    Route::get('add-to-cart/{id}', 'CartController@addToCart');
    Route::get('show-cart', 'CartController@showCart');
    Route::get('delete-cart/{id}', 'CartController@deleteCart');
    Route::post('update-cart', 'CartController@updateCart');

// Checkout ----------------------------------------------------------
    Route::get('checkout', 'CheckoutController@index');
    Route::post('customer-registration', 'CheckoutController@registration');
    Route::get('billing-address', 'CheckoutController@billingAddress');
    Route::post('save-billing-info', 'CheckoutController@saveBillingInfo');
    Route::get('shipping', 'CheckoutController@shipping');
    Route::post('save-shipping-info', 'CheckoutController@saveShipping');
    Route::get('payment', 'CheckoutController@payment');
    Route::post('save-order', 'CheckoutController@saveOrder');

Auth::routes();



Route::group(['middleware' => 'UserAuth'], function() {
    Route::get('/dashboard', 'AdminController@index')->name('Dashboard');
    
// category -------------------------------------------------------
    Route::get('/add-category', 'CategoryController@add')->name('Add Category');
    Route::get('/manage-category', 'CategoryController@view')->name('Manage Category');
    Route::get('update-category-status/{status}/{id}', 'CategoryController@updatePublicationStatus');
    Route::get('/edit-category/{edit_id}', 'CategoryController@edit')->name('Edit Category');
    Route::post('/save-category', 'CategoryController@save');
    Route::get('/delete-category/{del_id}', 'CategoryController@delete');



//product -------------------------------------------------
    Route::get('/add-product', 'ProductController@add')->name('Add Product');
    Route::post('/save-product', 'ProductController@store')->name('Save Product');
    Route::get('/manage-product', 'ProductController@manage');
    Route::get('/view-product/{id}', 'ProductController@view');
    Route::get('/edit-product/{id}', 'ProductController@edit');
    Route::post('/update-product', 'ProductController@store');
    Route::get('update-product-status/{status}/{id}', 'ProductController@updatePublicationStatus');
    Route::get('/update-status/{status}/{id}', 'ProductController@update_status');
    Route::get('/delete-product/{id}', 'ProductController@delete');


// Gallery ----------------------------------------------------------------
    Route::get('add-gallery-image', 'GalleryController@create');
    Route::post('save-gallery-image', 'GalleryController@store');
    Route::get('manage-gallery', 'GalleryController@manage');
    Route::get('update-gallery-image-status/{status}/{id}', 'GalleryController@updatePublicationStatus');
    Route::get('view-gallery-image/{id}', 'GalleryController@show');
    Route::get('edit-galllery-image/{id}', 'GalleryController@edit');
    Route::post('update-gallery-image', 'GalleryController@update');
    Route::get('/delete-image/{id}', 'GalleryController@delete');



// Order ------------------------------------------------------------
    Route::get('manage-order', 'OrderController@index');
    Route::get('view-order/{id}', 'OrderController@viewOrder');
    Route::get('edit-order/{id}', 'OrderController@editOrder');
    Route::post('update-order', 'OrderController@updateOrder');
    Route::get('delete-order/{id}', 'OrderController@deleteOrder');
    Route::get('delete-order-item/{id}', 'OrderController@deleteOrderItem');
    Route::get('confirm-order/{id}', 'OrderController@confirmOrder');
    Route::get('download-order/{id}', 'OrderController@downloadOrder');
    Route::get('export-excel-order', 'OrderController@exportExcel');
    Route::get('export-excel', 'OrderController@exportExcelFromBlade');

// Email --------------------------------------------
    Route::get('send-email', 'CheckoutController@sendEmail');
});

