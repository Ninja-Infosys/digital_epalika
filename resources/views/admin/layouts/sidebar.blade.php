<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fa fa-home"></i>
                        <span> गृहपृष्ठ </span>
                    </a>
                </li>

                @includeIf('digitalboard::layouts.sidebar')

                @includeIf('circular::layouts.sidebar')

                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>हेल्प डेस्क </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>ई-गुनासो </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span> ई-कार्यपालिका  </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>ई-सिफारिस </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>ई-ब्यबसायिक दर्ता </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span> कर्मचारी </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>नक्सा पास प्रणाली </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>तालिम ब्यबस्थापन प्रणाली </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span> राजस्व संकलन प्रणाली </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>योजना ब्यबस्थापन प्रणाली </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>अपाङ्गता/जेष्ठ नागरिक प्रणाली </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span> ई-न्यायिक प्रणाली </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>डिजिटल LG प्रोफाइल</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
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
                        <i class="fa fa-users-cog"></i>
                        <span>सेटिङ</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/setting/*') ?'':'collapse'}}" id="setting">
                        <ul class="nav-second-level">
                            @can('fiscalYear_access')
                                <li class="{{request()->routeIs('admin.fiscalYear.index') ? 'active':''}}">
                                    <a href="{{route('admin.fiscalYear.index')}}">आर्थिक बर्ष</a>
                                </li>
                            @endcan

                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
