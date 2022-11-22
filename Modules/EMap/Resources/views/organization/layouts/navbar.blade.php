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
                        <li class="dropdown notification-list topbar-dropdown">
                            <a class=""
                               href="#"
                               role="button"
                               id="dropdownMenuLink"
                               data-bs-toggle="dropdown"
                               aria-expanded="false"
                            >

                                <i @class([
            'ring-bell'=>count(auth('organization')->user()->unreadNotifications)>0,
            'fa', 'fa-bell', 'noti-icon','fs-2', 'px-2'
            ])></i>
                                <span class="badge bg-danger {{count(auth('organization')->user()->unreadNotifications)>0 ? 'd-block':'d-none'}} rounded-circle noti-icon-badge">
                                        {{count(auth('organization')->user()->unreadNotifications)}}
                                    </span>

                            </a>
                            <div class="dropdown-menu p-3" aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-item d-flex justify-content-around">
                                    <p class="m-0 text-dark px-5">नोटिफिकेसन</p>
                                    <a href="{{route('organization.admin.notification.readAllNotification')}}">
                                        <p class="text-danger">सबै खाली गर्नुहोस्</p>
                                    </a>
                                </div>
                                <hr class="p-0 m-0">
                                <ul data-bs-spy="scroll" class="scrollspy-example p-0 m-0">
                                    @forelse(auth('organization')->user()->unreadNotifications as $notification)
                                    <li>
                                        <a href="{{route('organization.admin.notification',$notification)}}" id="scrollspyHeading2">
                                            <p class="text-dark">
                                                {{class_basename($notification->type)}}
                                                <i class="fa fa-bell"></i>
                                                <br/>
                                                <small class="text-muted">{{$notification->created_at->diffForHumans()}}</small>
                                            </p>
                                        </a>
                                    </li>
                                    @empty
                                        <li class="text-center p-1">कुनै डाटा उपलब्ध छैन <i
                                                class="fa fa-exclamation ring-bell noti-icon text-danger px-2"></i></li>
                                    @endforelse

                                </ul>
                            </div>
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
