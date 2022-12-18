@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$dailyTaskCount}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">आज थपिएको कार्य</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$totalTaskCount}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">जम्मा कार्यहरू</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$totalTaskCategory}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">शाखाहरु अनुसार कार्यहरू</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body" style="padding: 10px 20px;">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$totalTaskDivision}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">कार्य विभाजन</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="task-report-chart"
                        chartName="आर्थिक वर्ष अनुसार जम्मा कार्यहरु"
                        :labels="$taskData['labels']"
                        :dataSets="$taskData['dataSets']"/>
                </div>
            </div>
        </div>
    </div>
@endsection
