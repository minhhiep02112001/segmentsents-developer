<?php

namespace Widgets;

class Facade extends \Illuminate\Support\Facades\Facade
{
    protected static function getFacadeAccessor() { 
        return 'Segment'; 
    } 
}
