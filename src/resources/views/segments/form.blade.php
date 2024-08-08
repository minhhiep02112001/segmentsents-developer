@extends(config('segmentmanager.master_layout'))
@section('content')
    <div class="content">
        <div class="card">
            <form class="ajax-submit-form" id="" action="{{ $action }}" method="{{ $method }}">
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
                            <input required name="name" value="{{ $row['name'] ?? '' }}" class="form-control" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop

