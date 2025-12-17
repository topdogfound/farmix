<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



// V1
Route::prefix('v1')->namespace('App\Http\Controllers\Api\V1')->group(function () {
    //
});

// V2
Route::prefix('v2')->namespace('App\Http\Controllers\Api\V2')->group(function () {
    //
});
