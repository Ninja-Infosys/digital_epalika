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
                        <mat-icon class="icon-size-4" [svgIcon]="'icon_solid:home'"></mat-icon>
                        गृहपृष्ठ
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                        परिचय
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" routerLink="/static/employees">कर्मचारीहरु</a></li>
                        <li><a class="dropdown-item" routerLink="/static/elected-official">जनप्रतिनिधिहरु</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)">
                        ग्यालेरि
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" routerLink="/static/photo">फोटोहरु</a></li>
                        <li><a class="dropdown-item" routerLink="/static/audio">अडियोहरु</a></li>
                        <li><a class="dropdown-item" routerLink="/static/video">भिडियोहरु</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" routerLink="/static/category" routerLinkActive="active">
                        श्रेणीहरु
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{url('e-map')}}">
                        इ-नक्सा
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('grievance')}}">
                        <mat-icon class="icon-size-4" [svgIcon]="'icon_solid:annotation'"></mat-icon>
                        गुनासो
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{url('digitalBoard/digitalboard')}}" >
                        नागरिक सहयोग
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" routerLink="/static/contact" routerLinkActive="active">
                        सम्पर्क
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
