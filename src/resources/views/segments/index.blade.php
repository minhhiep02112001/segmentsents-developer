@php
    $route = \Route::current();
    $routeName = $route->getName();
@endphp 
@extends(config('segment_manager.master_layout'))
@section('content')
    @include('common.content_header', ['name' => 'Danh sách Segments'])
    <!-- page content -->
    <div class="content">
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title">Danh sách Segments</h5>
            </div>
            <table class="table datatable-fixed-both" width="100%">
                <thead id="checkbox_all">
                    <tr>
                        <th class="column-title" style="text-align: center;width: 1px">STT</th>
                        <th>Tên</th>
                        <th>Loại</th>
                        <th>Người tạo</th>
                        <th>Ngày tạo</th>
                        <th>Dữ liệu</th>
                        <th width="20px" class="tr_sticky_right">Thao tác</th>
                    </tr>
                </thead>
                <tbody id="checkbox_list">
                    @php $i = 1 @endphp
                    @foreach ($rows as $key => $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row['name'] ?? '' }}</td>
                            <td>{{ $row['type'] ?? '' }}</td>
                            <td class="em-profile" data-id="{{ $row['created_by'] ?? '' }}">
                                {{ $row['created_by'] ?? '' }}
                            </td>
                            <td>{{ !empty($row['created_time']) ? date('H:i d-m-Y', $row['created_time']) : '' }}</td>
                            <td>
                                @if (json_decode($row['data']))
                                    <?php $fil = json_decode($row['data']); ?>
                                    <?php $filter_data = json_decode($fil->filter); ?>
                                @endif
                                {{ $row['data'] ?? '' }}
                            </td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="list-icons-item" data-toggle="dropdown">
                                        <i class="icon-menu9"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="load_not_ajax dropdown-item"
                                            href="{{ route(\Config::get('route.as') . 'segments.show', $row['_id']) }}">Xem</a>
                                        <a class="load_not_ajax dropdown-item"
                                            href="{{ route(\Config::get('route.as') . 'segments.edit', $row['_id']) }}">Sửa</a>
                                        <a class="quick-action-confirm dropdown-item"
                                            content="Bạn có chắc muốn xóa segment này không"
                                            action="{{ route(\Config::get('route.as') . 'segments.destroy', $row['_id']) }}"
                                            method="delete" href="#">Xóa</a> 
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-footer">
                {!! $pagination ?? '' !!}
            </div>
        </div>
    </div>
@stop
@section('left-slidebar')
    @include('segments::segments.filter')
@endsection
