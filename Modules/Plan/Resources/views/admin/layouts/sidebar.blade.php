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
        <i class="fa fa-clipboard-list"></i>
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
            <li class="{{request()->is('admin/plan/report/incomplete-projects') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.incomplete-projects')}}">
                    <span>सम्पन्न हुन बाकि योजनाहरुको रिपोर्ट </span>
                </a>
            </li>
            <li class="{{request()->is('admin/plan/report/price-range-report') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.price-range-report-page')}}">
                    <span>योजना छनौट रिपोर्ट</span>
                </a>
            </li>
            <li class="{{request()->is('admin/plan/report/work-detail-report') ? 'active' : ''}}">
                <a href="{{route('admin.plan.report.work-detail-report-page')}}">
                    <span>उ.स. र निर्माण व्यवसायीबाट भएको कार्य विवरण</span>
                </a>
            </li>
        </ul>
    </div>
</li>


