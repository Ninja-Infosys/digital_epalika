<li class="{{request()->is('admin/setting/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.setting.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> गृहपृष्ठ </span>
    </a>
</li>

@can('fiscalYear_access')
    <li class="{{request()->is('admin/setting/fiscalYear*') ? 'active' : ''}}">
        <a href="{{route('admin.fiscalYear.index')}}">
            <i class="fa fa-calendar"></i>
            <span> आर्थिक बर्ष </span>
        </a>
    </li>
@endcan
@can('ethnicity_access')
    <li class="{{request()->is('admin/setting/fiscalYear/*') ? 'active' : ''}}">
        <a href="{{route('admin.ethnicity.index')}}">
            <i class="fa fa-user"></i>
            <span> जातियता </span>
        </a>
    </li>
@endcan

@can('branch_access')
    <li class="{{request()->is('admin/setting/branch*') ? 'active' : ''}}">
        <a href="{{route('admin.branch.index')}}">
            <i class="fa fa-code-branch"></i>
            <span> शाखा/उपशाखा थप्नुहोस् </span>
        </a>
    </li>
@endcan
<li class="{{request()->is('admin/setting/officeSetting*') ? 'active' : ''}}">
    <a href="{{route('admin.officeSetting.index')}}">
        <i class="fa fa-cogs"></i>
        <span> कार्यालय सेटिङ </span>
    </a>
</li>
<li class="{{request()->is('admin/setting/sms*') ? 'active' : ''}}">
    <a href="{{route('admin.setting.sms')}}">
        <i class="fa fa-envelope"></i>
        <span> एस.एम.एस सेटिङ </span>
    </a>
</li>
<li class="{{request()->is('admin/setting/designation*') || request()->is('admin/setting/department*') ? 'active' : ''}}">
    <a href="#designationDepartment"
       {{request()->is('admin/setting/designation*') || request()->is('admin/setting/department*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-list"></i>
        <span>पद/विभाग</span>
        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
    </a>
    <div
        class="collapse {{request()->is('admin/setting/designation*') || request()->is('admin/setting/department*') ? 'show' : ''}}"
        id="designationDepartment">
        <ul class="nav-second-level">
            @can('designation_access')
                <li class="{{request()->is('admin/setting/designation*') ? 'active' : ''}}">
                    <a href="{{route('admin.designation.index')}}">
                        <span> पद थप्नुहोस् </span>
                    </a>
                </li>
            @endcan
            @can('department_access')
                <li class="{{request()->is('admin/setting/department*') ? 'active' : ''}}">
                    <a href="{{route('admin.department.index')}}">
                        <span> विभाग थप्नुहोस् </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/setting/userManagement/*') ? 'active' : ''}}">
    <a href="#userManagement"
       {{request()->is('admin/setting/userManagement/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-users-cog"></i>
        <span>प्रयोगकर्ता र भूमिका</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/setting/userManagement/*') ? 'show' : ''}}"
         id="userManagement">
        <ul class="nav-second-level">
            @can('user_access')
                <li class="{{request()->is('admin/setting/userManagement/user*') ? 'active' : ''}}">
                    <a href="{{route('admin.userManagement.user.index')}}">प्रयोगकर्ता</a>
                </li>
            @endcan
            @can('role_access')
                <li class="{{request()->is('admin/setting/userManagement/role*') ? 'active' : ''}}">
                    <a href="{{route('admin.userManagement.role.index')}}">भूमिका</a>
                </li>
            @endcan
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/setting/units/*') ? 'active' : ''}}">
    <a href="#measurementUnits"
       {{request()->is('admin/setting/units/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-users-cog"></i>
        <span>मापन एकाइ</span>
        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
    </a>
    <div class="collapse {{request()->is('admin/setting/units/*') ? 'show' : ''}}"
         id="measurementUnits">
        <ul class="nav-second-level">
            @can('unitType_access')
                <li class="{{request()->is('admin/setting/units/type*') ? 'active' : ''}}">
                    <a href="{{route('admin.units.type.index')}}">
                        <span> प्रकार </span>
                    </a>
                </li>
            @endcan
            @can('MeasurementUnit_access')
                <li class="{{request()->is('admin/setting/units/measurementUnit*') ? 'active' : ''}}">
                    <a href="{{route('admin.units.measurementUnit.index')}}">
                        <span> विविधता </span>
                    </a>
                </li>
            @endcan
            @can('unit_access')
                <li class="{{request()->is('admin/setting/units/unit*') ? 'active' : ''}}">
                    <a href="{{route('admin.units.unit.index')}}">
                        <span> एकाई </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
