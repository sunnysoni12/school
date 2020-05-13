<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'qrController@index');


Route::get('qrcode/{id}', 'qrController@sendqr');
Route::get('read', 'qrController@read');
Route::post('upload-submit', 'qrController@upload_submit');
Route::post('submit', 'qrController@submit');


Route::get('discipline', 'qrController@disciplinehome');
Route::get('paymentHistory', 'qrController@paymentHistory');

Route::get('paywithrazorpay/{student_id}', 'RazorpayController@payWithRazorpay')->name('paywithrazorpay');
// Post Route For Makw Payment Request
Route::post('payment', 'RazorpayController@payment')->name('payment');



Route::get('categoryList', 'qrController@store_category');
Route::get('editCategory/{id}', 'qrController@edit_store_category');
Route::get('deleteCategory/{id}', 'qrController@deleteCategory');

Route::get('itemsList', 'qrController@store_items');
Route::get('editItems/{id}', 'qrController@edit_store_items');
Route::get('deleteItems/{id}', 'qrController@deleteItems');
Route::post('/estore/insertItem', 'qrController@insertItem');
Route::post('/estore/updateItem', 'qrController@updateItem');


Route::get('gallery', 'qrController@upload');
Route::post('insertgalleryUpload', 'qrController@insertGallery')->name('gallery.upload');
Route::get('deleteGallery/{id}', 'qrController@deleteGallery');
Route::get('editGallery/{id}', 'qrController@editGallery');
Route::post('updateGallery', 'qrController@updateGallery');


