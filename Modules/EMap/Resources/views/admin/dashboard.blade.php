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
                            <a href="{{route('emap.admin.dashboard')}}">इ-नक्सा</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">गृहपृष्ठ </h4>
            </div>

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                                {{$organization_count}}
                                    </span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">जम्मा संगठन</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$map_apply_count}}
                                       </span>
                                           </h3>
                                    </div>
                                    <p class="text my-1">जम्मा नक्सा</p>
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
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            6
                                         </span></h3>
                                    </div>
                                    <p class="text my-1">वार्षिक दर्ता नक्सा</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            6
                                         </span></h3>
                                    </div>
                                    <p class="text my-1">मासिक दर्ता नक्सा</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

            <div class="row mt-2">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component id="bar-chart5"
                                                          chartName="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार प्रयोजन "
                                                          :labels="$mapApplyBuildingUsageAccordingToFiscalYears['labels']"
                                                          :dataSets="$mapApplyBuildingUsageAccordingToFiscalYears['dataSets']"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.bar-chart-component id="bar-chart6"
                                                          chartTitle="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}}  अनुसार भवन  वर्गीकरण "
                                                          :labels="$mapApplyBuildingCategoryAccordingToFiscalYears['labels']"
                                                          :dataSets="$mapApplyBuildingCategoryAccordingToFiscalYears['dataSets']"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component id="bar-chart7"
                                                          chartName="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार भवन निर्माण कार्यको किसिम "
                                                          :labels="$mapApplyConstructionTypeAccordingToFiscalYears['labels']"
                                                          :dataSets="$mapApplyConstructionTypeAccordingToFiscalYears['dataSets']"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.pie-chart-component id="bar-chart8"
                                                          chartName="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार भवन निर्माण कार्यको किसिम "
                                                          :labels="$mapApplyStructureTypeAccordingToFiscalYears['labels']"
                                                          :dataSets="$mapApplyStructureTypeAccordingToFiscalYears['dataSets']"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.bar-chart-component id="bar-chart4" chartType='line'
                                                          chartTitle="आर्थिक बर्ष अनुसारले नक्सा बिवरण"
                                                          :labels="$mapAppliesAccordingToFiscalYears['labels']"
                                                          :dataSets="$mapAppliesAccordingToFiscalYears['dataSets']"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
