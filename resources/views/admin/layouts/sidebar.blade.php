<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i class="fa fa-home"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarUserManagement" data-bs-toggle="collapse">
                        <i class="fa fa-users-cog"></i>
                        <span> User & Role </span>
                        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="collapse" id="sidebarUserManagement">
                        <ul class="nav-second-level">
                            @can('user_access')
                                <li>
                                    <a href="{{route('admin.userManagement.user.index')}}">User</a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li>
                                    <a href="{{route('admin.userManagement.role.index')}}">Role</a>
                                </li>
                            @endcan
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMultilevel" data-bs-toggle="collapse">
                        <i data-feather="share-2"></i>
                        <span> Multi Level </span>
                        <span class="menu-arrow">
                            <i class="fa fa-angle-right"></i>
                        </span>
                    </a>
                    <div class="collapse" id="sidebarMultilevel">
                        <ul class="nav-second-level">
                            <li>
                                <a href="#sidebarMultilevel2" data-bs-toggle="collapse">
                                    Second Level <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                </a>
                                <div class="collapse" id="sidebarMultilevel2">
                                    <ul class="nav-second-level">
                                        <li>
                                            <a href="javascript: void(0);">Item 1</a>
                                        </li>
                                        <li>
                                            <a href="javascript: void(0);">Item 2</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
