@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                            {{$totalBusinessCount}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">व्यवसाय</p>
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
                                            {{$totalBusinessDetailPurposeCount}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">उदेश्यहरु</p>
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
                                <h3 class="mt-1 text-center"><span
                                        data-plugin="counterup">{{$totalObjectTransactionCategoryCount}}</span>
                                </h3>
                            </div>
                            <p class="text my-1">कारोबार गर्ने वस्तु</p>
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
                                            {{$totalInvestmentRevenueCount}}
                                         </span></h3>
                            </div>
                            <p class="text my-1">कारोबार गर्ने वस्तु उप श्रेणी</p>
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
                    <x-charts.pie-chart-component
                        :labels="$businessPurposesChartData['labels']"
                        :dataSets="$businessPurposesChartData['dataSets']"
                        id="businessPurpose" chartName="व्यवसायको उदेश्य"
                        chartType="pie"/>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="bar-chart15"
                        chartType="pie"
                        chartName=" आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} दर्ता भएका व्यवसायहरु"
                        :labels="$businessRegistrationAccordingToFiscalYear['labels']"
                        :dataSets="$businessRegistrationAccordingToFiscalYear['dataSets']"
                    />
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div><!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component
                        id="bar-chart16"
                        chartTitle="कारोबार गर्ने वस्तु श्रेणी"
                        :labels="$businessDetailTransaction['labels']"
                        :dataSets="$businessDetailTransaction['dataSets']"></x-charts.bar-chart-component>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="bar-chart17"
                        chartName=" आर्थिक बर्ष {{$officeSetting->fiscalYear->title??''}} व्यवसायको अवस्था"
                        :labels="$businessDetailAccordingToBusinessType['labels']"
                        :dataSets="$businessDetailAccordingToBusinessType['dataSets']"

                    />

                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-charts.bar-chart-component
                        id="bar-chart18"
                        chartTitle="पुँजीगत अनुसार व्यवसाय"
                        :labels="$investmentRevenueDetail['labels']"
                        :dataSets="$investmentRevenueDetail['dataSets']"></x-charts.bar-chart-component>

                </div>
            </div>
        </div>
    </div>
@endsection
