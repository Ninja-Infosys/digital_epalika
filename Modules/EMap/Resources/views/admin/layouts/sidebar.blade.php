<li>
    <a href="#sidebarEMap" data-bs-toggle="collapse">
        <i class="fa fa-map"></i>
        <span>इ-नक्सा</span>
        <span class="menu-arrow">
            <i class="fas fa-angle-right"></i>
        </span>
    </a>
    <div class="{{request()->is('admin/map/*') ?'':'collapse'}}" id="sidebarEMap">
        <ul class="nav-second-level">
            <li class="{{request()->routeIs('emap.admin.organization.index') ? 'active' : ''}}">
                <a href="{{route('emap.admin.organization.index')}}">
                    <span>दर्ता भएका संगठन</span>
                </a>
            </li>
            <li>
                <a href="#sidebarEMapSetting" data-bs-toggle="collapse">
                    <span>सेटिङ</span>
                    <span class="menu-arrow">
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                <div class="collapse" id="sidebarEMapSetting">
                    <ul class="nav-second-level">
                        <li class="{{request()->routeIs('emap.admin.mapSetting.index') ? 'active' : ''}}">
                            <a href="{{route('emap.admin.mapSetting.index')}}">
                                <span> नक्शा सेटिङ </span>
                            </a>
                        </li>
                        <li class="{{request()->routeIs('emap.admin.mapFee.index') ? 'active' : ''}}">
                            <a href="{{route('emap.admin.mapFee.index')}}">
                                <span> नक्शा दस्तुर  </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>

