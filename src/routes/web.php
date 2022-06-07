<?php

use Illuminate\Support\Facades\Route;
use OnlineMarket\Controllers\Front\ResourceController;

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

Route::get('{resource}', [ResourceController::class, 'index'])->name('front.resource.index');
Route::get('{resource}/create', [ResourceController::class, 'create'])->name('front.resource.create');
Route::post('{resource}', [ResourceController::class, 'store'])->name('front.resource.store');
Route::get('{resource}/{id}/edit', [ResourceController::class, 'edit'])->name('front.resource.edit');
Route::put('{resource}/{id}', [ResourceController::class, 'update'])->name('front.resource.update');
Route::delete('{resource}/{id}', [ResourceController::class, 'destroy'])->name('front.resource.destroy');
Route::get('{resource}/{id}', [ResourceController::class, 'show'])->name('front.resource.show');