<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('fipe')->controller(App\Http\Controllers\FipeController::class)->group(function () {
    Route::get('brands/{type}', 'getBrands');
    Route::get('models/{type}/{brandId}', 'getModels');
    Route::get('years/{type}/{brandId}/{modelId}', 'getYears');
    Route::get('value/{type}/{brandId}/{modelId}/{yearId}', 'getValue');
});
