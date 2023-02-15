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
                                    <i class="fas fa-building avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup"> {{$totalBusinessCount}}</span></h3>
                                <p class="text-muted font-15 mb-0">दर्ता भएका व्यवसायहरु</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-redo avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$businessRenewCount}}</span></h3>
                                <p class="text-muted font-15 mb-0">चालु आ.व {{ $officeSetting->fiscalYear->title ?? '' }} मा जम्मा नविकरण</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$totalBusinessDetailNatureCount}}</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">व्यवसायको प्रकृतिहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-clipboard avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$totalObjectTransactionCategoryCount}}</span></h3>
                                <p class="text-muted font-15 mb-0">कारोबार गर्ने वस्तु</p>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component id="register-chart"
                                                  chartTitle="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्ष अनुसार व्यवसाय दर्ता विवरण"
                                                  chartType="line" :labels="$monthlyWise['labels']"
                                                  :dataSets="$monthlyWise['dataSets']"
                                                  :displayLegend="false"
                    />
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
{{--    <div class="row mt-2">--}}
{{--        <div class="col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <x-charts.pie-chart-component--}}
{{--                        id="bar-chart15"--}}
{{--                        chartType="pie"--}}
{{--                        chartName=" आर्थिक वर्ष {{$officeSetting->fiscalYear->title??''}} दर्ता भएका व्यवसायहरु"--}}
{{--                        :labels="$businessRegistrationAccordingToFiscalYear['labels']"--}}
{{--                        :dataSets="$businessRegistrationAccordingToFiscalYear['dataSets']"--}}
{{--                    />--}}
{{--                </div> <!-- end card-body-->--}}
{{--            </div> <!-- end card-->--}}
{{--        </div><!-- end col -->--}}

{{--        <div class="col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <x-charts.bar-chart-component--}}
{{--                        id="bar-chart16"--}}
{{--                        chartTitle="कारोबार गर्ने वस्तु श्रेणी"--}}
{{--                        :labels="$businessDetailTransaction['labels']"--}}
{{--                        :dataSets="$businessDetailTransaction['dataSets']"></x-charts.bar-chart-component>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component
                        id="ward-wise-chart"
                        chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार  व्यवसाय दर्ता विवरण"
                        :labels="$wardWise['labels']"
                        :dataSets="$wardWise['dataSets']"
                        :displayLegend="false"
                    />
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component
                        id="fiscalYear-wise-chart"
                        chartTitle=" आर्थिक वर्ष अनुसार  व्यवसाय दर्ता विवरण"
                        :labels="$fiscalYearWise['labels']"
                        :dataSets="$fiscalYearWise['dataSets']"
                        :displayLegend="false"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
