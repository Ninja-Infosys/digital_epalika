<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                @if(in_array(Str::lower(Request::segment(2)),config('menus.modules')))
                    @includeIf(Str::lower(Request::segment(2)).'::admin.layouts.sidebar')
                @else
                    @includeIf('admin.layouts.sidebar')
                @endif


{{--                    @includeIf('digitalboard::layouts.sidebar')--}}

{{--                    @includeIf('circular::layouts.sidebar')--}}



{{--                    @includeIf('grievancehandling::admin.layouts.sidebar')--}}
{{--                    @includeIf('emap::admin.layouts.sidebar')--}}
{{--                    @includeIf('businessregistration::layouts.sidebar')--}}
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
