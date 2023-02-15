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
                                    <i class="fas fa-briefcase avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$not_started_project_count}}</span></h3>
                                <p class="text-muted font-15 mb-0">शुरु नभएका योजनाहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-briefcase avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$in_progress_project_count}}</span></h3>
                                <p class="text-muted font-15 mb-0 text-truncate">चालु योजनाहरु</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3 border-end">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-briefcase avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$completed_project_count}}</span></h3>
                                <p class="text-muted font-15 mb-0">सम्पन्न योजनाहरू</p>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="d-flex flex-column align-items-center">
                                <div class="avatar-sm bg-blue rounded-circle">
                                    <i class="fas fa-briefcase avatar-title font-18 text-white"></i>
                                </div>
                                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$deadline_extended_project_count}}</span></h3>
                                <p class="text-muted font-15 mb-0">म्याद थप योजनाहरु</p>
                            </div>
                        </div>

                    </div> <!-- end row -->
                </div>
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$totalBusinessCount}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">व्यवसाय</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$totalBusinessDetailNatureCount}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">प्रकृतिहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span
                                        data-plugin="counterup">{{$totalObjectTransactionCategoryCount}}</span>
                                </h3>
                            </div>
                            <p class="text my-1">कारोबार गर्ने वस्तु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
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
