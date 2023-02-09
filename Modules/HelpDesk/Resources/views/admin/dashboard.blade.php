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
                            <a href="{{route('admin.helpDesk.dashboard')}}">हेल्प डेस्क</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">गृहपृष्ठ </h4>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-primary" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$main_branch_count}}
                                        </span>
                                            </h3>
                                    </div>
                                    <p class="text my-1">शाखा</p>
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
                                            {{$sub_branch_count}}
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">उप-शाखा</p>
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
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">{{$service_count}}</span></h3>
                                    </div>
                                    <p class="text my-1">सेवाहरु</p>
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
                            <x-charts.bar-chart-component id="bar-chart1" chartTitle="शाखा अनुसार उपशाखा"
                                                          :labels="$branchesData['labels']"
                                                          :dataSets="$branchesData['dataSets']"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component :labels="$branchServicesData['labels']"
                                                          :dataSets="$branchServicesData['dataSets']"
                                                          id="grievanceSeverity" chartName="शाखा अनुसार सेवाहरु"
                                                          chartType="doughnut"/>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.bar-chart-component id="bar-chart2" chartTitle="उप-शाखा अनुसार सेवाहरु"
                                                          :labels="$subBranchServicesData['labels']"
                                                          :dataSets="$subBranchServicesData['dataSets']"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
