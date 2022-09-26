<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="#"><img src="{{asset('assets/backend/emap/admin/img/logo.png')}}" alt=""></a>
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

        <li class="{{Route::is('organization.admin.clients.client.*')?'mm-active':''}}">
            <a href="{{route('organization.admin.clients.client.index')}}">

                <img src="{{asset('assets/backend/emap/admin/img/menu-icon/6.svg')}}" alt="">
                <span>सेवाग्राही</span>
            </a>

        </li>

        <li class="">
            <a class="has-arrow" href="#" aria-expanded="false">
                <img src="{{asset('assets/backend/emap/admin/img/menu-icon/2.svg')}}" alt="">
                <span>Pages</span>
            </a>
            <ul>
                <li><a href="/login">Login</a></li>
                <li><a href="resister.html">Register</a></li>
                <li><a href="forgot_pass.html">Forgot Password</a></li>
            </ul>
        </li>

    </ul>
</nav>
