@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                            {{$totalRegistrations}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">जम्मा दर्ताहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
        <div class="col-md-4">
            <div class="widget-rounded-circle card-primary" style="background-color: #0047AB">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center"><span data-plugin="counterup">
                                           {{$yearlyRegistrations}}
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">वार्षिक दर्ताहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
        <div class="col-md-4">
            <div class="widget-rounded-circle card-primary">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="avatar-lg rounded-circle bg-light border">
                                <h3 class="mt-1 text-center">
                                    <span data-plugin="counterup">
                                            {{$monthlyRegistrations}}
                                        </span>
                                </h3>
                            </div>
                            <p class="text my-1">मासिक दर्ताहरु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="applicant-type-wise-chart"
                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) आवेदक प्रकार अनुसारका सुची दर्ताहरु"
                        :labels="$applicantTypeWiseData['labels']"
                        :dataSets="$applicantTypeWiseData['dataSets']"
                    />
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <x-charts.pie-chart-component
                        id="business-nature-wise-chart"
                        chartName="चालु आर्थिक({{ $officeSetting->fiscalYear->title ?? '' }}) खरिद प्रकृति अनुसारका सुची दर्ताहरु"
                        :labels="$businessNatureWiseData['labels']"
                        :dataSets="$businessNatureWiseData['dataSets']"
                    />
                </div>
            </div>
        </div>
    </div>
@endsection

