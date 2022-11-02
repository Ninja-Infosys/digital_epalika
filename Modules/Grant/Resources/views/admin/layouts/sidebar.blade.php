<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.grant.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li>
    <a href="{{route('admin.grant.grantDetail.create')}}">
        <i class="fa-regular fa-file"></i>
        <span>अनुदान विवरण</span>
    </a>
</li>
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

