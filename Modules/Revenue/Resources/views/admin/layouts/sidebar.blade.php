<li class="{{request()->is('admin/revenue/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.revenue.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>

<li class="{{request()->is('admin/revenue/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.revenue.taxPayer.index')}}">
        <i class="fa fa-user"></i>
        <span>करदाता</span>
    </a>
</li>

<li class="{{request()->routeIs('admin.revenue.setting.*') ? 'active' : ''}}">
    <a href="#sidebarRevenueSetting"
       {{request()->routeIs('admin.revenue.setting.*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>आधारभूत सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->routeIs('admin.revenue.setting.*') ? 'show' : ''}}"
         id="sidebarRevenueSetting">
        <ul class="nav-second-level">
            @can('revenueCategory_access')
                <li class="{{request()->routeIs('admin.revenue.setting.revenue-category.*') ? 'active' : ''}}">
                    <a href="{{route('admin.revenue.setting.revenue-category.index')}}">
                        <span>राजस्वको वर्ग</span>
                    </a>
                </li>
            @endcan
            @can('revenue_access')
                <li class="{{request()->routeIs('admin.revenue.setting.revenue.*') ? 'active' : ''}}">
                    <a href="{{route('admin.revenue.setting.revenue.index')}}">
                        <span>राजस्वको शिर्षक</span>
                    </a>
                </li>
            @endcan
            @can('taxPayerType_access')
                <li class="{{request()->routeIs('admin.revenue.setting.taxPayerType.*') ? 'active' : ''}}">
                    <a href="{{route('admin.revenue.setting.taxPayerType.index')}}">
                        <span>करदाताको प्रकार</span>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</li>

