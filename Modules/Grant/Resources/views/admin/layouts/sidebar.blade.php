<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.grant.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li>
    <a href="#">
        <i class="fa fa-file-contract"></i>
        <span>अनुदान विवरण</span>
    </a>
</li>

<li class="{{request()->is('admin/grant/setting/*') ? 'active' : ''}}">
    <a href="#sidebarGrantSetting"
       {{request()->is('admin/grant/setting/*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/grant/setting/*') ? 'show' : ''}}"
         id="sidebarGrantSetting">
        <ul class="nav-second-level">
            @can('grantType_access')
                <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                    <a href="{{route('admin.grant.setting.grantType.index')}}">
                        <span> अनुदानको प्रकार </span>
                    </a>
                </li>
            @endcan
            @can('cooperativeType_access')


            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href="{{route('admin.grant.setting.cooperativeType.index')}}">
                    <span> सहकारीको प्रकार </span>
                </a>
            </li>
            @endcan
                @can('affiliation_access')
            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href="{{route('admin.grant.setting.affiliation.index')}}">
                    <span> सहकारीको आवध्ता </span>
                </a>
            </li>
                @endcan
            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href=#>
                    <span> उद्यमको प्रकार </span>
                </a>
            </li>
                @can('grantProgram_access')
            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href="{{route('admin.grant.setting.grantProgram.index')}}">
                    <span> कार्यक्रम बिषय </span>
                </a>
            </li>
                @endcan
            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href="#">
                    <span> अनुदान दिने सस्था </span>
                </a>
            </li>
        </ul>
    </div>
</li>

