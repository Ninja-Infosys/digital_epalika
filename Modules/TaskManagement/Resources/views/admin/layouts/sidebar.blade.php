<li class="{{request()->is('admin/taskmanagement/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('taskActivity_access')
    <li class="{{request()->RouteIs('admin.taskManagement.activity.*') ? 'active' : ''}}">
        <a href="{{route('admin.taskManagement.activity.index')}}">
            <i class="fa fa-tasks"></i>
            <span>क्रियाकलाप</span>
        </a>
    </li>
@endcan
@can('allTaskActivity_access')
    <li class="{{request()->RouteIs('admin.taskManagement.allActivity.*') ? 'active' : ''}}">
        <a href="{{route('admin.taskManagement.allActivity.index')}}">
            <i class="fa fa-tasks"></i>
            <span>सबै क्रियाकलाप</span>
        </a>
    </li>
@endcan

<li class="{{request()->is('admin/taskmanagement/report') ? 'active' : ''}}">
    <a href="{{route('admin.taskManagement.report.index')}}">
        <i class="fa fa-clipboard-list"></i>
        <span> रिपोर्ट</span>
    </a>
</li>
