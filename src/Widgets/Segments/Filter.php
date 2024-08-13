<?php


namespace Segmentsents\Developer\Widgets\Segments;

use Widgets\AbstractWidget;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Filter extends AbstractWidget
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
        $config = Arr::only($this->config, ['filter']);

        $filter = $config['filter'] ?? [];
        $route = \Route::current();
        $routeName = $route->getName();

        switch ($routeName) {
            case 'edu.student.index':
                $segmentType = 'student';
                break;
            case 'edu.student.pause.index':
                $segmentType = 'student_pause';
                break;
            case 'edu.student.wait_class':
                $segmentType = 'student_wait_class';
                break;
            case 'edu.class.waiting_qualified':
                $segmentType = 'class_waiting_qualified';
                break;
            case 'edu.class.waiting_unqualified':
                $segmentType = 'class_waiting_unqualified';
                break;
            case 'edu.class.index':
                $segmentType = 'classes';
                break;

            default:
                $segmentType = '';
                # code...
                break;
        }
        $segmentModel = app('segment');
        $data_segments = $segmentModel->all(['type' => $segmentType, 'created_by' => Auth::id()],  ['limit' => 300]); 

        return view('widgets.segment.filter', [
            'segments' => $data_segments,
            'routeName' => $routeName,
            'filter' => $filter,
            'type' => $segmentType,
        ]);
    }
}
