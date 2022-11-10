<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="#"><img src="{{asset('images/np.png')}}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">

        <li class="{{Route::is('organization.admin.dashboard')?'mm-active':''}}">
            <a href="{{route('organization.admin.dashboard')}}">

                <img src="{{asset('assets/backend/emap/admin/img/menu-icon/1.svg')}}" alt="">
                <span>ड्यासबोर्ड</span>
            </a>

        </li>
        @if(auth('organization')->user()->is_organization==1)
        <li class="{{Route::is('organization.admin.clients.taxClearance.*') ? 'mm-active':''}}">
            <a href="{{route('organization.admin.clients.taxClearance.index')}}">
                <img src="{{asset('assets/backend/emap/admin/img/menu-icon/6.svg')}}" alt="">
                <span>कर चुक्ता</span>
            </a>
        </li>
        @endif

        <li class="{{Route::is('organization.admin.mapApply.*')?'mm-active':''}}">
            <a href="{{route('organization.admin.mapApply.index')}}">

                <img src="{{asset('assets/backend/emap/admin/img/menu-icon/6.svg')}}" alt="">
                <span>नक्सा</span>
            </a>

        </li>
    </ul>
</nav>
