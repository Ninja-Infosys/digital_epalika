<li>
    <a href="#sidebarBusinessRegistration" data-bs-toggle="collapse">
        <i class="fa fa-registered"></i>
        <span>व्यवसाय दर्ता</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('businessRegistration/admin/*') ?'':'collapse'}}" id="sidebarBusinessRegistration">
        <ul class="nav-second-level">

{{--                <li class="{{request()->routeIs('admin.circular.registration.index') ? 'active' : ''}}">--}}
{{--                    <a href="{{route('admin.circular.registration.index')}}">--}}
{{--                        <span> दर्ता प्रणाली   </span>--}}
{{--                    </a>--}}
{{--                </li>--}}


{{--                <li>--}}
{{--                    <a href="{{route('admin.circular.dispatch.index')}}">--}}
{{--                        <span> चलानी प्रणाली </span>--}}
{{--                    </a>--}}
{{--                </li>--}}

            <li>
                <a href="#sidebarBusinessRegistrationSetting" data-bs-toggle="collapse">
                    <span>सेटिङ</span>
                    <span class="menu-arrow">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                <div class="collapse" id="sidebarBusinessRegistrationSetting">
                    <ul class="nav-second-level">

                            <li class="{{request()->routeIs('admin.businessRegistration.setting.businessNature.index') ? 'active' : ''}}">
                                <a href="{{route('admin.businessRegistration.setting.businessNature.index')}}">
                                    <span>  व्यवसाय को प्रकृति </span>
                                </a>
                            </li>


                            <li class="{{request()->routeIs('admin.circular.dispatch.report') ? 'active' : ''}}">
                                <a href="{{route('admin.circular.dispatch.report')}}">
                                    <span> चलानी प्रणाली रिपोर्ट</span>
                                </a>
                            </li>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>

