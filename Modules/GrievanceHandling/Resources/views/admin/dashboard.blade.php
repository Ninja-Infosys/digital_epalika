@extends('admin.layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grievanceHandling.dashboard')}}">ई-गुनासो</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">गृहपृष्ठ </h4>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-danger border">
                                        <i class="fa fa-file-contract font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                        2
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा गुनासो</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-secondary border-secondary border">
                                        <i class="fa fa-file-contract font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                         3
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा दर्ता गुनासो</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-blue border-blue border">
                                        <i class="fa fa-check-double font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">4</span></h3>
                                        <p class="text-muted mb-1">फर्छ्यौट भएको</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-pink border-pink border">
                                        <i class="fa fa-search font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                       6
                                    </span></h3>
                                        <p class="text-muted mb-1">अनुसन्धान गरिदै</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border">
                                        <i class="fa fa-eye font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                        7
                                    </span></h3>
                                        <p class="text-muted mb-1">जम्मा हेरिएको गुनासो </p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-info border-info border">
                                        <i class="fa fa-eye-slash font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                        7</span></h3>
                                        <p class="text-muted mb-1"> नहेरिएका गुनासो</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Line Chart</h4>
                            <div class="mt-4 chartjs-chart">
                                <canvas id="line-chart-example" height="350" data-colors="#1abc9c,#f1556c"></canvas>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Bar Chart</h4>
                            <div class="mt-4 chartjs-chart">
                                <canvas id="bar-chart-example" height="350" data-colors="#4a81d4,#e3eaef"></canvas>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Pie Chart</h4>
                            <div class="mt-4 chartjs-chart">
                                <canvas id="pie-chart-example" height="350" class="mt-4" data-colors="#6658dd,#fa5c7c,#4fc6e1,#ebeff2"></canvas>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Donut Chart</h4>
                            <div class="mt-4 chartjs-chart">
                                <canvas id="donut-chart-example" height="350" data-colors="#6c757d,#1abc9c,#ebeff2"></canvas>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Polar area Chart</h4>

                            <div class="mt-4 chartjs-chart">
                                <canvas id="polar-chart-example" height="350" data-colors="#4a81d4,#fa5c7c,#4fc6e1,#ebeff2"> </canvas>
                            </div>

                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Radar Chart</h4>
                            <div class="mt-4 chartjs-chart">
                                <canvas id="radar-chart-example" height="350" data-colors="#39afd1,#a17fe0"></canvas>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
