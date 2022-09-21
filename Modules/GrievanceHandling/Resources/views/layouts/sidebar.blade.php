<li>
    <a href="#sidebarGrievanceHandling" data-bs-toggle="collapse">
        <i class="fa fa-photo-video"></i>
        <span> ई-गुनासो </span>
        <span class="menu-arrow">
                <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('admin/executiveMeeting/*') ?'':'collapse'}}"
         id="sidebarGrievanceHandling">
        <ul class="nav-second-level">
            <li class="{{request()->routeIs('admin.executiveMeeting.municipalCommittee.index') ? 'active' : ''}}">
                <a href="{{route('admin.executiveMeeting.municipalCommittee.index')}}">
                    <span> पालिका समिति बिवरण</span>
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
                        @can('municipalMeeting_access')
                            <li class="{{request()->routeIs('admin.executiveMeeting.municipalMeetingNotice.index') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.index')}}">
                                    <span> गुनासो प्रकार </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
