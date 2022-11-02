<li class="{{request()->is('admin/roaster/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.roaster.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/roaster/dashboard/*') ? 'active' : ''}}">
    <a href="#sidebarEMapSetting"
       {{request()->is('admin/roaster/dashboard/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-user"></i>
        <span>प्रशिक्षक थप्नुहोस्</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/roaster/dashboard/*') ? 'show' : ''}}"
         id="sidebarEMapSetting">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/roaster/dashboard/*') ? 'active' : ''}}">
                <a href="{{url('admin/roaster/subject/create')}}">
                    <span>विषय</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/setting/mapFee/*') ? 'active' : ''}}">
                <a href="{{route('admin.roaster.dashboard')}}">
                    <span>प्रशिक्षक</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/roaster/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.roaster.dashboard')}}">
        <i class="fa fa-book"></i>
        <span>तालिम</span>
    </a>
</li>

<li class="{{request()->is('admin/roaster/setting/*') ? 'active' : ''}}">
    <a href="#sidebarRoaster"
       {{request()->is('admin/roaster/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-user"></i>
        <span>सेटिङ </span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/roaster/setting/*') ? 'show' : ''}}"
         id="sidebarRoaster">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/roaster/setting/designation') ? 'active' : ''}}">
                <a href="{{route('admin.roaster.setting.designation.index')}}">
                    <span>पद थप्नुहोस् </span>
                </a>
            </li>
            <li class="{{request()->is('admin/roaster/setting/department') ? 'active' : ''}}">
                <a href="{{route('admin.roaster.setting.department.index')}}">
                    <span>विभाग थप्नुहोस् </span>
                </a>
            </li>
        </ul>
    </div>
</li>

