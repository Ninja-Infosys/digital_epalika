<nav class="sidebar">
    <div class="logo d-flex justify-content-between">
        <a href="#"><img src="{{asset('assets/backend/emap/admin/img/logo.png')}}" alt=""></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">

        <li class="mm-active">
            <a href="#">

                <img src="{{asset('assets/backend/emap/dmin/img/menu-icon/1.svg')}}" alt="">
                <span>Dashboard</span>
            </a>

        </li>
        
        <li class="mm-active">
            <a href="#">

                <img src="..." alt="">
                <span>Client</span>
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