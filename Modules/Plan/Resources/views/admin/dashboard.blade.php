@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-danger border">
                                        <i class="fa fa-code-branch font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                        {{$not_started_project_count}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">शुरु नभएका योजनाहरु </p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-secondary border-secondary border">
                                        <i class="fa fa-code-branch font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                         {{$in_progress_project_count}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">चालु योजनाहरु</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-secondary border-secondary border">
                                        <i class="fa fa-code-branch font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                         {{$completed_project_count}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">सम्पन्न योजनाहरू</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component
                        id="area-wise-chart" chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका योजनाको क्षेत्रअनुसारका सम्पूर्ण योजनाहरु"
                        :labels="$planAreaWiseProjects['labels']"
                        :dataSets="$planAreaWiseProjects['dataSets']"
                    />
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="budget-head-wise-chart"
                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) बजेट शिर्षक अनुसारका सम्पूर्ण योजनाहरु"
                        :labels="$planAreaWiseProjects['labels']"
                        :dataSets="$planAreaWiseProjects['dataSets']"
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
                        id="ward-wise-chart" chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार योजनाहरुको विवरण"
                        :labels="$wardWiseProjects['labels']"
                        :dataSets="$wardWiseProjects['dataSets']"
                        :displayLegend="false"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
