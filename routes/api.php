<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['catalogs'=> 'CatalogController']);
Route::apiResources(['sites'=> 'SitesController']);

/*
Route::group(['prefix' => 'jobs'], function (){
    Route::post('postulations', 'JobsController@viewPostulations');
    Route::get('/', 'JobsController@getAll');
    Route::post('/','JobsController@store');
    Route::get('{id}','JobsController@getById');
    Route::post('manage/search', 'JobsController@searchForJob');
    Route::post('postulate', 'JobsController@postulate');
    Route::PUT('postulations/select', 'JobsController@selectCandidate');
    Route::put('change/status/{id}', 'JobsController@updateStatusForJob');
    Route::put('assigncandidate/{id}', 'JobsController@assignCandidate');
});*/


