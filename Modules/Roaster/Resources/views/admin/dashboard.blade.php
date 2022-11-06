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
                            <a href="">तालिम व्यवस्थापन</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">गृहपृष्ठ </h4>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-danger border">
                                        <i class="fa fa-user font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
{{$userCount}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1"> जम्मा प्रयोगकर्ताहरु</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-4">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-info border-info border">
                                        <i class="fa fa-users font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
{{$trainerCount}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा प्रसिक्षकहरु</p>
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
                                    <div class="avatar-lg rounded-circle bg-blue border-blue border">
                                        <i class="fa fa-user font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">{{$technicalTraineeCount}}</span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा प्रभिधिक प्रशिक्षार्थीहरु</p>
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
                                    <div class="avatar-lg rounded-circle bg-pink border-pink border">
                                        <i class="fa fa-user font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
{{$traineeCount}}
                                    </span></h3>
                                        <p class="text-muted mb-1">जम्मा प्रशिक्षार्थीहरु</p>
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
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border">
                                        <i class="fa fa-user font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
{{$trainingCount}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा तालिमहरु</p>
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
                                    <div class="avatar-lg rounded-circle bg-success border-success border">
                                        <i class="fa fa-user font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1">
                                            <span data-plugin="counterup"></span>
                                        </h3>
                                        <p class="text-muted mb-1">आ.व. {{$setting->fiscalYear->year ?? ''}} का
                                            तालिमहरु</p>
                                        <div class="count">{{$trainingCountInFy}}</div>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

            </div>
        </div>
    </div>






    {{--        <div class="row">--}}
    {{--            <div class="col-md-12 col-sm-12">--}}
    {{--                <div class="x_panel">--}}
    {{--                    <div class="x_title">--}}
    {{--                        <h2>आ.व. {{$setting->fiscalYear->year ?? ''}} का तालिममा सहभागी भएका प्रशिक्षार्थीहरुको--}}
    {{--                            विवरण </h2>--}}
    {{--                        <div class="clearfix"></div>--}}
    {{--                    </div>--}}
    {{--                    <div class="x_content">--}}
    {{--                        <div id="main1" style="height:350px;"></div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="col-md-4 col-sm-4  ">--}}
    {{--                <div class="x_panel">--}}
    {{--                    <div class="x_title">--}}
    {{--                        <h2>स्थान अनुसार कुल प्रशिक्षकहरू</h2>--}}
    {{--                        <div class="clearfix"></div>--}}
    {{--                    </div>--}}
    {{--                    <div class="x_content">--}}

    {{--                        <div id="echart_pie" style="height:350px;"></div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="col-md-4 col-sm-4  ">--}}
    {{--                <div class="x_panel">--}}
    {{--                    <div class="x_title">--}}
    {{--                        <h2>स्थान अनुसार कुल प्रशिक्षार्थी</h2>--}}
    {{--                        <div class="clearfix"></div>--}}
    {{--                    </div>--}}
    {{--                    <div class="x_content">--}}

    {{--                        <div id="echart_pie2" style="height:350px;"></div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}

    {{--            <div class="col-md-4 col-sm-4  ">--}}
    {{--                <div class="x_panel">--}}
    {{--                    <div class="x_title">--}}
    {{--                        <h2>स्थान अनुसार कुल प्राविधिक प्रशिक्षार्थी</h2>--}}
    {{--                        <div class="clearfix"></div>--}}
    {{--                    </div>--}}
    {{--                    <div class="x_content">--}}

    {{--                        <div id="echart_donut" style="height:350px;"></div>--}}

    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
{{--    <div class="col-md-12 col-sm-12">--}}
{{--        <div class="x_panel">--}}
{{--            <div class="x_title">--}}
{{--                <h2>बिषय अनुसार कुल प्रशिक्षक</h2>--}}
{{--                <div class="clearfix"></div>--}}
{{--            </div>--}}
{{--            <div class="x_content">--}}
{{--                <div id="main2" style="height:350px;"></div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
