<?php
/*
|--------------------------------------------------------------------------
| JOB PORTAL KAJKI.COM ROUTE
|--------------------------------------------------------------------------
*/
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::view('demo','layouts.main');
//Job Controller
Route::get('/', 'KajKi\JobController@index')->name('index');
Route::get('/jobs/{id}/{job}', 'KajKi\JobController@show')->name('jobs.show');
Route::get('/jobs/create', 'KajKi\JobController@create')->name('jobs.create');
Route::post('/jobs/create', 'KajKi\JobController@store')->name('jobs.store');
Route::get('/jobs/myJobs', 'KajKi\JobController@myJobs')->name('jobs.myJobs');
Route::get('/{id}/edit', 'KajKi\JobController@edit')->name('jobs.edit');
Route::put('/{id}/edit', 'KajKi\JobController@update')->name('jobs.update');

Route::post('/applications/{id}', 'KajKi\JobController@apply')->name('jobs.apply');
Route::get('/jobs/applications', 'KajKi\JobController@applicant')->name('jobs.applications');

Route::get('/jobs/allJobs', 'KajKi\JobController@allJobs')->name('jobs.allJobs');


//Category Controller
Route::get('/category/{id}/jobs', 'KajKi\CategoryController@index')->name('jobs.category');


//search with veu js
Route::get('/jobs/search', 'KajKi\JobController@search')->name('jobs.search');


//Email Job to Friend!!
Route::post('/mail/jobs', 'KajKi\EmailController@index')->name('jobs.mail');

//Save & Unsaved Jobs Controller

Route::post('/save/{id}', 'KajKi\FavouriteController@saveJob');
Route::post('/unsaved/{id}', 'KajKi\FavouriteController@unsavedJob');


//Company Controller
Route::get('/companies/{id}/{company}', 'KajKi\CompanyController@index')->name('company.index');
Route::get('/companies', 'KajKi\CompanyController@allCompany')->name('company.all');

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
//Auth::routes();
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');

//Contact CRUD Route
Route::resource('crud', 'ContactController');

//Contact CRUD Route
Route::resource('album', 'ImageController');
Route::post('album/image', 'ImageController@addImage')->name('album.image');


