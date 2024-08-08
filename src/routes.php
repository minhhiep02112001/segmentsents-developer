<?php

use Illuminate\Support\Facades\Route;
use YourNamespace\SegmentManager\Controllers\SegmentController;

Route::group(['prefix' => \Config::get('route.prefix', '') . 'segments', 'as' => \Config::get('route.as', '')  ], function () {
    Route::get('/', [SegmentController::class, 'index']);
    Route::post('/', [SegmentController::class, 'store']);
    Route::get('/{id}', [SegmentController::class, 'show']);
    Route::put('/{id}', [SegmentController::class, 'update']);
    Route::delete('/{id}', [SegmentController::class, 'destroy']);
});
