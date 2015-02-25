<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/','UserController@home');
Route::get('profile','UserController@profile');
Route::get('home','UserController@home');
//FORM
Route::get('form','UserController@form');
Route::post('form','UserController@post_form');

//CRUD
Route::get('crud','CrudController@index');
Route::get('crud/create','CrudController@create');
Route::post('crud/create','CrudController@store');
Route::get('crud/edit/{id}', 'CrudController@edit');
Route::post('crud/update/{id}', array('as' => 'crud.update', 'uses' => 'CrudController@update'));
Route::get('crud/destroy/{id}','CrudController@destroy');

//IVUD
Route::resource('ivud', 'IvudController');
//LOGIN
Route::group(array('before' => 'auth'), function(){
	Route::get('logout', array('uses' => 'UserController@logout'));
	// Route yang ingin diproteksi taruh disini
});
 
Route::get('login', 'UserController@login');
Route::post('login', 'UserController@doLogin');


/*
Route::group(array('before' => 'auth'), function()
{
Route::get('/', 'UserController@index');
Route::get('profile/{nama}', 'UserController@profile');
//Route::get('profile/{id}/{nama}', 'ProfileController@profileview');
Route::get('profile/{nama?}', function($nama = null)
{
    return $nama;
});
 
Route::get('profile/{nama?}', function($nama = 'Maulana')
{
    return $nama;
});
 
Route::get('form', 'UserController@form');
Route::post('form', 'UserController@post_form');
Route::get('crud', 'CrudController@index');
Route::get('crud/create','CrudController@create');
Route::post('crud/create','CrudController@store');
Route::get('crud/edit/{id}', 'CrudController@edit');
Route::post('crud/update/{id}', array('as' => 'crud.update', 'uses' => 'CrudController@update'));
Route::get('crud/destroy/{id}','CrudController@destroy');
Route::resource('ivud', 'IvudController');
Route::get('logout', array('uses' => 'UserController@logout'));
});
 
Route::get('login', array('uses' => 'UserController@login'));
Route::post('login', array('uses' => 'UserController@doLogin'));
/*