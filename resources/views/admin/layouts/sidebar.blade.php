<li class="{{request()->is('admin/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/tech') ? 'active' : ''}}">
    <a href="{{route('admin.tech')}}">
        <i class="fa fa-chalkboard-teacher"></i>
        <span> प्राविधिक मद्दत</span>
    </a>
</li>
