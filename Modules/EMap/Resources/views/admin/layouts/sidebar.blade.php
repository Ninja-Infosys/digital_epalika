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
            <li class="{{request()->routeIs('emap.admin.setting.index') ? 'active' : ''}}">
                <a href="{{route('emap.admin.setting.index')}}">
                    <span>सेटिंग</span>
                </a>
            </li>
        </ul>
    </div>
</li>

