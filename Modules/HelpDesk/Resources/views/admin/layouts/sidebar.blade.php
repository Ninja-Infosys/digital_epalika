<li class="{{request()->is('admin/helpDesk/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.helpDesk.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('service_access')
<li class="{{request()->is('admin/helpDesk/service*') ? 'active' : ''}}">
    <a href="{{route('admin.helpDesk.service.index')}}">
        <i class="fa fa-scroll"></i>
        <span> सेवाहरु</span>
    </a>
</li>
@endcan
