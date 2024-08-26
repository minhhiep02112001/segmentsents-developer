<div class="sidebar-section-body">
    @if ($segments->count() > 0)
        <div class="form-group">
            <label class="control-label" for="name">Lọc theo Segment</label>
            <select name="" class="form-control select2_single" data-allow-clear="true"
                data-placeholder="Chọn Segment" onchange="location=this.value;">
                <option value="">Chọn Segment</option>
                @foreach ($segments as $segment)
                    @php
                        $url = '/';
                        if (!empty($route_name)) {
                            // Lấy route hiện tại
                            $currentRoute = request()->route();
                            // Lấy pattern của URL hiện tại
                            $urlPattern = $currentRoute->uri();

                            // Tạo tham số mặc định cho route
                            $routeParams = [
                                'filter' => json_decode(json_decode($segment['data'])->filter, true) ?? '',
                            ];

                            // Kiểm tra nếu pattern có chứa '{type}'
                            if (strpos($urlPattern, '{type}') !== false) {
                                // Thêm 'type' vào tham số nếu cần
                                $routeParams['type'] = $type ?? '';
                            }
                            $url = route(\Config::get('route.as') . $route_name, $routeParams);
                        } 
                    @endphp
  
                    <option value="{{ $url }}">
                        {{ $segment['name'] ?? '' }}</option>
                @endforeach

            </select>
        </div>
    @endif
    <a href="javascript:void(0)" class="btn btn-primary call_ajax_modal call_ajax_segment btn-block"
        data-url="{{ route('segments.create', ['data' => $filter, 'url' => $type]) }}">+ Thêm segment</a>
</div>
