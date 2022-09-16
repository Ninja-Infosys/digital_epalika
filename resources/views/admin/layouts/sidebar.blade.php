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
                        <span>Nagarik sahayog Bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Gunaso Bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Karyapalika bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Sifaris bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Bebasayik nabikaran darta pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Karmachari Bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Naksa Pass pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Talim Bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Rajaswa sankalan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Yojan Bebasthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Apangata/Jestha nagarik bebsthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Nyayik samiti bebsthapan pranali</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>Digital LG Profile</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span>प्रयोगकर्ता र भूमिका</span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="{{request()->is('admin/userManagement/*') ?'':'collapse'}}" id="sidebarUserManagement">
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
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
