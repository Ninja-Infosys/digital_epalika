<li class="{{request()->is('admin/plan/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.plan.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
@can('project_access')
    <li class="{{request()->is('admin/plan/project') ? 'active' : ''}}">
        <a href="{{route('admin.plan.project.index')}}">
            <i class="fa fa-list"></i>
            <span> योजना/कार्यक्रमहरु </span>
        </a>
    </li>
@endcan

<li class="{{request()->is('admin/plan/report*') ? 'active' : ''}}">
    <a href="#sidebarPlanReport"
       {{request()->is('admin/plan/report*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-file"></i>
        <span>रिपोर्ट</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/plan/report*') ? 'show' : ''}}"
         id="sidebarPlanReport">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/plan/report') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.index')}}">
                    <span>प्रतिवेदनहरु</span>
                </a>
            </li>
            <li class="{{request()->is('admin/plan/report/annual-progress-report') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.annual-progress-report')}}">
                    <span>वार्षिक प्रगति प्रतिवेदन</span>
                </a>
            </li>
            <li class="{{request()->is('admin/plan/report/consumer-committee-projects') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.consumer-committee-projects')}}">
                    <span>उ.स. अन्तर्गतका योजनाहरु</span>
                </a>
            </li>
            <li class="{{request()->is('admin/plan/report/contract-projects') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.contract-projects-page')}}">
                    <span>ठेक्का अन्तर्गतका योजनाहरु</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="{{request()->is('admin/plan/setting/*') ? 'active' : ''}}">
    <a href="#sidebarPlanSetting"
       {{request()->is('admin/plan/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>  आधारभूत सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/plan/setting/*') ? 'show' : ''}}"
         id="sidebarPlanSetting">
        <ul class="nav-second-level">
            @can('planArea_access')
                <li class="{{request()->is('admin/plan/setting/planArea') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.planArea.index','planAreaCategory')}}">
                        <span>  योजना क्षेत्र  </span>
                    </a>
                </li>
            @endcan
            @can('planArea_access')
                <li class="{{request()->is('admin/plan/setting/planArea') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.planArea.index','planAreaSubCategory')}}">
                        <span>  योजना उप-क्षेत्र  </span>
                    </a>
                </li>
            @endcan
            @can('planLevel_access')
                <li class="{{request()->is('admin/plan/setting/planLevel') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.planLevel.index','planLevel')}}">
                        <span> योजना स्तरहरु </span>
                    </a>
                </li>
            @endcan
            @can('planLevel_access')
                <li class="{{request()->is('admin/plan/setting/planLevel') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.planLevel.index','planSubLevel')}}">
                        <span> योजना उप-स्तरहरु </span>
                    </a>
                </li>
            @endcan
            @can('budgetHead_access')
                <li class="{{request()->is('admin/plan/setting/budgetHead') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.budgetHead.index','budgetHead')}}">
                        <span> बजेट शिर्षक </span>
                    </a>
                </li>
            @endcan
            @can('budgetHead_access')
                <li class="{{request()->is('admin/plan/setting/budgetHead') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.budgetHead.index','budgetSubHead')}}">
                        <span> बजेट उप-शिर्षक </span>
                    </a>
                </li>
            @endcan
            @can('budgetSource_access')
                <li class="{{request()->is('admin/plan/setting/budgetSource') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.budgetSource.index')}}">
                        <span> बजेट श्रोत </span>
                    </a>
                </li>
            @endcan


            @can('planTemplate_access')
                <li class="{{request()->is('admin/plan/setting/expenseHead') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.expenseHead.index')}}">
                        <span> खर्च शीर्षक </span>
                    </a>
                </li>
            @endcan

            @can('planTemplate_access')
                <li class="{{request()->is('admin/plan/setting/grantCategory') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.grantCategory.index')}}">
                        <span> अनुदान प्रकार </span>
                    </a>
                </li>
            @endcan
                @can('planTemplate_access')
                    <li class="{{request()->is('admin/plan/setting/planTemplate') ? 'active' : ''}}">
                        <a href="{{route('admin.plan.planTemplate.index')}}">
                            <span> टेम्प्लेट </span>
                        </a>
                    </li>
                @endcan

        </ul>
    </div>
</li>

