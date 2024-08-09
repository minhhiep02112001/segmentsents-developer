<?php

namespace Segmentsents\Developer\Controllers\Api;
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
        $segmentModel = new Segment(); 
        $input = $request->only('filter', 'offset', 'limit', 'select');
        if(!empty($input['filter']) && !is_array($input['filter'])){
            return null;
        }
        $datas = $segmentModel->all($input['filter'] ?? [], \Arr::only($input, ['limit', 'offset', 'select']));
        return $datas;
    } 
    
    public function store(Request $request)
    {
        //
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
        return $row;
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $segmentModel = new Segment(); 
        $result = $segmentModel->remove($id);
        return response()->json(['status' => $result ? 'success' : 'error'], 200);
    }

    public function search(Request $request)
    {
        $input = $request->only('keyword', 'filter', 'offset', 'limit');
        if(empty($input['keyword'])) return [];

        $filter = $input['filter'] ?? [];
        if (!isset($filter['status'])) {
            $filter['status'] = 'active';
        }
        $searchCondition = array_merge(['name' => ['like' => $input['keyword']]], $filter);
        $options = \Arr::only($input, ['limit', 'offset']);
        $segmentModel = new Segment();  
        $data = $segmentModel->all($searchCondition, $options);
        return $data;
    }
}
