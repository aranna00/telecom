<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

	Route::get('/', 'HomeController@index');
	Route::get('/home',function()
	{
		return redirect('/');
	});

	Route::any('/test',function(){
		return view('test');
	});

	Route::resource('phones','PhoneController',['only'=>['index','show']]);
	Route::get('contracts/phone/{phone_id}',['as'=>'contracts.phone','uses'=>'ContractController@index']);
	Route::resource('contracts','ContractController',['only'=>['show']]);

	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
	]);


	Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'role'],function(){
		Route::get('/','HomeController@index');
		Route::resource('phones','PhoneController');
		Route::post('phones/{id}',['uses'=>'PhoneController@update']);
		Route::any('/phones/list/all',['uses'=>'PhoneController@all','as'=>'admin.phones.list']);
		Route::any('/phones/list/phones-list',['uses'=>'AjaxController@phoneList','as'=>'admin.phones.list.phones-list']);
		Route::any('/phones/{id}/edit/images/upload',['uses'=>'PhoneController@addImage','as'=>'admin.phones.edit.image.upload']);
		Route::any('/phones/{id}/destroy',['uses'=>'PhoneController@destroy','as'=>'admin.phones.destroy']);
		Route::resource('/contracts/','ContractController');
		Route::any('/contracts/list/all',['uses'=>'ContractController@all','as'=>'admin.contracts.list']);
	});
