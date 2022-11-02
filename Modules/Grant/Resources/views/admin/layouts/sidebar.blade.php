<li class="{{request()->is('admin/grant/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.grant.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>
<li>
    <a href="{{route('admin.grant.grantDetail.create')}}">
        <i class="fa fa-file-contract"></i>
        <span>अनुदान विवरण</span>
    </a>
</li>
<li class="{{request()->is('admin/grant/report/*') ? 'active' : ''}}">
    <a href="#sidebarGrantReport"
       {{request()->is('admin/circular/report/*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-clipboard-list"></i>
        <span>रिपोर्ट</span>
        <span class="menu-arrow">
                        <i class="fa fa-angle-right"></i>
                    </span>
    </a>
    <div class="collapse {{request()->is('admin/grant/report/*') ? 'show' : ''}}"
         id="sidebarGrantReport">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/grant/report/registration') ? 'active' : ''}}">
                <a href="{{route('admin.circular.registration.report')}}">
                    <span> अनुदानको रिपोर्ट   </span>
                </a>
            </li>
            <li class="{{request()->is('admin/grant/report/dispatch') ? 'active' : ''}}">
                <a href="{{route('admin.circular.dispatch.report')}}">
                    <span> आवेदन दर्ता रिपोर्ट</span>
                </a>
            </li>
        </ul>
    </div>
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
            @can('infrastructure_access')
            <li class="{{request()->is('admin/grant/setting/infrastructure') ? 'active' : ''}}">
                <a href="{{route('admin.grant.infrastructure.index')}}">
                    <span>  पूर्वाधार शीर्षकहरु  </span>
                </a>
            </li>
            @endcan
            @can('thematicArea_access')
            <li class="{{request()->is('admin/grant/setting/thematicArea') ? 'active' : ''}}">
                <a href="{{route('admin.grant.thematicArea.index')}}">
                    <span>  विषयगत क्षेत्र  </span>
                </a>
            </li>
            @endcan
            @can('grantType_access')
            <li class="{{request()->is('admin/grant/setting/grantType') ? 'active' : ''}}">
                <a href="{{route('admin.grant.grantType.index')}}">
                    <span> अनुदान प्रकार  </span>
                </a>
            </li>
            @endcan
            @can('grantProgram_access')
            <li class="{{request()->is('admin/grant/setting/grantProgram') ? 'active' : ''}}">
                <a href="{{route('admin.grant.grantProgram.index')}}">
                    <span> अनुदान कार्यक्रम  </span>
                </a>
            </li>
            @endcan
            @can('grantActivity_access')
            <li class="{{request()->is('admin/grant/setting/grantActivity') ? 'active' : ''}}">
                <a href="{{route('admin.grant.grantActivity.index')}}">
                    <span> अनुदान क्रियाकलाप  </span>
                </a>
            </li>
            @endcan
        </ul>
    </div>
</li>

