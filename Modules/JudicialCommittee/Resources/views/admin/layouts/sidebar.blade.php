<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.judicialCommittee.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('chiefJudicialMember_access')
    <li>
        <a href="{{route('admin.judicialCommittee.chiefJudicialMember.index')}}">
            <i class="fa fa-user"></i>
            <span>प्रमुख न्यायिक सदस्य</span>
        </a>
    </li>
@endcan
@can('administrationMember_access')
    <li>
        <a href="{{route('admin.judicialCommittee.administrationMember.index')}}">
            <i class="fa fa-user"></i>
            <span>प्रशासन सदस्यहरू</span>
        </a>
    </li>
@endcan
@can('judicialMember_access')
    <li>
        <a href="{{route('admin.judicialCommittee.judicialMember.index')}}">
            <i class="fa fa-user"></i>
            <span>न्यायिक समिति विवरण </span>
        </a>
    </li>
@endcan
@can('complaintApplication_access')
    <li>
        <a href="{{route('admin.judicialCommittee.complaintApplication.index')}}">
            <i class="fa fa-edit"></i>
            <span>निबेदन फारम</span>
        </a>
    </li>
@endcan
<li>
    <a href="{{route('admin.judicialCommittee.nissaForm')}}">
        <i class="fa fa-user"></i>
        <span> निस्सा सनाखत </span>
    </a>
</li>
<li>
    <a href="{{route('admin.judicialCommittee.defendantContinuedTime')}}">
        <i class="fa fa-user"></i>
        <span>प्रतिवादी जारि म्याद  </span>
    </a>
</li>
<li>
    <a href="{{route('admin.judicialCommittee.stayDateForm')}}">
        <i class="fa fa-user"></i>
        <span>तारिख पर्चा  </span>
    </a>
</li>
<li>
    <a href="{{route('admin.judicialCommittee.stayDateCompensation')}}">
        <i class="fa fa-user"></i>
        <span>तारिख भरपाई</span>
    </a>
</li>
<li class="{{request()->is('admin/grant/setting/*') ? 'active' : ''}}">
    <a href="#sidebarGrantSetting"
       {{request()->is('admin/grant/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/judicialCommittee/setting/*') ? 'show' : ''}}"
         id="sidebarGrantSetting">
        <ul class="nav-second-level">
            @can('lawsuitNature_access')
                <li class="{{request()->is('admin/judicialCommittee/setting/lawsuitNature') ? 'active' : ''}}">
                    <a href="{{route('admin.judicialCommittee.lawsuitNature.index')}}">
                        <span>  मुद्दा प्रकृति </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>

