<li>
    <a href="#sidebarDigitalBoard" data-bs-toggle="collapse">
        <i class="fa fa-photo-video"></i>
        <span>डिजिटल बोर्ड</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('admin/digitalBoard/*') ?'':'collapse'}}" id="sidebarDigitalBoard">
        <ul class="nav-second-level">
            @can('registration_access')
                <li class="{{request()->routeIs('admin.digitalBoard.video.index') ? 'active' : ''}}">
                    <a href="{{route('admin.digitalBoard.video.index')}}">
                        <span> भिडियो</span>
                    </a>
                </li>
            @endcan
            @can('digitalBoardNotice_access')
                <li class="{{request()->routeIs('admin.digitalBoard.notice.index') ? 'active' : ''}}">
                    <a href="{{route('admin.digitalBoard.notice.index')}}">
                        <span> Notice</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
