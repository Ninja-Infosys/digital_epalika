<li>
    <a href="#sidebarHelpDesk" data-bs-toggle="collapse">
        <i class="fa fa-photo-video"></i>
        <span> हेल्प डेस्क  </span>
        <span class="menu-arrow">
                <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('admin/helpDesk/*') ?'':'collapse'}}"
         id="sidebarHelpDesk">
        <ul class="nav-second-level">
            <li class="{{request()->routeIs('admin.helpDesk.branch.index') ? 'active' : ''}}">
                <a href="{{route('admin.helpDesk.branch.index')}}">
                    <span> शाखा </span>
                </a>
            </li>
            <li class="{{request()->routeIs('admin.helpDesk.service.index') ? 'active' : ''}}">
                <a href="{{route('admin.helpDesk.service.index')}}">
                    <span> सेवाहरु </span>
                </a>
            </li>
        </ul>
    </div>
</li>
