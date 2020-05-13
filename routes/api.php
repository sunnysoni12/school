<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('iHaveArrived', 'Api\ApiController@iHaveArrived');
Route::post('generateQrCode', 'Api\ApiController@genarateQrCode');
Route::post('dispersalDetail', 'Api\ApiController@DispersalDetail');
Route::post('disperseStudent', 'Api\ApiController@disperseStudent');
Route::post('delegate', 'Api\ApiController@delegate');
Route::post('teacherSchedule', 'Api\ApiController@teacher_schedule');


Route::post('galleryUploads', 'Api\ApiController@galleryUploads');
Route::post('galleryupdate', 'Api\ApiController@galleryupdate');
Route::post('listGallery', 'Api\ApiController@listGallery');


//Route::post('read', 'Api\ApiController@readcode');
Route::post('submit', 'Api\ApiController@submit');

Route::post('search', 'Api\DisciplineController@search');
Route::post('updateDiscipline', 'Api\DisciplineController@update_discipline');
Route::post('insertDiscipline', 'Api\DisciplineController@insert_discipline');
Route::get('childDiscipline/{id}', 'Api\DisciplineController@parent_child_discipline');
Route::post('childDisciplineByMonth', 'Api\DisciplineController@parent_child_discipline_monthly');


Route::post('leaveSubmit', 'Api\LeaveController@leave_insert');
Route::post('leaveUpdate', 'Api\LeaveController@leave_update');
Route::get('leaveList', 'Api\LeaveController@leave_list');
Route::get('leaveListParent/{id}', 'Api\LeaveController@leave_list_parent');



//Estore Urls//
Route::get('estore/categoryList', 'Api\EstoreController@category_list');
Route::post('estore/insertCategory', 'Api\EstoreController@insert_category');
Route::post('estore/updateCategory', 'Api\EstoreController@update_category');

Route::get('estore/itemsList/{category_id}', 'Api\EstoreController@items_list_category');
Route::post('estore/insertItems', 'Api\EstoreController@insert_items');
Route::post('estore/updateItems', 'Api\EstoreController@update_items' );
Route::get('estore/itemsList', 'Api\EstoreController@items_list');

Route::post('estore/addToCart', 'Api\EstoreController@add_to_cart');
Route::post('estore/updateCIart', 'Api\EstoreController@update_cart');
Route::get('estore/listCart/{parent_id}', 'Api\EstoreController@list_cart');
Route::delete('estore/deleteCartItem/{id}', 'Api\EstoreController@delete_cart_item');
Route::post('estore/placeOrder', 'Api\EstoreController@placeOrder');












