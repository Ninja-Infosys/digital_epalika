<div class="container-fluid g-0">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="sidebar_icon d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="serach_field-area">

                </div>
                <div class="header_right d-flex justify-content-between align-items-center">
                    <div class="header_notification_warp d-flex align-items-center">
                        <li>
                            <a href="#"> <img src="{{asset('assets/backend/emap/admin/img/icon/bell.svg')}}" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="#"> <img src="{{asset('assets/backend/emap/admin/img/icon/msg.svg')}}" alt=""> </a>
                        </li>
                    </div>
                    <div class="profile_info">
                        <img src="{{auth('organization')->user()->profile_photo_url ??''}}" alt="#">
                        <div class="profile_info_iner">
                            <p>{{auth('organization')->user()->email ??''}}</p>
                            <h5>{{auth('organization')->user()->name ??''}}</h5>
                            <div class="profile_info_details">
                                <a href="{{route('organization.admin.auth-organization.profile')}}">My Profile <i
                                        class="ti-user"></i></a>
                                <a href="#">Settings <i class="ti-settings"></i></a>
                                <form method="get" action="{{ route('organization.logout') }}">
                                    @csrf

                                    <a href="{{ route('organization.logout') }}">Log Out <i
                                            class="ti-shift-left"></i></a>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
