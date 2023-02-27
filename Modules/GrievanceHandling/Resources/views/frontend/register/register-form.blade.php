@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="mx-auto">
                    <div class="breadcrumb d-flex">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500"
                               href="{{route('grievanceHandling.grievance')}}">गुनासो</a>
                            <i class="fa fa-angle-double-right ml-lg-1 text-light"></i>
                            <a class="ml-1 text-primary-500">गुनासो दर्ता</a>
                        </div>
                    </div>
                    <h4 class="text-center">उजुरी दर्ता फर्म</h4>
                    <p class="text-center">
                        तल दिएको फर्म लाई २ तह मा पुरा गर्नुहोस् र आफुले भरेको फर्म ठीक छ छैन विचार
                        गरी पठाउनुहोस् ।
                    </p>
                    @livewire('grievancehandling::grievance-form-wizard')
                </div>
            </div>
        </div>
    </section>
@endsection
