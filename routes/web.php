<?php
/*
|--------------------------------------------------------------------------
| JOB PORTAL KAJKI.COM ROUTE
|--------------------------------------------------------------------------
*/
Route::get('/', function () {return view('welcome');});





/*
|--------------------------------------------------------------------------
| CRUD AND ALBUM ROUTE
|--------------------------------------------------------------------------
*/
//For auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Contact CRUD Route
Route::resource('crud','ContactController');

//Contact CRUD Route
Route::resource('album','ImageController');
Route::post('album/image','ImageController@addImage')->name('album.image');


