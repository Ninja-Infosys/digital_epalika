<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.grant.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('organization_access')
    <li class="{{request()->is('admin/emap/organization') ? 'active' : ''}}">
        <a href="{{route('emap.admin.organization.index')}}">
            <i class="fa fa-stamp"></i>
            <span>दर्ता भएका संगठन</span>
        </a>
    </li>
@endcan
<li class="{{request()->is('admin/grant/setting/*') ? 'active' : ''}}">
    <a href="#sidebarGrantSetting"
       {{request()->is('admin/grant/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/grant/setting/*') ? 'show' : ''}}"
         id="sidebarGrantSetting">
        <ul class="nav-second-level">
            @can('infrastructure_access')
            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href="{{route('admin.grant.infrastructure.index')}}">
                    <span>  पूर्वाधार शीर्षकहरु  </span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</li>

