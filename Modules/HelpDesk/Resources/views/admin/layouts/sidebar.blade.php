<li>
    <a href="{{route('admin.helpDesk.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->routeIs('admin.helpDesk.branch.index') ? 'active' : ''}}">
    <a href="{{route('admin.helpDesk.branch.index')}}">
        <i class="fa fa-code-branch"></i>
        <span> शाखा </span>
    </a>
</li>
<li class="{{request()->routeIs('admin.helpDesk.service.index') ? 'active' : ''}}">
    <a href="{{route('admin.helpDesk.service.index')}}">
        <i class="fa fa-scroll"></i>
        <span> सेवाहरु </span>
    </a>
</li>
