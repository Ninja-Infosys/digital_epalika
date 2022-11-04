@extends('admin.layouts.master')
@section('content')
    <!-- top tiles -->
        <div class="row">
            <div class="tile_count">
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> जम्मा प्रयोगकर्ताहरु</span>
                    <div class="count">{{$userCount}}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-clock-o"></i> जम्मा प्रसिक्षकहरु</span>
                    <div class="count">{{$trainerCount}}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> जम्मा प्रभिधिक प्रशिक्षार्थीहरु</span>
                    <div class="count">{{$technicalTraineeCount}}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> जम्मा प्रशिक्षार्थीहरु</span>
                    <div class="count">{{$traineeCount}}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> जम्मा तालिमहरु</span>
                    <div class="count">{{$trainingCount}}</div>
                </div>
                <div class="col-md-2 col-sm-4  tile_stats_count">
                    <span class="count_top"><i class="fa fa-user"></i> आ.व. {{$setting->fiscalYear->year ?? ''}} का तालिमहरु</span>
                    <div class="count">{{$trainingCountInFy}}</div>
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
        <div class="col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>बिषय अनुसार कुल प्रशिक्षक</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div id="main2" style="height:350px;"></div>
                </div>
            </div>
        </div>
@endsection
