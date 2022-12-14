@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$not_started_project_count}}
                                        </span>
                                            </h3>
                                    </div>
                                    <p class="text my-1">शुरु नभएका योजनाहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body" style="padding: 10px 20px;">
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
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$completed_project_count}}
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">सम्पन्न योजनाहरू</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
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
