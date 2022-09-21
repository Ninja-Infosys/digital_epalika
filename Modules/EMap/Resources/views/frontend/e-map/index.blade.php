@extends('frontend.layouts.master')
@section('content')
<section class="latest-news">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <h4>हालसालै प्रकसित भयका सूचनाहरु</h4>
                <p>तल दिएको सूचना पढनुहोस् र आफुले चाहेको सूचना डाउनलोड गर्नुहोस्। </p>
                <div class="shadow">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>क्र.स.</th>
                            <th>सूचना शीर्षक</th>
                            <th>प्रकाशित मिति</th>
                            <th>फाईल</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>१</th>
                            <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                            <td>२०७९/०२/११</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button mat-icon-button>
                                        <mat-icon>remove_red_eye</mat-icon>
                                    </button>
                                    <button mat-icon-button>
                                        <mat-icon>download</mat-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>२</th>
                            <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                            <td>२०७९/०२/११</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button mat-icon-button>
                                        <mat-icon>remove_red_eye</mat-icon>
                                    </button>
                                    <button mat-icon-button>
                                        <mat-icon>download</mat-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>३</th>
                            <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                            <td>२०७९/०२/११</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button mat-icon-button>
                                        <mat-icon>remove_red_eye</mat-icon>
                                    </button>
                                    <button mat-icon-button>
                                        <mat-icon>download</mat-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>४</th>
                            <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                            <td>२०७९/०२/११</td>
                            <td>
                                <div class="d-flex justify-content-evenly">
                                    <button mat-icon-button>
                                        <mat-icon>remove_red_eye</mat-icon>
                                    </button>
                                    <button mat-icon-button>
                                        <mat-icon>download</mat-icon>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <div class="card bg-primary text-light text-center">
                            <div class="card-body">
                                <mat-icon [svgIcon]="'icon_solid:document-text'"></mat-icon>
                                <h5 class="fw-semibold mt-2">सूचना</h5>
                                <p>नयाँ सूचनाहरु हेर्नुहोस ।</p>
                                <a href="{{url('notice')}}"class="btn btn-light" ><span>
                 सूचनाहरु
                </span>
                                    <mat-icon [svgIcon]="'mat_outline:double_arrow'"></mat-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <div class="card bg-success text-light text-center">
                            <div class="card-body">
                                <mat-icon [svgIcon]="'icon_solid:map'"></mat-icon>
                                <h5 class="fw-semibold mt-2">इ-नक्सा</h5>
                                <p>नयाँ इ-नक्साको लागि दर्ता गर्नुहोस् ।</p>
                                <a href="{{url('register')}}" class="btn btn-light" [routerLink]="['register-form']"><span>
                  नयाँ दर्ता गर्नुहोस्
                </span>
                                    <mat-icon [svgIcon]="'mat_outline:double_arrow'"></mat-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <div class="card bg-danger text-light text-center">
                            <div class="card-body">
                                <mat-icon [svgIcon]="'icon_solid:document-download'"></mat-icon>
                                <h5 class="fw-semibold mt-2">डाउनलोड</h5>
                                <p>नक्सा समन्धी कागजा ।</p>
                                <a href="{{url('downloads')}}" class="btn btn-light"><span>
                  डाउनलोडहरु
                </span>
                                    <mat-icon [svgIcon]="'mat_outline:double_arrow'"></mat-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <div class="card bg-warning text-light text-center">
                            <div class="card-body">
                                <mat-icon [svgIcon]="'icon_solid:information-circle'"></mat-icon>
                                <h5 class="fw-semibold mt-2">सहयोग</h5>
                                <p>सहयोगको लागि ।</p>
                                <a href="{{url('e-help')}}" class="btn btn-light" [routerLink]="['help']"><span>
                  सहयोग
                </span>
                                    <mat-icon [svgIcon]="'mat_outline:double_arrow'"></mat-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <div class="card bg-info text-light text-center">
                            <div class="card-body">
                                <mat-icon [svgIcon]="'icon_solid:presentation-chart-line'"></mat-icon>
                                <h5 class="fw-semibold mt-2">आवेदन ट्रयाक</h5>
                                <p>तपाइँको आवेदन कुन चरणमा छ?</p>
                                <a href="{{url('track')}}" class="btn btn-light" [routerLink]="['application-track']"><span>
                  आवेदन ट्रयाक
                </span>
                                    <mat-icon [svgIcon]="'mat_outline:double_arrow'"></mat-icon>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/e-map/index.css')}}">
@endpush
@endsection
