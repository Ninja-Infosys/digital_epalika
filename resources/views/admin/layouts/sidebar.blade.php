<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!-- User box -->
        <div class="user-box text-center">
            <img
                src="{{auth()->user()->profile_photo_url}}"
                alt="user-img"
                title="{{auth()->user()->name}}"
                class="rounded-circle avatar-md"
            />
            <div class="dropdown">
                <a
                    href="javascript: void(0);"
                    class="text-light dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown"
                >
                    {{auth()->user()->name}}
                </a
                >
                <div class="dropdown-menu user-pro-dropdown">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-lock"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-sign-out-alt me-1"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </div>
            <p class="text-muted">{{auth()->user()->role->title??''}}</p>
        </div>
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
                    <a href="#sidebarExecutiveMeeting" data-bs-toggle="collapse">
                        <i class="fa fa-photo-video"></i>
                        <span>ई-कार्यपालिका </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/executiveMeeting/*') ?'':'collapse'}}"
                         id="sidebarExecutiveMeeting">
                        <ul class="nav-second-level">
                            @can('executiveCommittee_access')
                                <li class="{{request()->routeIs('admin.executiveMeeting.municipalCommittee.index') ? 'active' : ''}}">
                                    <a href="{{route('admin.executiveMeeting.municipalCommittee.index')}}">
                                        <span> पालिका समिति बिवरण</span>
                                    </a>
                                </li>
                                <li class="{{request()->routeIs('admin.executiveMeeting.wardCommittee.index') ? 'active' : ''}}">
                                    <a href="{{route('admin.executiveMeeting.wardCommittee.index')}}">
                                        <span> वडा समिति बिवरण</span>
                                    </a>
                                </li>
                            @endcan
                            <li>
                                <a href="#sidebarExecutiveMeetingMunicipal" data-bs-toggle="collapse">
                                    <span>पालिका समिति बैठक</span>
                                    <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="sidebarExecutiveMeetingMunicipal">
                                    <ul class="nav-second-level">
                                        @can('registration_access')
                                            <li class="{{request()->routeIs('admin.executiveMeeting.municipalMeetingNotice.index') ? 'active' : ''}}">
                                                <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.index')}}">
                                                    <span> सूचना प्रशारण </span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('dispatch_access')
                                            <li class="{{request()->routeIs('admin.circular.dispatch.report') ? 'active' : ''}}">
                                                <a href="{{route('admin.circular.dispatch.report')}}">
                                                    <span> निर्णयहरु</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>

                            <li>
                                <a href="#sidebarExecutiveMeetingWard" data-bs-toggle="collapse">
                                    <span>वडा समिति बैठक</span>
                                    <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="sidebarExecutiveMeetingWard">
                                    <ul class="nav-second-level">
                                        @can('registration_access')
                                            <li class="{{request()->routeIs('admin.circular.registration.report') ? 'active' : ''}}">
                                                <a href="{{route('admin.circular.registration.report')}}">
                                                    <span> सूचना प्रशारण </span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('dispatch_access')
                                            <li class="{{request()->routeIs('admin.circular.dispatch.report') ? 'active' : ''}}">
                                                <a href="{{route('admin.circular.dispatch.report')}}">
                                                    <span> निर्णयहरु</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarListRegistration" data-bs-toggle="collapse">
                        <i class="fa fa-file-contract"></i>
                        <span>सुची दर्ता प्रणालि </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/listRegistrations/*') ?'':'collapse'}}"
                         id="sidebarListRegistration">
                        <ul class="nav-second-level">
                            @can('listRegistration_access')
                                <li class="{{request()->routeIs('admin.listRegistrations.listRegistration.index') ? 'active' : ''}}">
                                    <a href="{{route('admin.listRegistrations.listRegistration.index')}}">
                                        <span>मौजुदा सुची दर्ता</span>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </div>
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
                        <i class="fa fa-cogs"></i>
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

                            <li class="{{request()->routeIs('admin.officeSetting.index') ? 'active':''}}">
                                <a href="{{route('admin.officeSetting.index')}}"> कार्यालय सेटिङ</a>
                            </li>


                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
