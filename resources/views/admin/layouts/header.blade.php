<div class="navbar-custom">
    <div class="container-fluid">
        <ul class="list-unstyled topnav-menu float-end mb-0">
            <li class="dropdown d-none d-lg-inline-block">
                <h5 class="mt-2">
                    <iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0"
                            allowtransparency="true"
                            src="https://www.ashesh.com.np/linknepali-time.php?dwn=only&font_color=fff&font_size=18&bikram_sambat=0&api=2511x6m072"
                            width="220" height="50"></iframe>
                </h5>
            </li>
            <li class="dropdown d-none d-lg-inline-block">
                <h4 class="nav-link dropdown-toggle arrow-none waves-effect waves-light">आर्थिक
                    वर्ष: {{$officeSetting->fiscalYear->title??''}}</h4>
            </li>
            <li class="dropdown d-inline-block d-lg-none">
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                   data-bs-toggle="dropdown"
                   href="#"
                   role="button"
                   aria-haspopup="false"
                   aria-expanded="false">
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
                <a class="nav-link dropdown-toggle arrow-none waves-effect waves-light"
                   data-toggle="fullscreen"
                   href="#">
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
                    aria-expanded="false">
                    <i @class([
            'ring-bell'=>count(auth()->user()->unreadNotifications)>0,
            'fa', 'fa-bell', 'noti-icon'
            ])></i>
                    @if(count(auth()->user()->unreadNotifications)>0)
                        <span class="badge bg-danger rounded-circle noti-icon-badge">
                        {{count(auth()->user()->unreadNotifications)}}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-lg">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="m-0">
                            <span class="float-end">
                      <a href="{{route('admin.notification.readAllNotification')}}" class="text-dark">
                        <small>सबै खाली गर्नुहोस्</small>
                      </a> </span>नोटिफिकेसन</h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>
                        @forelse (auth()->user()->unreadNotifications as $notification)
                            <a
                                href="{{ route('admin.notification.read',$notification) }}"
                                class="dropdown-item notify-item"
                            >
                                <div class="notify-icon bg-secondary">
                                    <i class="fa fa-heart"></i>
                                </div>
                                <p class="notify-details">
                                    {{class_basename($notification->type)}}

                                    <small class="text-muted">{{$notification->created_at->diffForHumans()}}</small>
                                </p>
                            </a>
                        @empty
                            <h4 class="text-center">कुनै डाटा उपलब्ध छैन !</h4>
                        @endforelse
                    </div>

                    <!-- All-->
                    <a href="{{route('admin.notification')}}"
                       class="dropdown-item text-center text-primary notify-item notify-all">
                        सबै हेर्नुहोस्
                        <i class="fe-arrow-right"></i>
                    </a>
                </div>
            </li>

            <li class="dropdown notification-list topbar-dropdown">
                <a class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
                   data-bs-toggle="dropdown"
                   href="#"
                   role="button"
                   aria-haspopup="false"
                   aria-expanded="false">
                    <img src="{{auth()->user()->profile_photo_url ?? ''}}"
                         alt="user-image"
                         class="rounded-circle"/>
                    <span class="pro-user-name ms-1">
                  {{auth()->user()->name ?? ''}} <i class="fa fa-angle-down"></i>
                </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end profile-dropdown">

                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-user"></i>
                        <span>My Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fa fa-cog"></i>
                        <span>Settings</span>
                    </a>

                    <a href="{{route('admin.activityLog.index')}}" class="dropdown-item notify-item">
                        <i class="fa fa-tasks"></i>
                        <span>गतिविधिहरू</span>
                    </a>

                    <!-- item-->
                    <a href="{{route('admin.lock-screen')}}" class="dropdown-item notify-item">
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
        <div class="logo-box dropdown notification-list topbar-dropdown">
            <a class="logo logo-light text-center nav-link dropdown-toggle waves-effect waves-light"
               data-bs-toggle="dropdown"
               href="#"
               role="button"
               aria-haspopup="false"
               aria-expanded="false">
              <span class="logo-sm">
                <img src="{{asset('assets/backend/images/logo-sm.png')}}" alt="" height="40"/>
              </span>
                <span class="logo-lg">
                <img src="{{asset('assets/backend/images/logo.png')}}" alt="" height="40"/>
              </span>
            </a>
            <div class="dropdown-menu dropdown-xl d-arrow m-2 border-primary">
                @includeIf('admin.layouts.menu_list')

            </div>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="fa fa-bars"></i>
                </button>
            </li>
            <li class="dropdown d-none d-lg-inline-block">
                <h3 class="text-light fw-bold mt-3">
                    {{$officeSetting->localBody->local_body ?? ''}}
                </h3>
            </li>
            <li>
                <a class="navbar-toggle nav-link"
                   data-bs-toggle="collapse"
                   data-bs-target="#topnav-menu-content">
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
