<li>
    <a href="#sidebarExecutiveMeeting" data-bs-toggle="collapse">
        <i class="fa fa-photo-video"></i>
        <span>ई-कार्यपालिका </span>
        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
    </a>
    <div class="{{request()->is('admin/executiveMeeting/*') ?'':'collapse'}}"
         id="sidebarExecutiveMeeting">
        <ul class="nav-second-level">
            @can('executiveCommittee_access')
                <li class="{{request()->routeIs('admin.executiveMeeting.municipalCommittee.index') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.municipalCommittee.index')}}">
                        <span> पालिका समिति बिवरण</span>
                    </a>
                </li>
                <li class="{{request()->routeIs('admin.executiveMeeting.wardCommittee.index') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.wardCommittee.index')}}">
                        <span> वडा समिति बिवरण</span>
                    </a>
                </li>
            @endcan
            <li>
                <a href="#sidebarExecutiveMeetingMunicipal" data-bs-toggle="collapse">
                    <span>पालिका समिति बैठक</span>
                    <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                </a>
                <div class="collapse" id="sidebarExecutiveMeetingMunicipal">
                    <ul class="nav-second-level">
                        @can('municipalMeeting_access')
                            <li class="{{request()->routeIs('admin.executiveMeeting.municipalMeetingNotice.index') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.index')}}">
                                    <span> सूचना प्रशारण </span>
                                </a>
                            </li>
                            <li class="{{request()->routeIs('admin.executiveMeeting.municipalMeetingDetails') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.municipalMeetingDetails')}}">
                                    <span> बैठक बिबरण </span>
                                </a>
                            </li>
                            <li class="{{request()->routeIs('admin.executiveMeeting.municipalMeetingDecision.index') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.municipalMeetingDecision.index')}}">
                                    <span> निर्णयहरु</span>
                                </a>
                            </li>
                            <li class="{{request()->routeIs('admin.executiveMeeting.municipalMeetingDetailsReport') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.municipalMeetingDetailsReport')}}">
                                    <span> बैठक बिबरण रिपोर्ट </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>

            <li>
                <a href="#sidebarExecutiveMeetingWard" data-bs-toggle="collapse">
                    <span>वडा समिति बैठक</span>
                    <span class="menu-arrow">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                </a>
                <div class="collapse" id="sidebarExecutiveMeetingWard">
                    <ul class="nav-second-level">
                        @can('wardMeeting_access')
                            <li class="{{request()->routeIs('admin.executiveMeeting.wardMeetingNotice.index') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.wardMeetingNotice.index')}}">
                                    <span> सूचना प्रशारण </span>
                                </a>
                            </li>
                            <li class="{{request()->routeIs('admin.executiveMeeting.wardMeetingDetails') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.wardMeetingDetails')}}">
                                    <span> बैठक बिबरण </span>
                                </a>
                            </li>
                            <li class="{{request()->routeIs('admin.executiveMeeting.wardMeetingDecision.index') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.wardMeetingDecision.index')}}">
                                    <span> निर्णयहरु</span>
                                </a>
                            </li>
                            <li class="{{request()->routeIs('admin.executiveMeeting.wardMeetingDetailsReport') ? 'active' : ''}}">
                                <a href="{{route('admin.executiveMeeting.wardMeetingDetailsReport')}}">
                                    <span> बैठक बिबरण रिपोर्ट </span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
