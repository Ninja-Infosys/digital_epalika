<li class="menu-title">Digital Board</li>
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
