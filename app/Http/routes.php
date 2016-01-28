<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/about',function () {
// 	return "hello hadeel";
// });

Route::resource('/contractors','ContractorsController');
Route::get('/contractors/destroy/{id}','ContractorsController@destroy');

Route::resource('/reviews','ReviewsController');
Route::get('/reviews/destroy/{id}','ReviewsController@destroy');

Route::resource('/admins','AdminsController');
Route::get('/admins/destroy/{id}','AdminsController@destroy');

Route::resource('/promoters','PromotersController');
Route::get('/promoters/destroy/{id}','PromotersController@destroy');

Route::resource('/visits','VisitsController');
Route::get('/visits/destroy/{id}','VisitsController@destroy');

Route::resource('/awards','AwardsController');
Route::get('awards/destroy/{id}', 'AwardsController@destroy');

Route::resource('/competitions','CompetitionsController');
Route::get('competitions/destroy/{id}', 'CompetitionsController@destroy');

Route::resource('/presents','PresentsController');
Route::get('presents/destroy/{id}', 'PresentsController@destroy');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
