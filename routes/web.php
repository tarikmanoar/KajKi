<?php
/*
|--------------------------------------------------------------------------
| JOB PORTAL KAJKI.COM ROUTE
|--------------------------------------------------------------------------
*/
//Job Controller
Route::get('/', 'KajKi\JobController@index')->name('index');
Route::get('/jobs/{id}/{job}', 'KajKi\JobController@show')->name('jobs.show');
Route::get('/jobs/create', 'KajKi\JobController@create')->name('jobs.create');
Route::post('/jobs/create', 'KajKi\JobController@store')->name('jobs.store');
Route::get('/jobs/myJobs', 'KajKi\JobController@myJobs')->name('jobs.myJobs');
Route::get('/{id}/edit', 'KajKi\JobController@edit')->name('jobs.edit');
Route::put('/{id}/edit', 'KajKi\JobController@update')->name('jobs.update');

//Company Controller
Route::get('/companies/{id}/{company}', 'KajKi\CompanyController@index')->name('company.index');

//Profile Controller
Route::get('/user/profile', 'KajKi\ProfileController@index')->name('user.profile');
Route::post('/user/profile', 'KajKi\ProfileController@store')->name('user.store');
Route::post('/user/cover', 'KajKi\ProfileController@cover')->name('user.cover');
Route::post('/user/avatar', 'KajKi\ProfileController@avatar')->name('user.avatar');

//Employee Registration
Route::view('employer/register', 'auth.emp-reg');
Route::post('employer/register', 'Auth\EmpController@store')->name('emp.register');
Route::post('/employer/logo', 'Auth\EmpController@logo')->name('company.logo');
Route::post('/employer/update', 'Auth\EmpController@update')->name('company.update');
Route::post('/employer/cover_photo', 'Auth\EmpController@cover_photo')->name('company.cover_photo');


/*
|--------------------------------------------------------------------------
| CRUD AND ALBUM ROUTE
|--------------------------------------------------------------------------
*/
//For auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//Contact CRUD Route
Route::resource('crud', 'ContactController');

//Contact CRUD Route
Route::resource('album', 'ImageController');
Route::post('album/image', 'ImageController@addImage')->name('album.image');


