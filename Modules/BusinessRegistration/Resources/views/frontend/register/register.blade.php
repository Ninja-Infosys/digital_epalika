@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container-fluid">
            <div class="row d-flex mt-5 ">
                <div class="mx-auto">
                    <div class="breadcrumb d-flex">
                        <div>
                            <a class="whitespace-nowrap text-primary-500"
                               href="#">व्यवसाय</a>
                            <i class="fa fa-angle-right ml-lg-1"></i>
                            <a class="ml-1 text-primary-500">व्यवसाय दर्ता</a>
                        </div>
                    </div>
                    <h4 class="text-center">व्यवसाय दर्ता फर्म</h4>
                    <p class="text-center">
                        तल दिएको फर्म लाई ३ तह मा पुरा गर्नुहोस् र आफुले भरेको फर्म ठीक छ छैन विचार
                        गरी पठाउनुहोस् ।
                    </p>
                    @livewire('BusinessRegistration::business-form-wizard')
                </div>
            </div>
        </div>
    </section>