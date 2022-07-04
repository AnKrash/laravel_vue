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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/get', '\App\Http\Controllers\GetController');
});


Route::group(['namespace' => 'Person', 'prefix' => 'people'], function () {
    Route::post('/', '\App\Http\Controllers\Person\StoreController');
    Route::get('/', '\App\Http\Controllers\Person\IndexController');
    Route::get('/{person}', '\App\Http\Controllers\Person\ShowController');
    Route::patch('/{person}', '\App\Http\Controllers\Person\UpdateController');
    Route::delete('/{person}', '\App\Http\Controllers\Person\DeleteController');
});

Route::group(['namespace'=>'Images' ,'prefix'=>'images'],function (){
    Route::post('/','\App\Http\Controllers\Post\StoreController');
    Route::get('/','\App\Http\Controllers\Post\IndexController');
    Route::post('/store_images','\App\Http\Controllers\Post\StoreImageController');
});


