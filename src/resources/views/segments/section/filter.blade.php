@extends('common.filter_layout')
@section('section_filter')
@php
$route = \Route::current();
$routeName = $route->getName();
@endphp
    <!-- Sidebar search -->
    <div class="sidebar-section">
        <div class="sidebar-section-header">
            <span class="font-weight-semibold">Tìm kiếm cơ bản</span>
            <div class="list-icons ml-auto">
                <a href="#sidebar-search" class="list-icons-item" data-toggle="collapse">
                    <i class="icon-arrow-down12"></i>
                </a>
            </div>
        </div>
        <div class="collapse show" id="sidebar-search">
            <div class="sidebar-section-body">
                <div class="form-group">
                    <label class="control-label">Theo tên</label>
                    <input type="text" name="filter[name]" placeholder="Nhập tên" class="form-control" value="{{$filter['name'] ?? ''}}">
                </div>
                <div class="form-group">
                    <label class="control-label" for="name">Loại</label>
                    <select name="filter[type]" class="select2_single form-control">
                        <option value="">Select an option</option>
                        @foreach (config('data.segments') as $value)
                            <option value="{{$value}}" {{isset($filter['job_title']) && $key==$filter['job_title']?'selected':''}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>   
    </div>
    <!-- /sidebar search -->
@endsection
