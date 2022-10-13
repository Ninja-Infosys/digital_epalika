<li>
    <a href="{{route('admin.digitalBoard.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->routeIs('admin.digitalBoard.video.index') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.video.index')}}">
        <i class="fa fa-video"></i>
        <span> भिडियोहरु</span>
    </a>
</li>
<li class="{{request()->routeIs('admin.digitalBoard.notice.index','Notice') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.notice.index','Notice')}}">
        <i class="fa fa-paperclip"></i>
        <span> सूचना </span>
    </a>
</li>
<li class="{{request()->routeIs('admin.digitalBoard.notice.index','News') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.notice.index','News')}}">
        <i class="fa fa-newspaper"></i>
        <span> समाचार</span>
    </a>
</li>
<li class="{{request()->routeIs('admin.digitalBoard.employee.index') ? 'active' : ''}}">
    <a href="{{route('admin.digitalBoard.employee.index')}}">
        <i class="fa fa-user"></i>
        <span> कर्मचारीहरु</span>
    </a>
</li>



