<li>
    <a href="#sidebarDigitalBoard" data-bs-toggle="collapse">
        <i class="fa fa-photo-video"></i>
        <span>नागरिक वडापत्र</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('admin/digitalBoard/*') ?'':'collapse'}}" id="sidebarDigitalBoard">
        <ul class="nav-second-level">
            @can('registration_access')
                <li class="{{request()->routeIs('admin.digitalBoard.video.index') ? 'active' : ''}}">
                    <a href="{{route('admin.digitalBoard.video.index')}}">
                        <span> भिडियोहरु</span>
                    </a>
                </li>
            @endcan
            @can('digitalBoardNotice_access')
                <li class="{{request()->routeIs('admin.digitalBoard.notice.index') ? 'active' : ''}}">
                    <a href="{{route('admin.digitalBoard.notice.index')}}">
                        <span> सूचनाहरु</span>
                    </a>
                </li>
            @endcan
                @can('digitalBoardNews_access')
                    <li class="{{request()->routeIs('admin.digitalBoard.news.index') ? 'active' : ''}}">
                        <a href="{{route('admin.digitalBoard.news.index')}}">
                            <span> समाचारहरु</span>
                        </a>
                    </li>
                @endcan
                @can('employee_access')
                    <li class="{{request()->routeIs('admin.digitalBoard.employee.index') ? 'active' : ''}}">
                        <a href="{{route('admin.digitalBoard.employee.index')}}">
                            <span> कर्मचारीहरु</span>
                        </a>
                    </li>
                @endcan
        </ul>
    </div>
</li>


