<?php

namespace Segmentsents\Developer;

use Illuminate\Support\ServiceProvider; 
class SegmentManagerServiceProvider extends ServiceProvider
{
    public function register() {
        $this->app->bind('segment', function($app) {
            return new \Segmentsents\Developer\Models\Segment; 
        });
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php'); 

        $this->publishes([
            __DIR__ . '/config/segment_manager.php' => config_path('segment_manager.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/config/segment_manager.php', 'segment_manager');

         
        if (config('segmentmanager.load_views', true)) {
            // Đăng ký đường dẫn view với Laravel
            $this->loadViewsFrom(__DIR__ . '/resources/views', 'segments'); 
        }

        // if (config('segmentmanager.override_views', true)) {
        //     $this->publishes([__DIR__ . '/views' => resource_path('views/vendor/segments')], 'views');
        // }
    }
}
