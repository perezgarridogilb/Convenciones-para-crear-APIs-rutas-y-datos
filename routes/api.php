<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\TagController;
use App\Jobs\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{category}', [CategoryController::class, 'show']);

Route::apiResource('recipes', RecipeController::class);
/* Route::get('recipes', [RecipeController::class, 'index']);
Route::post('recipes', [RecipeController::class, 'store']);
Route::get('recipes/{recipe}', [RecipeController::class, 'show']);
Route::put('recipes/{recipe}', [RecipeController::class, 'update']);
Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy']); */

Route::get('tags', [TagController::class, 'index']);
Route::get('tags/{tag}', [TagController::class, 'show']);

Route::get('logger', function () {
    Logger::dispatchAfterResponse();
    return response("<br>Fin");
});
