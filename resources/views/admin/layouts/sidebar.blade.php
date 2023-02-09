<li class="{{request()->is('admin/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/tech') ? 'active' : ''}}">
    <a href="{{route('admin.tech')}}">
        <i class="fa fa-chalkboard-teacher"></i>
        <span> प्राविधिक मद्दत (सहयोग)</span>
    </a>
</li>
<li class="">
    <a href="{{asset('assets/backend/apk/mobile_app.apk')}}" download="{{asset('assets/backend/apk/mobile_app.apk')}}">
        <i class="fa fa-download"></i>
        <span> मोबाइल एप</span>
    </a>
</li>
