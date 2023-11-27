@extends('admin.layouts.master')
@section('content')
<div class="row mt-2">
    <div class="col-12">
        <div class="card widget-inline">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6 col-xl-3 border-end">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-sm bg-blue rounded-circle">
                                <i class="fas fa-video avatar-title font-18 text-white"></i>
                            </div>
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$total_registrations ?? 0}}</span></h3>
                            <p class="text-muted font-15 mb-0">जम्मा दर्ता पत्रहरु</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 border-end">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-sm bg-blue rounded-circle">
                                <i class="fas fa-newspaper avatar-title font-18 text-white"></i>
                            </div>
                            <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$total_dispatches ?? 0}}</span></h3>
                            <p class="text-muted font-15 mb-0 text-truncate">जम्मा चलानी पत्रहरु</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3 border-end">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-sm bg-blue rounded-circle">
                                <i class="fas fa-info-circle avatar-title font-18 text-white"></i>
                            </div>
                            <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$monthly_registrations ?? 0}}</span></h3>
                            <p class="text-muted font-15 mb-0">मासिक दर्ता पत्रहरु</p>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div class="d-flex flex-column align-items-center">
                            <div class="avatar-sm bg-blue rounded-circle">
                                <i class="fas fa-users avatar-title font-18 text-white"></i>
                            </div>
                            <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$monthly_dispatches ?? 0}}</span></h3>
                            <p class="text-muted font-15 mb-0">मासिक चलानी पत्रहरु</p>
                        </div>
                    </div>

                </div> <!-- end row -->

            </div>

        </div> <!-- end card-->
    </div> <!-- end col-->
</div>
{{--
 <div class="row mt-2" id="charts" data-chart-url="route('admin.circular.dashboard') }}">
<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div id="fyRegistrationAndDispatch" chart-type="column" chart-title="आर्थिक वर्ष अनुसार दर्ता र चलानी"></div>
            <div class="loading">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col -->

<div class="col-lg-6">
    <div class="card">
        <div class="card-body">
            <div id="totalMonthRegistrationAndDispatch" chart-type="column" chart-title="महिना अनुसार दर्ता र चलानी"></div>
            <div class="loading">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status"></div>
                </div>
            </div>
        </div> <!-- end card-body-->
    </div> <!-- end card-->
</div> <!-- end col -->
</div>
--}}

<div class="row mt-2">
    <div class="col-md-6">
        <div class="card">
            <h4>
                आर्थिक वर्ष अनुसार दर्ता र चलानी
            </h4>
            <div class="card-body">
                <canvas id="barChart1"></canvas>
            </div>

        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <h4>
                महिना अनुसार दर्ता र चलानी
            </h4>
            <div class="card-body">
                <canvas id="steppedlineChart"></canvas>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h4>
                कुल राजस्व विवरण
            </h4>
            <div class="card-body">
                <canvas id="doughNut1"></canvas>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h4>
                भुक्तानी अनुसार कुल राजस्व विवरण
            </h4>
            <div class="card-body">
                <canvas id="pieChart1"></canvas>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <h4>
                विषय अनुसार तालिम विवरण
            </h4>
            <div class="card-body">
                <canvas id="polarAreaChart1"></canvas>
            </div>

        </div>
    </div>
</div>

</div>
<div class="row mt-2">
    <div class="col-lg-6">
        <div class="card">
            <h4>
                आर्थिक वर्ष अनुशारको घरनाक्स विवरण
            </h4>
            <div class="card-body">
                <canvas id="barChartHorizontal" height="170"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <h4>
                आर्थिक वर्ष अनुसार व्यवसाय विवरण
            </h4>
            <div class="card-body">
                <canvas id="lineChart1" height="170"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row mt-2">
    <div class="col-lg-6">
        <div class="card">
            <h4>
                वर्ग अनुसार अपांगता विवरण
            </h4>
            <div class="card-body">
                <canvas id="bubbleChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card">
            <h4>
                चालु अर्थिक अनुसार दर्ता/चलानी विवरण
            </h4>
            <div class="card-body">
                <canvas id="barChart2" height="170"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="{{asset('assets/backend/js/chart.js')}}"></script>
<script type="module" src="{{asset('assets/backend/js/circular.js')}}"></script>
@endpush
@endsection