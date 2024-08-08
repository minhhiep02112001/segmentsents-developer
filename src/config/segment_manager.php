<?php
return [
    'table_name' => env('SEGMENT_TABLE_NAME', 'segments'),
    'routes' => true,    // Cho phép ghi đè routes
    'load_views' => true,  // Mặc định là true để load views từ package
    'override_views' => true, // Cho phép ghi đè views
    'master_layout' => 'layout.app',  // Đây là giá trị mặc định
];
