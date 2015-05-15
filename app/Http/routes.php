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
		Route::get('phones/list/all','PhoneController@all');
		Route::any('/phones/list/phones-list','AjaxController@phoneList');
	});
