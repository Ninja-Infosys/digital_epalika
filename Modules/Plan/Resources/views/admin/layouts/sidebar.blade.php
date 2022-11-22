<li class="{{request()->is('admin/plan/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.plan.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li class="{{request()->is('admin/plan/report/*') ? 'active' : ''}}">
    <a href="#sidebarPlanReport"
       {{request()->is('admin/plan/report/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-clipboard-list"></i>
        <span>रिपोर्ट</span>
        <span class="menu-arrow">
            <i class="fa fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/plan/report/*') ? 'show' : ''}}"
         id="sidebarPlanReport">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/grant/report/registration') ? 'active' : ''}}">
                <a href="{{route('admin.circular.registration.report')}}">
                    <span> मूल्य दायरा अनुसार रिपोर्ट  </span>
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
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/plan/setting/*') ? 'show' : ''}}"
         id="sidebarPlanSetting">
        <ul class="nav-second-level">
            @can('planArea_access')
                <li class="{{request()->is('admin/plan/setting/planArea') ? 'active' : ''}}">
                    <a href="{{route('admin.plan.planArea.index')}}">
                        <span>  योजना क्षेत्र/उप-क्षेत्र  </span>
                    </a>
                </li>
            @endcan
        </ul>
    </div>
</li>

