<li class="{{request()->is('admin/recommendation/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.recommendation.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('personalDetail_access')
    <li class="{{request()->is('admin/recommendation/setting/personalDetail') ? 'active' : ''}}">
        <a href="{{route('admin.recommendation.setting.personalDetail.index')}}">
            <i class="fa fa-user"></i>
            <span>व्यक्तिगत विवरण</span>
        </a>
    </li>
@endcan

@can('recommendationSetting_access')
    <li class="{{request()->is('admin/recommendation/recommendationCreate*') ? 'active' : ''}}">
        <a href="{{route('admin.recommendation.recommendationCreate.index')}}">
            <i class="fa fa-file"></i>
            <span>सिफारिस सिर्जना गर्नुहोस्</span>
        </a>
    </li>
@endcan



<li class="{{request()->is('admin/recommendation/setting*') ? 'active' : ''}}">
    <a href="#recommendationSetting"
       {{request()->is('admin/recommendation/setting*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सिफारिस आधारभूत सेटिंग</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div
        class="collapse {{request()->is('admin/recommendation/setting*') ? 'aria-expanded=true' : ''}}"
        id="recommendationSetting">
        <ul class="nav-second-level">

                <li class="{{request()->is('admin/recommendation/setting/revenueHeader*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.revenueHeader.index')}}">
                        <span>राजस्व</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/recommendation/setting/recommendationCategory*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.recommendationCategory.index')}}">
                        <span>सिफारिश वर्ग</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/recommendation/setting/recommendationDocument*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.recommendationDocument.index')}}">
                        <span>कागजात</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/recommendation/setting/recommendationDetail*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.recommendationDetail.index')}}">
                        <span>सिफारिस विवरण</span>
                    </a>
                </li>
                <li class="{{request()->is('admin/recommendation/setting/recommendationSignature*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.recommendationSignature.index')}}">
                        <span>हस्ताक्षर</span>
                    </a>
                </li>

                <li class="{{request()->is('admin/recommendation/setting/sipharisSetting*') ? 'active' : ''}}">
                    <a href="{{route('admin.recommendation.setting.recommendationSetting.index')}}">
                        <span>सिफारिस सेटिंग </span>
                    </a>
                </li>


        </ul>
    </div>
</li>


