<li>
    <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> गृहपृष्ठ </span>
    </a>
</li>

<li>
    <a href="#registration" data-bs-toggle="collapse">
        <i class="fa fa-users-cog"></i>
        <span>प्रयोगकर्ता र भूमिका</span>
        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
    </a>
    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="registration">
        <ul class="nav-second-level">
            @can('user_access')
                <li class="{{request()->routeIs('admin.userManagement.user.index') ? 'active':''}}">
                    <a href="{{route('admin.userManagement.user.index')}}">प्रयोगकर्ता</a>
                </li>
            @endcan
            @can('role_access')
                <li class="{{request()->routeIs('admin.userManagement.role.index') ? 'active':''}}">
                    <a href="{{route('admin.userManagement.role.index')}}">भूमिका</a>
                </li>
            @endcan
        </ul>
    </div>
</li>

<li>
    <a href="#setting" data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
    </a>
    <div class="{{request()->is('admin/setting/*') ?'':'collapse'}}" id="setting">
        <ul class="nav-second-level">
            @can('fiscalYear_access')
                <li class="{{request()->routeIs('admin.fiscalYear.*') ? 'active':''}}">
                    <a href="{{route('admin.fiscalYear.index')}}">आर्थिक बर्ष</a>
                </li>
            @endcan

            <li>
                <a href="#sidebarUnits" data-bs-toggle="collapse">
                    <span>मापन एकाइ</span>
                    <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                </a>
                <div class="{{request()->is('admin/setting/units/*') ?'':'collapse'}}"
                     id="sidebarUnits">
                    <ul class="nav-second-level">
                        @can('unitType_access')
                            <li class="{{request()->routeIs('admin.units.type.*') ? 'active' : ''}}">
                                <a href="{{route('admin.units.type.index')}}">
                                    <span> प्रकार </span>
                                </a>
                            </li>
                        @endcan
                        @can('MeasurementUnit_access')
                            <li class="{{request()->routeIs('admin.units.measurementUnit.*') ? 'active' : ''}}">
                                <a href="{{route('admin.units.measurementUnit.index')}}">
                                    <span> विविधता </span>
                                </a>
                            </li>
                        @endcan
                        @can('unit_access')
                            <li class="{{request()->routeIs('admin.units.unit.*') ? 'active' : ''}}">
                                <a href="{{route('admin.units.unit.index')}}">
                                    <span> एकाई </span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </div>
            </li>

            <li class="{{request()->routeIs('admin.officeSetting.index') ? 'active':''}}">
                <a href="{{route('admin.officeSetting.index')}}"> कार्यालय सेटिङ</a>
            </li>
        </ul>
    </div>
</li>
