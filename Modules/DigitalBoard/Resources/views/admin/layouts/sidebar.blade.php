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
        <i class="fa fa-paperclip"></i>
        <span> सूचना </span>
    </a>
</li>
@endcan
@can('digitalBoardNews_access')
<li class="{{request()->is('admin/digitalBoard/News/notice*') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.notice.index','News')}}">
        <i class="fa fa-newspaper"></i>
        <span> समाचार</span>
    </a>
</li>
@endcan
@can('employee_access')
<li class="{{request()->is('admin/digitalBoard/employee*') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.employee.index')}}">
        <i class="fa fa-user"></i>
        <span> कर्मचारीहरु</span>
    </a>
</li>
@endcan
<li class="{{request()->is('admin/digitalBoard/files/*') ? 'active' : ''}}">
    <a href="#sidebarDigitalBoardFile"
       {{request()->is('admin/digitalBoard/files/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-file-archive"></i>
        <span>फाईल व्यवस्थापन</span>
        <span class="menu-arrow">
            <i class="fa fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/digitalBoard/files/*') ? 'show' : ''}}"
         id="sidebarDigitalBoardFile">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/digitalBoard/files/notice-file') ? 'active' : ''}}">
                <a href="{{route('admin.digitalBoard.files.notice-file')}}">
                    <span>सूचना फाईल</span>
                </a>
            </li>
            <li class="{{request()->is('admin/digitalBoard/files/news-file') ? 'active' : ''}}">
                <a href="{{route('admin.digitalBoard.files.news-file')}}">
                    <span> समाचार फाईल</span>
                </a>
            </li>
        </ul>
    </div>
</li>


