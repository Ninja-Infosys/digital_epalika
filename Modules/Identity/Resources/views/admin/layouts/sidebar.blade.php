<li class="{{request()->is('admin/identity/dashboard') ? 'active' : ''}}">
    <a href="{{route('identity.admin.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>

<li class="{{request()->is('admin/identity/disability*') ? 'active' : ''}}">
    <a href="#sidebarDisabilityIdentityCard"
       {{request()->is('admin/identity/disability*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>अनलाइन फारम</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/identity/disability*') ? 'show' : ''}}"
         id="sidebarDisabilityIdentityCard">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/identity/disability/disabilityIdentityCard') ? 'active' : ''}}">
                <a href="{{route('identity.admin.disabilityIdentityCard.index')}}">
                    <span> अपाङ्गता परिचय पत्र</span>
                </a>
            </li>
        </ul>
    </div>
</li>

<li class="{{request()->is('admin/identity/setting*') ? 'active' : ''}}">
    <a href="#sidebarIdentitySetting"
       {{request()->is('admin/identity/setting*') ? 'aria-expanded=true' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-cogs"></i>
        <span>सेटिङ</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/identity/setting*') ? 'show' : ''}}"
         id="sidebarIdentitySetting">
        <ul class="nav-second-level">
            @can('relationship_access')
                <li class="{{request()->is('admin/identity/setting/relationship') ? 'active' : ''}}">
                    <a href="{{route('identity.admin.setting.relationship.index')}}">
                        <span> नाता</span>
                    </a>
                </li>
            @endcan
            @can('disabilityReason_access')
                <li class="{{request()->is('admin/identity/setting/disabilityReason') ? 'active' : ''}}">
                    <a href="{{route('identity.admin.setting.disabilityReason.index')}}">
                        <span> अपांगताको कारण</span>
                    </a>
                </li>
            @endcan
            @can('disabilityType_access')
                <li class="{{request()->is('admin/identity/setting/disabilityType') ? 'active' : ''}}">
                    <a href="{{route('identity.admin.setting.disabilityType.index')}}">
                        <span> अपांगताको प्रकार</span>
                    </a>
                </li>
            @endcan
            @can('cardColor_access')
                <li class="{{request()->is('admin/identity/setting/cardColor') ? 'active' : ''}}">
                    <a href="{{route('identity.admin.setting.cardColor.index')}}">
                        <span>कोड रङ</span>
                    </a>
                </li>
            @endcan

            @can('governmentalDisabilityType_access')
                <li class="{{request()->is('admin/identity/setting/governmentalDisabilityType') ? 'active' : ''}}">
                    <a href="{{route('identity.admin.setting.governmentalDisabilityType.index')}}">
                        <span>सरकारी असक्षमता प्रकार</span>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</li>

