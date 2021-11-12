<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
use App\Http\Controllers\Frontend\User\KeysController;
use App\Http\Controllers\Frontend\User\NewController;
use App\Http\Controllers\Frontend\User\TypeController;
use App\Http\Controllers\Frontend\User\DetailController;
use App\Http\Controllers\Frontend\User\MainController;

Route::post('/addkeys', [KeysController::class, 'storeKeys']);
Route::get('/getkeys', [KeysController::class, 'getkeys']);
Route::put('/updatekeys/{id}', [KeysController::class, 'updateKeys']);
Route::delete('/deletekeys/{id}', [KeysController::class, 'destroyKeys']);
Route::post('/addvideo', [NewController::class, 'addvideo']);
Route::post('/addTypes', [TypeController::class, 'addTypes']);
Route::get('/getTypes', [TypeController::class, 'getTypes']);
Route::post('/addValues', [TypeController::class, 'addValues']);
 Route::post('/adddetails', [DetailController::class, 'addDetails']);
Route::get('/getdetails', [DetailController::class, 'getDetails']);


///////////////Main controller.....////////

Route::post('/addVideo', [MainController::class, 'addVideo']);
Route::get('/getVideo', [MainController::class, 'getVideo']);
Route::put('/updateVideo/{id}', [MainController::class, 'updateVideo']);
Route::get('/getVideo/{id}', [MainController::class, 'getVideoById']);
Route::delete('/deleteVideo/{id}', [MainController::class, 'deleteVideo']);

////details....//

Route::post('/addDetails', [MainController::class, 'addDetails']);
Route::get('/getDetails', [MainController::class, 'getDetails']);
Route::get('/getDetails/{id}', [MainController::class, 'getDetailsById']);
Route::put('/updateDetails/{id}', [MainController::class, 'updateDetails']);
Route::delete('/deleteDetails/{id}', [MainController::class, 'deleteDetails']);




 