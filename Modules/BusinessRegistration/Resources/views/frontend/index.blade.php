@extends('frontend.layouts.master')
@section('content')

<section class="form">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <div class="card shadow text-center">
                            <div class="card-body">
                                <h5 class="card-title mt-2 mb-3">व्यवसाय दर्ता</h5>
                                <img class="icon" src="...." alt="">
                                <p class="card-text mt-2"><small>
                                        नयाँ व्यवसायको दर्ता गर्नुहोस् ।
                                    </small></p>
                                <a href="{{route('businessRegistration.registrationForm')}}" class="btn btn-primary">व्यवसाय
                                    थप
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection


{{--@extends('frontend.layouts.master')--}}
{{--@section('content')--}}
{{--    <section class="inner-section mt-lg-5 ">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="row d-flex mt-5 ">--}}
{{--                <div class="mx-auto">--}}
{{--                    <div class="breadcrumb d-flex">--}}
{{--                        <div>--}}
{{--                            <a class="whitespace-nowrap text-primary-500"--}}
{{--                               href="#">व्यवसाय</a>--}}
{{--                            <i class="fa fa-angle-right ml-lg-1"></i>--}}
{{--                            <a class="ml-1 text-primary-500">व्यवसाय दर्ता</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <h4 class="text-center">व्यवसाय दर्ता फर्म</h4>--}}
{{--                    <p class="text-center">--}}
{{--                        तल दिएको फर्म लाई ३ तह मा पुरा गर्नुहोस् र आफुले भरेको फर्म ठीक छ छैन विचार--}}
{{--                        गरी पठाउनुहोस् ।--}}
{{--                    </p>--}}

{{--                    <livewire:businessregistration::registration-form />--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endsection--}}
