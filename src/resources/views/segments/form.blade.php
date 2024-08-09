@extends(config('segment_manager.master_layout'))
@section('content')
    <div class="content">
        <div class="card">
            <form class="ajax-submit-form" id="edu_class_created_form" action="{{ $action }}" method="{{ $method }}">
                <div class="card-header header-elements-inline bg-">
                    <h5 class="card-title">Thông tin segments</h5>
                    <div class="header-elements">
                        <button type="submit" class="btn btn-success ajax-submit-button">Lưu thông tin<i class="icon-paperplane ml-2"></i></button>
                    </div>
                </div>
                <div class="card-body" id="form_notify">
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Tên <span style="color: red">*</span></label>
                        <div class="col-lg-10">
                            <input require name="name" value="{{ $row['name'] ?? '' }}" required class="form-control" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Loại</label>
                        <div class="col-lg-10">
                            <input name="type" type="text" placeholder="" class="form-control" value="{{ $row['type'] ?? $url ?? '' }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-form-label">Filter</label>
                        <div class="col-lg-10">
                            <input name="filter" type="text" placeholder="" class="form-control" value="{{ $row['filter'] ?? $filter ?? ''}}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

