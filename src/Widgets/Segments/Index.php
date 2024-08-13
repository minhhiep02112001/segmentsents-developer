<?php

namespace Segmentsents\Developer\Widgets\Segments;

use Widgets\AbstractWidget;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth; 

class Index extends AbstractWidget
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // $config = Arr::only($this->config, ['type', 'user_id']);
        // $type = $config['type'];
        // $user_id = \Auth::id(); //(int)$config['user_id'];
        // $segmentModel = app('segment');

        // $segments = $segmentModel->all(['type' => $type, 'created_by' => $user_id]);

        // return view('widgets.segment.index', [
        //     'segments' => $segments,
        //     'type' => $type,
        // ]);
    }
}
