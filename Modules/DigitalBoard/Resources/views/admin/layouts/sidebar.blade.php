<li class="{{request()->is('admin/digitalBoard/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('digitalBoardVideo_access')
<li class="{{request()->is('admin/digitalBoard/video*') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.video.index')}}">
        <i class="fa fa-video"></i>
        <span> भिडियोहरु</span>
    </a>
</li>
@endcan
@can('digitalBoardNotice_access')
<li class="{{request()->is('admin/digitalBoard/Notice/notice*') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.notice.index','Notice')}}">
        <i class="fa fa-info-circle"></i>
        <span> सूचनाहरु </span>
    </a>
</li>
@endcan
@can('digitalBoardNews_access')
<li class="{{request()->is('admin/digitalBoard/News/notice*') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.notice.index','News')}}">
        <i class="fa fa-newspaper"></i>
        <span> समाचारहरु</span>
    </a>
</li>
@endcan
@can('employee_access')
<li class="{{request()->is('admin/digitalBoard/employee*') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.employee.index')}}">
        <i class="fa fa-users"></i>
        <span>जनप्रतिनिधि/कर्मचारीहरु</span>
    </a>
</li>
@endcan

