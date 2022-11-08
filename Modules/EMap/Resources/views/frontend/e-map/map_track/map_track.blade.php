@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        <i class="fa fa-angle-double-right"></i>
                        <a class=" text-primary-500 text-center">नक्सा ट्रयाक</a>
                    </div>
                </div>
                <h4 class="fw-semibold text-center">नक्सा ट्रयाक </h4>
            </div>
            <form action="">
                <div class="row justify-content-center pb-1">
                    <div class="col-md-6 col-xl-8">
                        <div class="widget-rounded-circle card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="form-check-label" for="submision_no">सबमिसन न:</label>&emsp;
                                        <input type="text" name="submision_no" id="submision_no">
                                    </div>
                                    <div class="col-6">
                                        <label class="form-check-label px-2" for="phone_no">फोन न:</label>&emsp;
                                        <input type="text" name="phone_no" id="phone_no">
                                    </div>
                                </div> <!-- end row-->
                                <div class="d-flex justify-content-end pt-3">
                                    <a href="{{route('formDetails')}}" class="btn btn-primary btn-sm">
                                        <i class="fa fa-search"></i>
                                        <span>ट्रयाक गर्नुहोस्</span>
                                    </a>
                                </div>
                            </div>
                        </div> <!-- end widget-rounded-circle-->
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
