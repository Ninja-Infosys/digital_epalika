<li class="{{request()->is('admin/emap/dashboard') ? 'active' : ''}}">
    <a href="{{route('emap.admin.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('organization_access')
    <li class="{{request()->is('admin/emap/organization') ? 'active' : ''}}">
        <a href="{{route('emap.admin.organization.index')}}">
            <i class="fa fa-building"></i>
            <span>दर्ता भएका संगठन</span>
        </a>
    </li>
@endcan
<li class="">
    <a href="#sidebarMaptype"
       data-bs-toggle="collapse">
        <i class="fa fa-map"></i>
        <span>नक्सा</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/emap/map/mapApply*') ? 'show' : ''}}"
         id="sidebarMaptype">
        <ul class="nav-second-level">
            @can('mapApply_access')
                <li class="{{request()->is('admin/emap/map/mapApply') ? 'active' : ''}}">
                    <a href="{{route('emap.admin.map.mapApply.index',\Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_REGISTRATION)}}">
                        <span> नक्सा दर्ता </span>
                    </a>
                </li>
            @endcan
            @can('mapApply_access')
                <li class="">
                    <a href="{{route('emap.admin.map.mapApply.index',\Modules\EMap\Enums\ApplicationFormTypeEnum::MAP_VERIFIED)}}">
                        <span> नक्सा प्रमाणित</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
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
            <li class="{{request()->is('admin/emap/setting/mapFee*') ? 'active' : ''}}">
                <a href="{{route('emap.admin.mapFee.index')}}">
                    <span> नक्शा दस्तुर  </span>
                </a>
            </li>
            @can('eMapTemplate_access')
                <li class="{{request()->is('admin/emap/setting/eMapTemplate*') ? 'active' : ''}}">
                    <a href="{{route('emap.admin.eMapTemplate.index')}}">
                        <span> टेम्प्लेट  </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/emap/files') ? 'active' : ''}}">
    <a href="{{route('emap.admin.files.file')}}">
        <i class="fa fa-file-archive"></i>
        <span>फाईल व्यवस्थापन</span>
    </a>
</li>

