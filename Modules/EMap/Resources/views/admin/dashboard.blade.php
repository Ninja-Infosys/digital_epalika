@extends('admin.layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-12">
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
                                    <p class="text my-1">दर्ता भएका संगठन</p>
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
                                            {{$map_apply_count}}
                                       </span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">जम्मा दर्ता नक्सा</p>
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
                    <div class="widget-rounded-circle card-secondary">
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
                                <x-charts.pie-chart-component
                                    id="bar-chart7"
                                    chartName="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} अनुसार भवन निर्माण कार्यको किसिम "
                                    :labels="$mapApplyConstructionTypeAccordingToFiscalYears['labels']"
                                    :dataSets="$mapApplyConstructionTypeAccordingToFiscalYears['dataSets']"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <x-charts.pie-chart-component
                                    id="bar-chart8"
                                    chartName="आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} इस्टकचर अनुसार भवनको किसिम "
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
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title mb-0">Mixed Chart - Line & Area</h4>
                            </div>
                            <div class="card-body">
                                    <div id="apex-mixed-1" class="apex-charts pt-3" data-colors="#CED4DC,#6658dd"></div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="header-title mb-0">Simple Pie Chart</h4>
                            </div>
                            <div class="card-body">
                                    <div id="apex-pie-1" class="apex-charts pt-3" data-colors="#6658dd,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card-->
                    </div> <!-- end col-->

                </div>
                </div>
            </div>
        </div>
    @push('scripts')
            <script src="{{asset('assets/backend/libs/apexcharts/apexcharts.min.js')}}"></script>
            <script src="{{asset('assets/backend/js/chart/emap.init.js')}}"></script>
        @endpush
@endsection
