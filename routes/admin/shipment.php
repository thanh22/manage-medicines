<?php 
Route::group(['prefix'=>'shipment'],function(){

    Route::get('/','ShipmentController@index')->name('admin.shipment.index');
    
	Route::get('add','ShipmentController@add')->name('admin.shipment.add');
	Route::post('add','ShipmentController@post_add')->name('admin.shipment.add');

	Route::get('edit/{id}','ShipmentController@edit')->name('admin.shipment.edit');
	Route::post('edit/{id}','ShipmentController@post_edit')->name('admin.shipment.edit');
	
	Route::get('status/{id}','ShipmentController@status')->name('admin.shipment.status');
    Route::post('status/{id}','ShipmentController@post_status')->name('admin.shipment.status');
	
	Route::get('show/{id}','ShipmentController@show')->name('admin.shipment.show');

	Route::post('detached','ShipmentController@detached')->name('admin.shipment.detached');
	
	Route::get('delete/{id}','ShipmentController@delete')->name('admin.shipment.delete');
	
});
	
?>