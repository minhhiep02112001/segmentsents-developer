 @extends(config('segment_manager.master_layout'))
 @section('content')
     @include('common.content_header', ['name' => 'Thông tin chi tiết'])
     <div class="content">
         <div class="row">
             <div class="col-lg-12">
                 <div class="card">
                     <div class="card-header header-elements-inline">
                         <h5 class="card-title">Thông chi tiết: {{ $row['name'] ?? '' }}</h5>
                         <div class="header-elements ">
                             <div class="dropdown">
                                 <a href="javascript:;" class="list-icons-item" data-toggle="dropdown">
                                     <i class="icon-menu9"></i>
                                 </a>
                                 <div class="dropdown-menu dropdown-menu-right">
                                     <a href="{{ route(\Config::get('route.as') . 'segments.index') }}"
                                         class="dropdown-item load_not_ajax">
                                         Danh sách
                                     </a>
                                     <a href="{{ route(\Config::get('route.as') . 'segments.edit', $row['_id']) }}"
                                         class="dropdown-item load_not_ajax">
                                         Sửa
                                     </a>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="card-body row">
                         <table class="table" width="100%">
                             <tr>
                                 <th>Tên:</th>
                                 <td>{{ $row['name'] ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>Dữ liệu:</th>
                                 <td>{{ $row['data'] ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>Loại:</th>
                                 <td>{{ $row['type'] ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>Người tạo:</th>
                                 <td class="em-profile" data-id="{{ $row['created_by'] ?? '' }}">
                                     {{ $row['created_by'] ?? '' }}</td>
                             </tr>
                             <tr>
                                 <th>Thời gian tạo:</th>
                                 <td>{{ !empty($row['created_time']) ? date('H:i d-m-Y', $row['created_time']) : '' }}</td>
                             </tr>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @stop
