<div class="floating-container">
    <div class="floating-button">
        <a href="{{route('admin.dashboard')}}">
            <i class="fa fa-home" style="color: white"></i>
        </a>
    </div>
    @if(array_key_exists(Str::lower(Request::segment(2)),config('floating-menu')))
        <div class="element-container">
            @foreach(config('floating-menu.'.Str::lower(Request::segment(2))) as $key=>$menu)
                @if(Route::has($menu))
                    <a href="{{route($menu)}}" class="float-element tooltip-left">

                        <i class="fa fa-plus"></i> {{$key}}

                    </a>
                @endif
            @endforeach
        </div>
    @endif
</div>
