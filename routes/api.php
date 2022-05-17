<?php

use App\Http\Controllers\PropertyApiController;
use App\Http\Controllers\TagsApiController;
use App\Models\Property;
use App\Models\Tag;
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

Route::get('/tags', [TagsApiController::class, 'index']);
Route::post('/tags', [TagsApiController::class, 'store']);
Route::get('/tags/{id}', [TagsApiController::class, 'show']);
Route::put('/tags/{tag}', [TagsApiController::class, 'update']);
Route::delete('/tags/{tag}', [TagsApiController::class, 'destroy']);

Route::get('/properties', [PropertyApiController::class, 'index']);
Route::get('/properties/{id}', [PropertyApiController::class, 'show']);
Route::post('/properties', [PropertyApiController::class, 'store']);
