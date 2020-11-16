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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'auth'],function(){
    Route::get('','AdminController@index')->name('admin.index');
    Route::get('/logout','AdminController@logout')->name('logout');

    Route::group(['prefix'=>'ajax'],function(){
        Route::post('/checkMail','AjaxController@check_mail')->name('ajax.check_mail');
        Route::post('/getStatus','AjaxController@get_status')->name('ajax.get_status');
    });

    include_once 'admin/user.php';    
    include_once 'admin/medicines.php';    
    include_once 'admin/shipment.php';    

});

//login admin
Route::get('admin/login','Admin\AdminController@login')->name('login');
Route::post('admin/login','Admin\AdminController@post_login')->name('login');