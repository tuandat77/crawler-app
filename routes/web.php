<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Middleware\AuthMiddlewareService as AuthMiddlewareServiceLogin;

Route::get('/login',  ['as' => 'auth.get-login', 'uses' => 'Auth\LoginController@login']);
Route::post('/login', ['as' => 'auth.post-login', 'uses' => 'Auth\LoginController@postLogin'])
 ;
Route::group([
    'middleware' => ['authSamacom']
], function () {
    Route::get('/', ['as' => 'home', 'uses' => 'Domain\DomainController@listDomain']);
    Route::post('/add-domain', ['as' => 'domain', 'uses' => 'Domain\DomainController@addNewDomain']);


//    tao route de hien
    Route::get('/job-config/{id}',['as' => 'home', 'uses' => 'JobConfig\JobConfigController@viewJobConfig']);

    Route::post('/job-config/{id}',['as' => 'post-job-config', 'uses' => 'JobConfig\JobConfigController@updateConfig']);

    Route::get('/job-config/{id}',['as' => 'get-list-url', 'uses' => 'JobConfig\JobConfigController@viewListUrlLink']);

    Route::post('/add-url',['as' => 'post-url-config', 'uses' => 'JobConfig\JobConfigController@AddUrl']);


});
