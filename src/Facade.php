<?php

namespace Segmentsents\Developer;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor() { 
        return 'Segment'; 
    } 
}
