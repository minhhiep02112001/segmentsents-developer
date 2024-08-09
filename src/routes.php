<?php

use Illuminate\Support\Facades\Route;
use Segmentsents\Developer\Controllers\SegmentController;

Route::group(['middleware' => ['auth:web', "keycloak-web-can"] ,'prefix' => \Config::get('route.prefix', ''), 'as' => \Config::get('route.as', '')  ], function () {
    Route::resource('segments', SegmentController::class); 
});
