<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::post('/insertUser', [UserController::class, 'create']);

Route::get('/showData', [UserController::class, 'show']);

Route::get('/showDataById/{Id}', [UserController::class, 'showById']);

Route::put('/updateData/{Id}', [UserController::class, 'updateById']);

Route::delete('/deleteDataById/{Id}', [UserController::class, 'deleteById']);

Route::delete('/deleteMultipleUser', [UserController::class, 'deleteMultipleuserswithson']);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


