<li class="{{request()->is('admin/setting/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.setting.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> गृहपृष्ठ </span>
    </a>
</li>
<li class="{{request()->is('admin/setting/generalSetting*') || request()->is('admin/setting/generalSetting*') ? 'active' : ''}}">
    <a href="#generalSetting"
       {{request()->is('admin/setting/generalSetting*') || request()->is('admin/setting/generalSetting*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cog"></i>
        <span>सामान्य सेटिङ </span>
        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>
    </a>
    <div
        class="collapse {{request()->is('admin/setting/generalSetting*') || request()->is('admin/setting/generalSetting*') ? 'show' : ''}}"
        id="generalSetting">
        <ul class="nav-second-level">
            @can('fiscalYear_access')
                <li class="{{request()->is('admin/setting/generalSetting/fiscalYear*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.fiscalYear.index')}}">
                        <span> आर्थिक बर्ष थप्नुहोस्</span>
                    </a>
                </li>
            @endcan

            @can('ethnicity_access')
                <li class="{{request()->is('admin/setting/generalSetting/ethnicity/*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.ethnicity.index')}}">
                        <span> जातियता थप्नुहोस्</span>
                    </a>
                </li>
            @endcan

            @can('occupation_access')
                <li class="{{request()->is('admin/setting/generalSetting/occupation/*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.occupation.index')}}">
                        <span> पेसा थप्नुहोस्</span>
                    </a>
                </li>
            @endcan

            @can('emergencyNumber_access')
                <li class="{{request()->is('admin/setting/generalSetting/emergencyNumber/*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.emergencyNumber.index')}}">
                        <span> आपतकालीन सम्पर्क नं. </span>
                    </a>
                </li>
            @endcan

            @can('branch_access')
                <li class="{{request()->is('admin/setting/generalSetting/branch*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.branch.index')}}">
                        <span> शाखा/उपशाखा थप्नुहोस्</span>
                    </a>
                </li>
            @endcan
            @can('designation_access')
                <li class="{{request()->is('admin/setting/generalSetting/designation*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.designation.index')}}">
                        <span> पद थप्नुहोस् </span>
                    </a>
                </li>
            @endcan
            @can('department_access')
                <li class="{{request()->is('admin/setting/generalSetting/department*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.department.index')}}">
                        <span> विभाग थप्नुहोस् </span>
                    </a>
                </li>
            @endcan
            @can('employee_access')
                <li class="{{request()->is('admin/setting/generalSetting/employee*') ? 'active' : ''}}">
                    <a href="{{route('admin.generalSetting.employee.index')}}">
                        <span> कर्मचारीहरु</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/setting/systemSetting*') || request()->is('admin/setting/systemSetting*') ? 'active' : ''}}">
    <a href="#systemSetting"
       {{request()->is('admin/setting/systemSetting*') || request()->is('admin/setting/systemSetting*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>प्रणाली सेटिङ </span>
        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>
    </a>
    <div
        class="collapse {{request()->is('admin/setting/systemSetting*') || request()->is('admin/setting/systemSetting*') ? 'show' : ''}}"
        id="systemSetting">
        <ul class="nav-second-level">
            @can('officeSetting_access')
                <li class="{{request()->is('admin/setting/systemSetting/officeSetting*') ? 'active' : ''}}">
                    <a href="{{route('admin.systemSetting.officeSetting.index')}}">
                        <span> कार्यालय सेटिङ </span>
                    </a>
                </li>
            @endcan
            <li class="{{request()->is('admin/setting/systemSetting/letterHead*') ? 'active' : ''}}">
                <a href="{{route('admin.systemSetting.letterHead.index')}}">
                    <span> लेटर हेड </span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/setting/featureSetting*') || request()->is('admin/setting/featureSetting*') ? 'active' : ''}}">
    <a href="#featureSetting"
       {{request()->is('admin/setting/featureSetting*') || request()->is('admin/setting/featureSetting*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-key"></i>
        <span>सुविधा सेटिङ</span>
        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>
    </a>
    <div
        class="collapse {{request()->is('admin/setting/featureSetting*') || request()->is('admin/setting/featureSetting*') ? 'show' : ''}}"
        id="featureSetting">
        <ul class="nav-second-level">
            @can('sms_access')
                <li class="{{request()->is('admin/setting/featureSetting/sms*') ? 'active' : ''}}">
                    <a href="{{route('admin.featureSetting.sms-setting')}}">
                        <span>एस.एम.एस सेटअप</span>
                    </a>
                </li>
            @endcan
            @can('mail_access')
                <li class="{{request()->is('admin/setting/featureSetting/mail*') ? 'active' : ''}}">
                    <a href="{{route('admin.featureSetting.mail-setting')}}">
                        <span>मेल सेटअप</span>
                    </a>
                </li>
            @endcan
            @can('feature_access')
                <li class="{{request()->is('admin/setting/featureSetting/feature*') ? 'active' : ''}}">
                    <a href="{{route('admin.featureSetting.feature-activation')}}">
                        <span>सुविधा सक्रियता </span>
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
        <span>प्रयोगकर्ता व्यवस्थापन</span>
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
        <i class="fa fa-crop-alt"></i>
        <span>मापन एकाइ</span>
        <span class="menu-arrow"><i class="fas fa-angle-right"></i></span>
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
