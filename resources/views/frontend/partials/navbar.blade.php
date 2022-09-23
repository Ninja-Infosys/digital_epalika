<nav class="navbar navbar-expand-lg shadow">
    <div class="container">
        <button class="navbar-toggler" type="button" [class.collapsed]="classApplied" (click)="toggleClass()">
            <div class="hamburger-toggle">
                <mat-icon [svgIcon]="'icon_outline:menu'"></mat-icon>
            </div>
        </button>
        <div class="collapse navbar-collapse" [class.show]="classApplied">
            <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/')}}">
                        <i class="fa fa-home"></i>
                        गृहपृष्ठ
                    </a>
                </li>
                {{--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" >
                        परिचय
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{url('/static/representative')}}">हाम्रो बारेमा</a></li>
                        <li><a class="dropdown-item" href="{{url('/static/employee')}}">कर्मचारीहरु</a></li>
                    </ul>
                </li>--}}
{{--                    <a class="nav-link dropdown-toggle">--}}
{{--                        ग्यालेरि--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li><a class="dropdown-item" href="{{url('/static/gallery/photo')}}">फोटोहरु</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{url('/static/gallery/audio')}}">अडियोहरु</a></li>--}}
{{--                        <li><a class="dropdown-item" href="{{url('/static/gallery/video')}}">भिडियोहरु</a></li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/static/notice')}}">
                        सूचना
                    </a>
                </li>
              {{--  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/static/executive')}}">
                        कार्यपालिका न्युज
                    </a>
                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{url('e-map')}}">
                        इ-नक्सा
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('grievanceHandling.grievance')}}">
                        गुनासो
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('helpdesk.helpdesk')}}" >
                        नागरिक सहयोग
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('/static/contact')}}">
                        सम्पर्क
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
