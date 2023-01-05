@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                        {{$totalApplicationsCount}}
                                    </span>
                                </h3>
                            </div>
                            <p class="text my-1">जम्मा निवेदनहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                        {{$registeredApplicationsCount}}
                                   </span>
                                </h3>
                            </div>
                            <p class="text my-1">दर्ता भएका निवेदनहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                        {{$currentYearApplicationsCount}}
                                    </span>
                                </h3>
                            </div>
                            <p class="text my-1">चालू आर्थिक वर्षका निवेदनहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                        {{$currentMonthApplicationsCount}}
                                   </span>
                                </h3>
                            </div>
                            <p class="text my-1">हालको महिनाका निवेदनहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{--    <div class="row mt-2">--}}
{{--        <div class="col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <x-charts.pie-chart-component--}}
{{--                        id="budget-head-wise-chart"--}}
{{--                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) बजेट शिर्षक अनुसारका सम्पूर्ण योजनाहरु"--}}
{{--                        :labels="$budgetHeadWiseProjects['labels']"--}}
{{--                        :dataSets="$budgetHeadWiseProjects['dataSets']"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <x-charts.pie-chart-component--}}
{{--                        id="plan-level-wise-chart"--}}
{{--                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) योजना स्तर अनुसारका योजनाहरु"--}}
{{--                        :labels="$planLevelWiseProjects['labels']"--}}
{{--                        :dataSets="$planLevelWiseProjects['dataSets']"--}}
{{--                    />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row mt-2">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component
                        id="monthly-applications-chart" chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका मासिक निवेदनहरु"
                        :labels="$monthlyApplications['labels']"
                        :dataSets="$monthlyApplications['dataSets']"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
