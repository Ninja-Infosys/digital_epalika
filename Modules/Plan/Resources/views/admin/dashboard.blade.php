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
                                            {{$not_started_project_count}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">शुरु नभएका योजनाहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$in_progress_project_count}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">चालु योजनाहरु</p>
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
                                            {{$completed_project_count}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">सम्पन्न योजनाहरू</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-rounded-circle card-secondary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                        {{$deadline_extended_project_count}}
                                   </span>
                                </h3>
                            </div>
                            <p class="text my-1">म्याद थप योजनाहरु</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="budget-head-wise-chart"
                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) बजेट शिर्षक अनुसारका सम्पूर्ण योजनाहरु"
                        :labels="$budgetHeadWiseProjects['labels']"
                        :dataSets="$budgetHeadWiseProjects['dataSets']"
                    />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="plan-level-wise-chart"
                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) योजना स्तर अनुसारका योजनाहरु"
                        :labels="$planLevelWiseProjects['labels']"
                        :dataSets="$planLevelWiseProjects['dataSets']"
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
                        id="area-wise-chart"
                        chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका योजनाको क्षेत्रअनुसारका सम्पूर्ण योजनाहरु"
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
                        id="ward-wise-chart"
                        chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार योजनाहरुको विवरण"
                        :labels="$wardWiseProjects['labels']"
                        :dataSets="$wardWiseProjects['dataSets']"
                        :displayLegend="false"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection
