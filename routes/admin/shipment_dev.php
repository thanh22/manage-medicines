<?php 
Route::group(['prefix'=>'shipment'],function(){

    Route::get('/','ShipmentController@index')->name('admin.shipment.index');
    
	
});
	
?>