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
                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body" style="padding: 10px 20px;">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            3
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">प्रयोगकर्ताहरु</p>
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
                                            {{$trainerCount}}
                                                </span>
                                                    </h3>
                                    </div>
                                    <p class="text my-1">प्रसिक्षकहरु</p>
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
                                            {{$trainingCount}}
                                        </span>
                                            </h3>
                                    </div>
                                    <p class="text my-1"> तालिमहरु</p>
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
                                            {{$traineeCount}}
                                        </span></h3>
                                    </div>
                                    <p class="text my-1"> प्रशिक्षार्थीहरु</p>
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
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">{{$technicalTraineeCount}}</span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">प्रभिधिक प्रशिक्षार्थीहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component id="pie-chart2" chartName="स्थान अनुसार कुल प्रशिक्षकहरू"
                                                  :labels="$trainerAccordingToDistrictsData['labels']"
                                                  :dataSets="$trainerAccordingToDistrictsData['dataSets']"/>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component id="pie-chart3" chartName="स्थान अनुसार कुल प्रशिक्षार्थी"
                                                  :labels="$traineeAccordingToDistrictsData['labels']"
                                                  :dataSets="$traineeAccordingToDistrictsData['dataSets']"/>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component id="pie-chart4" chartName="स्थान अनुसार कुल प्राविधिक प्रशिक्षार्थी"
                                                  :labels="$technicalTraineeAccordingToDistrictsData['labels']"
                                                  :dataSets="$technicalTraineeAccordingToDistrictsData['dataSets']"/>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component id="bar-chart1"
                                                  chartTitle="आ.व. {{$officeSetting->fiscalYear->title??''}} का तालिममा सहभागी भएका प्रशिक्षार्थीहरुको विवरण"
                                                  :labels="$trainingInFyData['labels']"
                                                  :dataSets="$trainingInFyData['dataSets']"/>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component id="bar-chart4" chartType='line'
                                                  chartTitle="बिषय अनुसार कुल प्रशिक्षक"
                                                  :labels="$trainerAccordingToSubjectData['labels']"
                                                  :dataSets="$trainerAccordingToSubjectData['dataSets']"/>

                </div>
            </div>
        </div>


    </div>
@endsection
