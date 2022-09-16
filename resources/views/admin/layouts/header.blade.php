<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">
            <li class="d-none d-lg-block">
                <form class="app-search">
                    <div class="app-search-box dropdown">
                        <div class="input-group">
                            <input
                                type="search"
                                class="form-control"
                                placeholder="Search..."
                                id="top-search"
                            />
                            <button class="btn input-group-text" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </li>

            <li class="dropdown d-inline-block d-lg-none">
                <a
                    class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                >
                    <i class="fa fa-search noti-icon"></i>
                </a>
                <div class="dropdown-menu dropdown-lg dropdown-menu-end p-0">
                    <form class="p-3">
                        <input
                            type="text"
                            class="form-control"
                            placeholder="Search ..."
                            aria-label="Recipient's username"
                        />
                    </form>
                </div>
            </li>

            <li class="dropdown d-none d-lg-inline-block">
                <a
                    class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                    data-toggle="fullscreen"
                    href="#"
                >
                    <i class="fa fa-expand-arrows-alt noti-icon"></i>
                </a>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a
                    class="nav-link dropdown-toggle waves-effect waves-light"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                >
                    <i class="fa fa-bell noti-icon"></i>
                    <span class="badge bg-danger rounded-circle noti-icon-badge"
                    >9</span
                    >
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                    <span class="float-end">
                      <a href="#" class="text-dark">
                        <small>Clear All</small>
                      </a> </span
                    >Notification
                        </h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>
                        <a
                            href="javascript:void(0);"
                            class="dropdown-item notify-item"
                        >
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">
                                Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a
                        href="javascript:void(0);"
                        class="dropdown-item text-center text-primary notify-item notify-all"
                    >
                        View all
                        <i class="fe-arrow-right"></i>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a
                    class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-haspopup="false"
                    aria-expanded="false"
                >
                    <img
                        src="{{auth()->user()->profile_photo_url}}"
                        alt="user-image"
                        class="rounded-circle"
                    />
                    <span class="pro-user-name ms-1">
                  {{auth()->user()->name}} <i class="fa fa-angle-down"></i>
                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-lock"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item notify-item">
                            <i class="fa fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </li>
        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="{{route('admin.dashboard')}}" class="logo logo-dark text-center">
              <span class="logo-sm">
                <img src="{{asset('assets/backend/images/logo-sm.png')}}" alt="" height="22"/>
                  <!-- <span class="logo-lg-text-light">UBold</span> -->
              </span>
                <span class="logo-lg">
                <img src="{{asset('assets/backend/images/logo-dark.png')}}" alt="" height="20"/>
                    <!-- <span class="logo-lg-text-light">U</span> -->
              </span>
            </a>

            <a href="{{route('admin.dashboard')}}" class="logo logo-light text-center">
              <span class="logo-sm">
                <img src="{{asset('assets/backend/images/logo-sm.png')}}" alt="" height="22"/>
              </span>
                <span class="logo-lg">
                <img src="{{asset('assets/backend/images/logo-light.png')}}" alt="" height="20"/>
              </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fa fa-bars"></i>
                </button>
            </li>

            <li>
                <!-- Mobile menu toggle (Horizontal Layout)-->
                <a
                    class="navbar-toggle nav-link"
                    data-bs-toggle="collapse"
                    data-bs-target="#topnav-menu-content"
                >
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </li>
        </ul>
        <div class="clearfix"></div>
    </div>
</div>
