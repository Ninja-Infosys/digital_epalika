<li class="{{request()->is('admin/executivemeeting/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.executiveMeeting.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('executiveMunicipalCommittee_access')
    <li class="{{request()->is('admin/executivemeeting/municipalCommittee*') ? 'active' : ''}}">
        <a href="{{route('admin.executiveMeeting.municipalCommittee.index')}}">
            <i class="fa fa-list-alt"></i>
            <span> पालिका समिति बिवरण</span>
        </a>
    </li>
@endcan
@can('executiveWardCommittee_access')
    <li class="{{request()->is('admin/executivemeeting/wardCommittee*') ? 'active' : ''}}">
        <a href="{{route('admin.executiveMeeting.wardCommittee.index')}}">
            <i class="fa fa-list-alt"></i>
            <span> वडा समिति बिवरण</span>
        </a>
    </li>
@endcan

<li class="{{request()->is('admin/executivemeeting/municipal/*') ? 'active' : ''}}">
    <a href="#sidebarExecutiveMeetingMunicipal"
       {{request()->is('admin/executivemeeting/municipal/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-layer-group"></i>
        <span>पालिका समिति बैठक</span>
        <span class="menu-arrow">
            <i class="fa fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/executivemeeting/municipal/*') ? 'show' : ''}}"
         id="sidebarExecutiveMeetingMunicipal">
        <ul class="nav-second-level">
            @can('municipalMeetingEvent_access')
                <li class="{{request()->is('admin/executivemeeting/municipal/meetingEvent*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.calendar.index','municipal')}}">
                        <span> बैठक Calendar </span>
                    </a>
                </li>
            @endcan
            @can('municipalMeetingEvent_access')
                <li class="{{request()->is('admin/executivemeeting/municipal/meetingEvent*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.meetingEvent.index','municipal')}}">
                        <span> बैठक बिबरण </span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/municipal/upcoming-meetings') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.upcomingMeetingEvents','municipal')}}">
                        <span> आगामी बैठकहरू </span>
                    </a>
                </li>
            @endcan
            @can('municipalMeetingDecision_access')
                <li class="{{request()->is('admin/executivemeeting/municipal/meetingDecision*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.meetingDecision.index','municipal')}}">
                        <span> निर्णयहरु</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
<li class="{{request()->is('admin/executivemeeting/ward/*') ? 'active' : ''}}">
    <a href="#sidebarExecutiveMeetingWard"
       {{request()->is('admin/executivemeeting/ward/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-layer-group"></i>
        <span>वडा समिति बैठक</span>
        <span class="menu-arrow">
            <i class="fa fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/executivemeeting/ward/*') ? 'show' : ''}}"
         id="sidebarExecutiveMeetingWard">
        <ul class="nav-second-level">
            @can('wardMeetingEvent_access')
                <li class="{{request()->is('admin/executivemeeting/ward/calendar') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.calendar.index','ward')}}">
                        <span> बैठक Calendar </span>
                    </a>
                </li>
            @endcan
            @can('wardMeetingEvent_access')
                <li class="{{request()->is('admin/executivemeeting/ward/meetingEvent') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.meetingEvent.index','ward')}}">
                        <span> बैठक बिबरण </span>
                    </a>
                </li>

                <li class="{{request()->is('admin/executivemeeting/ward/upcoming-meetings') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.upcomingMeetingEvents','ward')}}">
                        <span> आगामी बैठकहरू </span>
                    </a>
                </li>
            @endcan
            @can('wardMeetingDecision_access')
                <li class="{{request()->is('admin/executivemeeting/ward/meetingDecision*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.meetingDecision.index','ward')}}">
                        <span> निर्णयहरु</span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
