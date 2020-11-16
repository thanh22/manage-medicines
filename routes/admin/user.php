<?php 
Route::group(['prefix'=>'user'],function(){
	Route::get('/','UserController@index')->name('admin.user.index');
	Route::get('add','UserController@add')->name('admin.user.add');
	Route::post('add','UserController@post_add')->name('admin.user.add');

	
    Route::get('addRole/{id}','UserController@addRole')->name('admin.user.addRole');
    Route::post('addRole/{id}','UserController@post_addRole')->name('admin.user.addRole');

    Route::get('addPermission/{id}','UserController@addPermission')->name('admin.user.addPermission');
    Route::post('addPermission/{id}','UserController@post_addPermission')->name('admin.user.addPermission');

    Route::get('getPermission/{id}','UserController@getPer')->name('admin.user.getPer');
    Route::get('getRole/{id}','UserController@getRole')->name('admin.user.getRole');

    Route::get('delete/{id_per}/{id_user}','UserController@del_per')->name('admin.user.del_per');
    Route::get('deleteRole/{id}/{id_user}','UserController@del_role')->name('admin.user.del_role');

	Route::get('edit/{id}','UserController@edit')->name('admin.user.edit');
    Route::post('edit/{id}','UserController@post_edit')->name('admin.user.edit');
    
	Route::get('editPass/{id}','UserController@edit_pass')->name('admin.user.edit_pass');
    Route::post('editPass/{id}','UserController@post_edit_pass')->name('admin.user.edit_pass');
    
	Route::get('delete/{id}','UserController@delete')->name('admin.user.delete');
	
});
	
?>