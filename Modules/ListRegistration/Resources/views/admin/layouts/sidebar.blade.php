<li class="{{request()->is('admin/listregistration/dashboard') ? 'active' : ''}}">
    <a href="{{route('admin.listRegistrations.dashboard')}}">
        <i class="fa fa-home"></i>
        <span> ड्यासबोर्ड</span>
    </a>
</li>

<li class="{{request()->is('admin/listregistration/listRegistration*') ? 'active' : ''}}">
    <a href="{{route('admin.listRegistrations.listRegistration.index')}}">
        <i class="fa fa-file-contract"></i>
        <span>मौजुदा सुची दर्ता</span>
    </a>
</li>

<li class="{{request()->is('admin/listregistration/files*') ? 'active' : ''}}">
    <a href="#sidebarListFile"
       {{request()->is('admin/listregistration/files*') ? 'aria-expanded=true  ' : ''}}
       data-bs-toggle="collapse">
        <i class="fa fa-file-archive"></i>
        <span>फाईल व्यवस्थापन</span>
        <span class="menu-arrow">
            <i class="fa fa-angle-right"></i>
        </span>
    </a>
    <div class="collapse {{request()->is('admin/listregistration/files*') ? 'show' : ''}}"
         id="sidebarListFile">
        <ul class="nav-second-level">
            <li class="{{request()->is('admin/emap/files/application-file') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.application-file')}}">
                    <span> आवेदन फाईल</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/files/notice') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.notice')}}">
                    <span>सूचना फाईल</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/files/application-file') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.application')}}">
                    <span> निवेदन फाईल</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/files/application-file') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.darta')}}">
                    <span>दर्ता प्रमाण-पत्र</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/files/application-file') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.temporary')}}">
                    <span>स्थायी लेखा पत्र</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/files/application-file') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.taxclearance')}}">
                    <span> कर चुक्ता प्रमाण-पत्र</span>
                </a>
            </li>
            <li class="{{request()->is('admin/emap/files/application-file') ? 'active' : ''}}">
                <a href="{{route('admin.listRegistrations.files.permission')}}">
                    <span>इजाजत पत्र</span>
                </a>
            </li>
        </ul>
    </div>
</li>
