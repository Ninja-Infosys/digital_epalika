<li class="{{request()->is('admin/businessRegistration/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.businessRegistration.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('businessRegistration_access')
    <li class="{{request()->is('admin/businessRegistration/businessRegistration') ? 'active' : ''}}">
        <a href="{{route('admin.businessRegistration.businessRegistration.index')}}">
            <i class="fa fa-building"></i>
            <span> दर्ता भएका व्यवसाय</span>
        </a>
    </li>
@endcan

{{--<li class="{{request()->is('admin/businessRegistration/report/*') ? 'active' : ''}}">--}}
{{--    <a href="{{route('admin.businessRegistration.report.report')}}">--}}
{{--        <i class="fa fa-file"></i>--}}
{{--        <span>रिपोर्ट</span>--}}
{{--    </a>--}}
{{--</li>--}}


<li class="{{request()->is('admin/businessRegistration/setting/*') ? 'active' : ''}}">
    <a href="#sidebarBusinessRegistrationSetting"
       {{request()->is('admin/businessRegistration/setting/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cog"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
                        <i class="fa fa-angle-right"></i>
                    </span>
    </a>
    <div class="collapse {{request()->is('admin/businessRegistration/setting/*') ? 'show' : ''}}"
         id="sidebarBusinessRegistrationSetting">
        <ul class="nav-second-level">
            @can('businessNature_access')
                <li class="{{request()->is('admin/businessRegistration/setting/businessNature/*') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.businessNature.index')}}">
                        <span>  व्यवसायको प्रकृति </span>
                    </a>
                </li>
            @endcan

            @can('objectTransaction_access')
                <li class="{{request()->is('admin/businessRegistration/setting/objectTransaction/*') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.objectTransaction.index')}}">
                        <span>कारोबार गर्ने वस्तु श्रेणी</span>
                    </a>
                </li>
            @endcan

            @can('businessRegistrationTemplate_access')
                <li class="{{request()->is('admin/businessRegistration/setting/businessRegistrationTemplate/*') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.businessRegistrationTemplate.enumList')}}">
                        <span>सेटिङ</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>

<li class="{{request()->is('admin/businessRegistration/files/file/*') ? 'active' : ''}}">
    <a href="{{route('admin.businessRegistration.files.file')}}">
        <i class="fa fa-file-archive"></i>
        <span>फाईल व्यवस्थापन</span>
    </a>
</li>

