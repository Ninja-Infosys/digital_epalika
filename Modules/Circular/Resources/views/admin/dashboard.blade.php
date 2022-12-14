@extends('admin.layouts.master')
@section('content')
    <div class="row mt-2">
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                                {{ $total_registrations }}
                                            </span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">जम्मा दर्ता पत्रहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                                {{ $total_dispatches }}
                                            </span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">जम्मा चलानी पत्रहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span
                                                data-plugin="counterup">{{ $yearly_registrations }}</span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">वार्षिक दर्ता पत्रहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                                {{ $yearly_dispatches }}
                                            </span></h3>
                                    </div>
                                    <p class="text my-1">वार्षिक चलानी पत्रहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                                {{ $monthly_registrations }}
                                            </span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">मासिक दर्ता पत्रहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->

                <div class="col-md-6 col-xl-2">
                    <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="avatar-lg rounded-circle bg-light border">
                                        <h3 class="mt-1 text-center">
                                            <span data-plugin="counterup">{{ $monthly_dispatches }}</span>
                                        </h3>
                                    </div>
                                    <p class="text my-1">मासिक चलानी पत्रहरु</p>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->\
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.bar-chart-component id="bar-chart" chartTitle="आर्थिक वर्ष अनुसार दर्ता र चलानी"
                                :labels="$registrationChartData['labels']" :dataSets="$registrationChartData['dataSets']" />
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <x-charts.bar-chart-component id="register-chart"
                                chartTitle="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका दर्ता र चलानी"
                                chartType="line" :labels="$registrationYearlyChartData['labels']" :dataSets="$registrationYearlyChartData['dataSets']" />
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->

            </div>
        </div>
    </div>
@endsection
