<?php 
Route::group(['prefix'=>'medicines'],function(){

    Route::get('/','MedicinesController@index')->name('admin.medicines.index');
    
	Route::get('add','MedicinesController@add')->name('admin.medicines.add');
	Route::post('add','MedicinesController@post_add')->name('admin.medicines.add');

	Route::get('edit/{id}','MedicinesController@edit')->name('admin.medicines.edit');
    Route::post('edit/{id}','MedicinesController@post_edit')->name('admin.medicines.edit');
	
	Route::get('show/{id}','MedicinesController@show')->name('admin.medicines.show');
	
	Route::get('delete/{id}','MedicinesController@delete')->name('admin.medicines.delete');
	
});
	
?>