<li class="{{request()->is('admin/emap/dashboard') ? 'active' : ''}}">
    <a href="{{route('emap.admin.dashboard')}}">
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
@can('mapFee_access')
<li class="{{request()->is('admin/emap/map/mapApply') ? 'active' : ''}}">
    <a href="{{route('emap.admin.map.mapApply.index')}}">
        <i class="fa fa-map"></i>
        <span>नक्सा</span>
    </a>
</li>
@endcan
<li class="{{request()->is('admin/emap/setting/*') ? 'active' : ''}}">
    <a href="#sidebarEMapSetting"
       {{request()->is('admin/emap/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/emap/setting/*') ? 'show' : ''}}"
         id="sidebarEMapSetting">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/emap/setting/mapSetting') ? 'active' : ''}}">
                <a href="{{route('emap.admin.mapSetting.index')}}">
                    <span> नक्शा सेटिङ </span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/setting/mapFee/*') ? 'active' : ''}}">
                <a href="{{route('emap.admin.mapFee.index')}}">
                    <span> नक्शा दस्तुर  </span>
                </a>
            </li>
        </ul>
    </div>
</li>

