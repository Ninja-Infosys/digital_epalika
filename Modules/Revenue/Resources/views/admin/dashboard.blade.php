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
                                          765432
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
                                            5432
                                       </span>
                                </h3>
                            </div>
                            <p class="text my-1">प्रकृतिहरु</p>
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
                                        data-plugin="counterup">123</span>
                                </h3>
                            </div>
                            <p class="text my-1">कारोबार गर्ने वस्तु</p>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->


    </div>
@endsection
