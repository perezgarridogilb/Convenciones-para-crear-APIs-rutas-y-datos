<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\LoginController;
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

Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/{category}', [CategoryController::class, 'show']);
    
    Route::get('/recipes', [RecipeController::class, 'index']);

    // POST /recipes => store
    Route::post('/recipes', [RecipeController::class, 'store']);
    
    // GET /recipes/{recipe} => show
    Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);
    
    // PUT/PATCH /recipes/{recipe} => update
    Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);
    /* Route::patch('/recipes/{recipe}', [RecipeController::class, 'update']); */
    
    // DELETE /recipes/{recipe} => destroy
    Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);

    Route::get('tags', [TagController::class, 'index']);
    Route::get('tags/{tag}', [TagController::class, 'show']);
});


/* Route::get('recipes', [RecipeController::class, 'index']);
Route::post('recipes', [RecipeController::class, 'store']);
Route::get('recipes/{recipe}', [RecipeController::class, 'show']);
Route::put('recipes/{recipe}', [RecipeController::class, 'update']);
Route::delete('recipes/{recipe}', [RecipeController::class, 'destroy']); */

Route::get('logger', function () {
    Logger::dispatchAfterResponse();
    return response("<br>Fin");
});
