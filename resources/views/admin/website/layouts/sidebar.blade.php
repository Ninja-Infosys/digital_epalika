<li>
    <a href="#websiteAdmin" data-bs-toggle="collapse">
        <i class="fa fa-globe"></i>
        <span>वेबसाइट सेटिङ</span>
        <span class="menu-arrow">
                            <i class="fas fa-angle-right"></i>
                        </span>
    </a>
    <div class="{{request()->is('admin/website/*') ?'':'collapse'}}" id="websiteAdmin">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/website/slider/*') ? 'active':''}}">
                <a href="{{route('admin.website.slider.index')}}">स्लाइडर</a>
            </li>
            <li class="{{request()->is('admin/website/municipalDetail/*') ? 'active':''}}">
                <a href="{{route('admin.website.municipalDetail.index')}}">पालिका बिबरण </a>
            </li>
            <li class="{{request()->is('admin/website/importantLink/*') ? 'active':''}}">
                <a href="{{route('admin.website.importantLink.index')}}">महत्त्वपूर्ण लिङ्क </a>
            </li>
        </ul>
    </div>
</li>
