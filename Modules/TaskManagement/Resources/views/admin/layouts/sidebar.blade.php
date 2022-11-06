<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.task.index')}}">
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

<li class="{{request()->is('admin/grant/setting/*') ? 'active' : ''}}">
    <a href="#sidebarGrantSetting"
       {{request()->is('admin/grant/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/grant/setting/*') ? 'show' : ''}}"
         id="sidebarGrantSetting">
        <ul class="nav-second-level">
                <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                    <a href="{{route('admin.grant.infrastructure.index')}}">
                        <span> शाखाहरु अनुसार कार्यहरू </span>
                    </a>
                </li>
        </ul>
    </div>
</li>

