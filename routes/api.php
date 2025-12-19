<?php

use App\Http\Controllers\Api\CropCategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Public routes (no auth)
Route::get('crop-categories', [CropCategoryController::class, 'index']);
Route::get('crop-categories/{cropCategory}', [CropCategoryController::class, 'show']);

// Protected routes (require auth + token)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('crop-categories', [CropCategoryController::class, 'store']);
    Route::put('crop-categories/{cropCategory}', [CropCategoryController::class, 'update']);
    Route::delete('crop-categories/{cropCategory}', [CropCategoryController::class, 'destroy']);
});