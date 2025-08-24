<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('testing',function(){
    return 'this is testing api';
});

Route::get('products/index',[ProductController::class, 'index']);

Route::post('products/store',[ProductController::class, 'store']);
Route::put('products/edit/{id}', [ProductController::class, 'edit']);
Route::delete('products/delete/{id}', [ProductController::class, 'delete']);
