@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-3 col-xl-3">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$video_count ?? 0}}
                                        </span>
                                            </h3>
                                    </div>
                                    <p class="text my-1">भिडियोहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-3 col-xl-3">
                    <div class="widget-rounded-circle card-secondary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$news_count ?? 0}}
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">समाचारहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-3 col-xl-3">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$notice_count ?? 0}}
                                        </span></h3>
                                    </div>
                                    <p class="text my-1">सूचनाहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-md-3 col-xl-3">
                    <div class="widget-rounded-circle card-secondary" >
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$employee_count ?? 0}}
                                         </span></h3>
                                    </div>
                                    <p class="text my-1">कर्मचारी/जनप्रतिनिधि</p>
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
                            <x-charts.bar-chart-component id="bar-chart" chartTitle="आर्थिक वर्ष अनुसार सूचना समाचार"
                                                          :labels="$totalNewsAndNoticeChartData['labels']"
                                                          :dataSets="$totalNewsAndNoticeChartData['dataSets']"/>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.bar-chart-component id="register-chart" chartTitle="चालु आर्थिक({{$officeSetting->fiscalYear->title ?? ''}}) वर्षका सूचना समाचार"
                                                          chartType="line"
                                                          :labels="$noticeFyChartData['labels']"
                                                          :dataSets="$noticeFyChartData['dataSets']"/>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

            </div>
        </div>
    </div>
@endsection
