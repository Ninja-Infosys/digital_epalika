<li class="{{request()->is('admin/taskmanagement/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/taskmanagement/dailyTask') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.dailyTask.index')}}">
        <i class="fa fa-tasks"></i>
        <span> दैनिक कार्य</span>
    </a>
</li>
<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.dashboard')}}">
        <i class="fa fa-clipboard-list"></i>
        <span> रिपोर्ट</span>
    </a>
</li>

<li class="{{request()->is('admin/taskmanagement/setting/*') ? 'active' : ''}}">
    <a href="#sidebarTaskManagementSetting"
       {{request()->is('admin/taskmanagement/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/taskmanagement/setting/*') ? 'show' : ''}}"
         id="sidebarTaskManagementSetting">
        <ul class="nav-second-level">
                <li class="{{request()->is('admin/taskmanagement/setting/taskCategory*') ? 'active' : ''}}">
                    <a href="{{route('admin.taskManagement.taskCategory.index')}}">
                        <span> शाखाहरु अनुसार कार्यहरू </span>
                    </a>
                </li>
                <li class="{{request()->is('admin/taskmanagement/setting/taskDivision*') ? 'active' : ''}}">
                    <a href="{{route('admin.taskManagement.taskDivision.index')}}">
                        <span> कार्य विभाजन </span>
                    </a>
                </li>
        </ul>
    </div>
</li>

