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
                <h4 class="nav-link dropdown-toggle arrow-none waves-effect waves-light">आर्थिक वर्ष: {{$officeSetting->fiscalYear->title??''}}</h4>
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
                    <i class="fa fa-bell noti-icon" @class([
            'ring-bell'=>count(auth()->user()->unreadNotifications)>0])></i>
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
                      <a href="#" class="text-dark">
                        <small>Clear All</small>
                      </a> </span>Notification</h5>
                    </div>

                    <div class="noti-scroll" data-simplebar>
                        @forelse (auth()->user()->unreadNotifications as $notification)
                        <a
                            href="#"
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
                        @endforelse
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);"
                        class="dropdown-item text-center text-primary notify-item notify-all">
                        View all
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
        <div class="logo-box dropdown notification-list topbar-dropdown">
            <a class="logo logo-light text-center nav-link dropdown-toggle waves-effect waves-light"
               data-bs-toggle="dropdown"
               href="#"
               role="button"
               aria-haspopup="false"
               aria-expanded="false"
            >
              <span class="logo-sm">
                <img src="{{asset('assets/backend/images/logo-sm.png')}}" alt="" height="40"/>
              </span>
                <span class="logo-lg">
                <img src="{{asset('assets/backend/images/logo.png')}}" alt="" height="40"/>
              </span>
            </a>
            <div class="dropdown-menu dropdown-xl d-arrow m-2 border-primary">
                <div class="row m-2">
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/darta-chalani-parnali.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">दर्ता चलानी</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                <img src="{{asset('assets/backend/images/modules/nagarik-wodapatra.png')}}"
                                     height="50" width="50">
                                <h4 class="p-1">नागरिक वडापत्र</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/help-desk.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">हेल्प डेस्क</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                <img src="{{asset('assets/backend/images/modules/e-naksa.png')}}"
                                     height="50" width="50">
                                <h4 class="p-1">इ-नक्सा</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                <img src="{{asset('assets/backend/images/modules/bewasaya-darta.png')}}"
                                     height="50" width="50">
                                <h4 class="p-1">व्यवसाय दर्ता</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/e-gunaso.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">ई-गुनासो</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/e-karypalika.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">ई-कार्यपालिका</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/sifarish-parnali.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">शिफारिस</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/suchi-darta-parnali.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">सुची दर्ता</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                <img src="{{asset('assets/backend/images/modules/paryogkarta-bhumika.png')}}"
                                     height="50" width="50">
                                <h4 class="p-1">प्रयोगकर्ता र भूमिका</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                <img src="{{asset('assets/backend/images/modules/setting.png')}}"
                                     height="50" width="50">
                                <h4 class="p-1">सेटिङ</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-4 border">
                        <a href="#">
                            <div class="p-2 text-center">
                                      <img src="{{asset('assets/backend/images/modules/website-setting.png')}}"
                                      height="50" width="50">
                                <h4 class="p-1">वेबसाइट सेटिङ</h4>
                            </div>
                        </a>
                    </div>
                </div>

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
