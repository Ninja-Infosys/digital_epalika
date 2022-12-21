<li class="{{request()->is('admin/website/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.website.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('slider_access')
<li class="{{request()->is('admin/website/slider/*') ? 'active' : ''}}">
    <a href="{{route('admin.website.slider.index')}}">
        <i class="fa fa-file-image"></i>
        <span>स्लाइडर</span>
    </a>
</li>
@endcan
@can('municipalDetail_access')
<li class="{{request()->is('admin/website/municipalDetail/*') ? 'active' : ''}}">
    <a href="{{route('admin.website.municipalDetail.index')}}">
        <i class="fa fa-file"></i>
        <span>पालिका बिबरण </span>
    </a>
</li>
@endcan
@can('importantLink_access')
<li class="{{request()->is('admin/website/importantLink/*') ? 'active' : ''}}">
    <a href="{{route('admin.website.importantLink.index')}}">
        <i class="fa fa-link"></i>
       <span>महत्त्वपूर्ण लिङ्क</span>
    </a>
</li>
@endcan
