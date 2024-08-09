<?php

namespace Segmentsents\Developer\Facade;

class Segment 
{
    protected static function getFacadeAccessor()
    {
        // Trả về tên cấu hình hoặc binding mà Facade sẽ sử dụng
        return 'segment';
    }
}
