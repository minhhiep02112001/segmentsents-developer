<?php
namespace Segmentsents\Developer\Controllers;

use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Segmentsents\Developer\Models\Segment;

class SegmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = new Segment();
        $input = $request->only('filter');
        $filterParams = array_filter($input['filter']??[]);
        //get data
        $collection = $model->all($filterParams,['pagination' => 1]);
        $data = [
            'rows' => $collection,
            'page' => isset($input['page']) ? $input['page'] : 1,
            'pagination' => ($collection instanceof \Illuminate\Pagination\Paginator) ? $collection->setPath(\URL::current())->appends($input)->links() : '',
            'filter' => $filterParams,
        ];
        return view('segments::segments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->only('data','url');
        $data = [
            'action' => route(\Config::get('route.as').'segments.store',['data' => $input['data']??[],'url' => $input['url']]),
            'method' => 'post',
            'filter' => json_encode($input['data']??[]),
            'url' =>$input['url'],
        ];
        return view('segments::segments.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->only('name','type','filter');
        $validator = \Validator::make($input, [
            'name' => 'required',
            'type' => 'required',
        ]); 

        if ($validator->fails()) {
            return response()->json(['status'=> 'error', 'message'=>$validator->errors()->first()]);
        }
        $input['created_by'] = \Auth::id();
        $input['data'] = json_encode(['filter' => $input['filter']]);
        try {
            $model = new Segment();
            $segment_id = $model->create($input);
            if(empty($segment_id)){
                return response()->json(['status'=> 'error', 'message'=> 'Không thành công']);
            }
            // \Microservices::event()->BusEvent('segment_updated', ['segment_id' => $segment_id]));
            $data['status'] = 'success';
            $data['message'] = 'Thêm thành công';
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $segmentModel = new Segment();
        $row = $segmentModel->detail($id);
        $data = [
            'row' => $row,
        ];
        return view('segments::segments.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Segment();
        $detail = $model->detail($id);
        $data = [
            'row' => json_decode(json_encode($detail), true),
            'action' => route(\Config::get('route.as').'segments.update',[$id]),
            'method' => 'PUT'
        ];
        return view('segments::segments.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $segment_id)
    {
        $params = $request->all();
        $validator = \Validator::make($params, [
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(['status'=> 'error', 'message'=>$validator->errors()->first()]);
        }
        $model = new Segment();
        $result = $model->update($segment_id, $params);
        if($result){
            // \Microservices::event()->BusEvent('segment_updated', ['segment_id' => $segment_id]));
        }
        return response()->json(['status' => $result, 'redirect_uri' => route(\Config::get('route.as').'segments.index', $segment_id)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $model = new Segment();
            $model->remove($id);
            $data['status'] = 'success';
            $data['message'] = 'Xóa thành công';
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }

        return response()->json($data, 200);
    }
}
