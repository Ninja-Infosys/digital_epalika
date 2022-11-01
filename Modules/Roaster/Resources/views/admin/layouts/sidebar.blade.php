<li class="{{request()->is('admin/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.roaster.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/emap/setting/*') ? 'active' : ''}}">
    <a href="#sidebarEMapSetting"
       {{request()->is('admin/emap/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-user"></i>
        <span>प्रशिक्षक थप्नुहोस्</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/emap/setting/*') ? 'show' : ''}}"
         id="sidebarEMapSetting">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/emap/setting/mapSetting') ? 'active' : ''}}">
                <a href="{{route('emap.admin.mapSetting.index')}}">
                    <span>विषय</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/setting/mapFee/*') ? 'active' : ''}}">
                <a href="{{route('emap.admin.mapFee.index')}}">
                    <span>प्रशिक्षक</span>
                </a>
            </li>
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/emap/files') ? 'active' : ''}}">
    <a href="{{route('emap.admin.files.file')}}">
        <i class="fa fa-book"></i>
        <span>तालिम</span>
    </a>
</li>

