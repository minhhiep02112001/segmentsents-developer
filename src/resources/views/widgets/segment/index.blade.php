<ul class="nav nav-sidebar my-2" data-nav-type="accordion">
    @if (isset($segments))
        @foreach ($segments as $segment)
            @php

                $url = !empty($route_name)
                    ? route(\Config::get('route.as') . $route_name, [
                        'filter' => json_decode(json_decode($segment['data'])->filter, true) ?? '',
                    ])
                    : '/'; 
            @endphp
            <li class="nav-item">
                <div class="row">
                    <div class="col-lg-9">
                        <a class="nav-link" href="{{ $url }}">
                            <i class="icon-copy2 mi-2x"></i> {{ $segment['name'] ?? '' }}
                        </a>
                    </div>
                    <div class="col-lg-2">
                        <a class="nav-link quick-action-confirm" content="Bạn có chắc muốn xóa segment này không"
                            action="{{ route(\Config::get('route.as') . 'segments.destroy', $segment['_id']) }}"
                            method="delete" href="#"><i class="icon-trash"></i>
                        </a>
                    </div>
                </div>
            </li>
        @endforeach
    @endif
</ul>
