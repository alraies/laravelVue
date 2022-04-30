<?php

use App\Models\answer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AnswersApiController;
use App\Http\Controllers\AnswersLookupApiController;

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

Route::get('/answers', [AnswersApiController::class, 'index']);


Route::prefix('/answer')->group(function(){
    Route::Post('/store', [AnswersApiController::class, 'store']);
    Route::put('/{id}', [AnswersApiController::class, 'update']);
    Route::delete('/{id}', [AnswersApiController::class, 'destroy']);
});
Route::get('/lookups', [AnswersLookupApiController::class, 'index']);
Route::prefix('/lookup')->group(function(){
    Route::Post('/store', [AnswersLookupApiController::class, 'store']);
    Route::put('/{id}', [AnswersLookupApiController::class, 'update']);
    Route::delete('/{id}', [AnswersLookupApiController::class, 'destroy']);
});

