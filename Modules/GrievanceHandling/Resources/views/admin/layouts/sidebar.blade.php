<li>
    <a href="#sidebarGrievanceHandling" data-bs-toggle="collapse">
        <i class="fa fa-photo-video"></i>
        <span> ई-गुनासो </span>
        <span class="menu-arrow">
                <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('admin/grievanceHandling/*') ?'':'collapse'}}"
         id="sidebarGrievanceHandling">
        <ul class="nav-second-level">
            <li class="{{request()->routeIs('admin.grievanceHandling.grievanceDetail.index') ? 'active' : ''}}">
                <a href=" {{route('admin.grievanceHandling.grievanceDetail.index')}}">
                    <span> गुनासो बिबरण </span>
                </a>
            </li>
            <li>
                <a href="#sidebarGrievanceHandlingSetting" data-bs-toggle="collapse">
                    <span>सेटिंग </span>
                    <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                </a>
                <div class="collapse" id="sidebarGrievanceHandlingSetting">
                    <ul class="nav-second-level">
                        @can('grievanceType_access')
                            <li class="{{request()->routeIs('admin.grievanceHandling.setting.grievanceType.index') ? 'active' : ''}}">
                                <a href="{{route('admin.grievanceHandling.setting.grievanceType.index')}}">
                                    <span> गुनासो प्रकार </span>
                                </a>
                            </li>
                        @endcan
                        @can('grievanceOffice_access')
                            <li class="{{request()->routeIs('admin.grievanceHandling.setting.grievanceOffice.index') ? 'active' : ''}}">
                                <a href="{{route('admin.grievanceHandling.setting.grievanceOffice.index')}}">
                                    <span> शाखा/कार्यालय </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
