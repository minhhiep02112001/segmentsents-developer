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
        $config = Arr::only($this->config, [ 'route_name', 'type']);

        $filter = $config['filter'] ?? [];
        $user_id = \Auth::id();
        $segmentModel = app('segment');
        $data_segments = $segmentModel->all(['type' => $config['type'] ?? '-1', 'created_by' => $user_id],  ['limit' => 300]);

        return view('segments::widgets.segment.index', [
            'segments' => $data_segments,
            'route_name' =>  $config['route_name'] ?? '',
            'filter' => $filter,
            'type' =>  $config['type'] ?? '-1',
        ]);
    }
}
