<?php

use Illuminate\Support\Facades\Route;
use Segmentsents\Developer\Controllers\SegmentController;

Route::group(['prefix' => \Config::get('route.prefix', '') . 'segments', 'as' => \Config::get('route.as', '')  ], function () {
    Route::resource('segments', SegmentController::class); 
});
