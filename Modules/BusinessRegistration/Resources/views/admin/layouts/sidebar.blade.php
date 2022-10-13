<li>
    <a href="{{route('admin.businessRegistration.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li>
    <a href="#sidebarBusinessRegistrationSetting" data-bs-toggle="collapse">
        <i class="fa fa-cog"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
                        <i class="fa fa-angle-right"></i>
                    </span>
    </a>
    <div class="collapse" id="sidebarBusinessRegistrationSetting">
        <ul class="nav-second-level">
            @can('businessNature_access')
                <li class="{{request()->routeIs('admin.businessRegistration.setting.businessNature.index') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.businessNature.index')}}">
                        <span>  व्यवसाय को प्रकृति </span>
                    </a>
                </li>
            @endcan
            @can('businessPurpose_access')
                <li class="{{request()->routeIs('admin.businessRegistration.setting.businessPurpose.index') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.businessPurpose.index')}}">
                        <span>  उदेश्य </span>
                    </a>
                </li>
            @endcan

            @can('objectTransaction_access')
                <li class="{{request()->routeIs('admin.businessRegistration.setting.objectTransaction.index') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.objectTransaction.index')}}">
                        <span>कारोबार गर्ने वस्तु श्रेणी</span>
                    </a>
                </li>
            @endcan
            @can('objectTransactionSubCategory_access')
                <li class="{{request()->routeIs('admin.businessRegistration.setting.objectTransactionSubCategory.index') ? 'active' : ''}}">
                    <a href="{{route('admin.businessRegistration.setting.objectTransactionSubCategory.index')}}">
                        <span>कारोबार गर्ने वस्तु उप श्रेणी</span>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</li>

