<li class="{{request()->is('admin/recommendation/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.recommendation.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/recommendation/application*') ? 'active' : ''}}">
    <a href="{{route('admin.recommendation.recommendation.list')}}">
        <i class="fa fa-thumbs-up"></i>
        <span>सिफारिस</span>
    </a>
</li>

<li class="{{request()->is('admin/setting*') ? 'active' : ''}}">
    <a href="#setting"
       {{request()->is('admin/setting*') || request()->is('admin/setting*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cog"></i>
        <span>आधारभूत सेटिंग</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div
        class="collapse {{request()->is('admin/setting*') || request()->is('admin/setting*') ? 'show' : ''}}"
        id="setting">
        <ul class="nav-second-level">

            <li class="{{request()->is('admin/recommendation/setting/recommendationCategory*') ? 'active' : ''}}">
                <a href="{{route('admin.recommendation.setting.recommendationCategory.index','recommendationCategory')}}">
                    <span>सिफारिस</span>
                </a>
            </li>

            <li class="{{request()->is('admin/recommendation/setting/recommendationCategory*') ? 'active' : ''}}">
                <a href="{{route('admin.recommendation.setting.recommendationCategory.index','recommendationSubCategory')}}">
                    <span>सिफारिस उप श्रेणी</span>
                </a>
            </li>
                <li class="{{request()->is('admin/recommendation/application*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.showApplicationList')}}">
                        <span>निवेदन फारम सेटिंग</span>
                    </a>
                </li>

        </ul>
    </div>
</li>


