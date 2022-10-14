<li class="{{request()->is('admin/circular/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.circular.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>

@can('registration_access')
    <li class="{{request()->is('admin/circular/registration*') ? 'active' : ''}}">
        <a href="{{route('admin.circular.registration.index')}}">
            <i class="fa fa-file-alt"></i>
            <span> दर्ता प्रणाली   </span>
        </a>
    </li>
@endcan
@can('dispatch_access')
    <li class="{{request()->is('admin/circular/dispatch*') ? 'active' : ''}}">
        <a href="{{route('admin.circular.dispatch.index')}}">
            <i class="fa fa-file-alt"></i>
            <span> चलानी प्रणाली </span>
        </a>
    </li>
@endcan
<li class="{{request()->is('admin/circular/report/*') ? 'active' : ''}}">
    <a href="#sidebarCircularReport"
       {{request()->is('admin/circular/report/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-clipboard-list"></i>
        <span>रिपोर्ट</span>
        <span class="menu-arrow">
                        <i class="fa fa-angle-right"></i>
                    </span>
    </a>
    <div class="collapse {{request()->is('admin/circular/report/*') ? 'show' : ''}}"
         id="sidebarCircularReport">
        <ul class="nav-second-level">
            @can('registration_access')
                <li class="{{request()->is('admin/circular/report/registration') ? 'active' : ''}}">
                    <a href="{{route('admin.circular.registration.report')}}">
                        <span> दर्ता प्रणाली रिपोर्ट   </span>
                    </a>
                </li>
            @endcan
            @can('dispatch_access')
                <li class="{{request()->is('admin/circular/report/dispatch') ? 'active' : ''}}">
                    <a href="{{route('admin.circular.dispatch.report')}}">
                        <span> चलानी प्रणाली रिपोर्ट</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>

