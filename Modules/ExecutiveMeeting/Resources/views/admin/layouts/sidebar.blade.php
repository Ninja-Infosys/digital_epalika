<li class="{{request()->is('admin/executivemeeting/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.executiveMeeting.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/executivemeeting/calender') ? 'active' : ''}}">
    <a href="{{route('admin.executiveMeeting.calender.index')}}">
        <i class="fa fa-home"></i>
        <span> Calender</span>
    </a>
</li>
<li class="{{request()->is('admin/executivemeeting/meetingEvent') ? 'active' : ''}}">
    <a href="{{route('admin.executiveMeeting.meetingEvent.index')}}">
        <i class="fa fa-calendar"></i>
        <span> Meeting Event</span>
    </a>
</li>
@can('executiveCommittee_access')
    <li class="{{request()->is('admin/executivemeeting/municipalCommittee*') ? 'active' : ''}}">
        <a href="{{route('admin.executiveMeeting.municipalCommittee.index')}}">
            <i class="fa fa-list-alt"></i>
            <span> पालिका समिति बिवरण</span>
        </a>
    </li>
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
            @can('municipalMeeting_access')
                <li class="{{request()->is('admin/executivemeeting/municipal/municipalMeetingNotice*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.index')}}">
                        <span> सूचना प्रशारण </span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/municipal/municipalMeetingDetails') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.municipalMeetingDetails')}}">
                        <span> बैठक बिबरण </span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/municipal/municipalMeetingDecision*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.municipalMeetingDecision.index')}}">
                        <span> निर्णयहरु</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/municipal/municipalMeetingDetails/report') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.municipalMeetingDetailsReport')}}">
                        <span> बैठक बिबरण रिपोर्ट </span>
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
            @can('wardMeeting_access')
                <li class="{{request()->is('admin/executivemeeting/ward/wardMeetingNotice*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.wardMeetingNotice.index')}}">
                        <span> सूचना प्रशारण </span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/ward/wardMeetingDetails') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.wardMeetingDetails')}}">
                        <span> बैठक बिबरण </span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/ward/wardMeetingDecision*') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.wardMeetingDecision.index')}}">
                        <span> निर्णयहरु</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/executivemeeting/ward/wardMeetingDetails/report') ? 'active' : ''}}">
                    <a href="{{route('admin.executiveMeeting.wardMeetingDetailsReport')}}">
                        <span> बैठक बिबरण रिपोर्ट </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>
