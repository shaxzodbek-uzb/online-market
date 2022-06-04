<?php
use OnlineMarket\Controllers\ResourceController;
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


// Route::apiResource('products', ProductController::class);
// Route::apiResource('{resource}', ResourceController::class);
Route::get('{resource}', [ResourceController::class, 'index'])->name('resource.index');
Route::post('{resource}', [ResourceController::class, 'store'])->name('resource.store');
Route::put('{resource}/{id}', [ResourceController::class, 'update']);
Route::delete('{resource}/{id}', [ResourceController::class, 'destroy']);
Route::get('{resource}/{id}', [ResourceController::class, 'show']);