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
                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$grievanceCount}}
                                        </span>
                                            </h3>
                                    </div>
                                    <p class="text my-1">जम्मा गुनासो</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$registeredGrievanceCount}}
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">जम्मा दर्ता गुनासो</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">{{$closedGrievanceCount}}</span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">फर्छ्यौट भएको</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$investigatedGrievanceCount}}
                                         </span></h3>
                                    </div>
                                    <p class="text my-1">अनुसन्धान गरिदै</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$unseenGrievanceCount}}
                                    </span></h3>
                                    </div>
                                    <p class="text my-1">नहेरिएका गुनासो</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$publicGrievanceCount}}
                                    </span></h3>
                                    </div>
                                    <p class="text my-1">सार्वजनिक गुनासो</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$seenGrievanceCount}}
                                        </span></h3>
                                    </div>
                                    <p class="text my-1">जम्मा हेरिएको गुनासो</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>


            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component :labels="$dataAccordingToGrievanceType['labels']"
                                                          :dataSets="$dataAccordingToGrievanceType['dataSets']"
                                                          id="grievanceType" chartName="गुनासोको प्रकार अनुसार"
                                                          chartType="pie"/>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component :labels="$grievanceCountAccordingToSeverity['labels']"
                                                          :dataSets="$grievanceCountAccordingToSeverity['dataSets']"
                                                          id="grievanceSeverity" chartName="गुनासो गम्भीरता अनुसार"
                                                          chartType="doughnut"/>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component :labels="$dataAccordingToGrievanceOffice['labels']"
                                                          :dataSets="$dataAccordingToGrievanceOffice['dataSets']"
                                                          id="grievanceOffice" chartName="गुनासो शाखा अनुसार"
                                                          chartType="doughnut"/>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component :labels="$grievanceCountAccordingToStatus['labels']"
                                                          :dataSets="$grievanceCountAccordingToStatus['dataSets']"
                                                          id="grievanceStatus" chartName="गुनासोको स्थिति अनुसार"
                                                          chartType="pie"/>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
        </div>
    </div>
@endsection
