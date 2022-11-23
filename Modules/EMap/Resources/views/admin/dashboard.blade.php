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
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-danger border">
                                        <i class="fa fa-sitemap font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                                {{$organization_count}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा संगठन</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-secondary border-secondary border">
                                        <i class="fa fa-map-marked font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                         {{$map_apply_count}}
                                    </span>
                                        </h3>
                                        <p class="text-muted mb-1">जम्मा नक्सा</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-pink border-pink border">
                                        <i class="fa fa-file font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                       6
                                    </span></h3>
                                        <p class="text-muted mb-1">वार्षिक दर्ता नक्सा</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border">
                                        <i class="fa fa-file font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="mt-1"><span data-plugin="counterup">
                                        7
                                    </span></h3>
                                        <p class="text-muted mb-1">मासिक दर्ता नक्सा</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

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
