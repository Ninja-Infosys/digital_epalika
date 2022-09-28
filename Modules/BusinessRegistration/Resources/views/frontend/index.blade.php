@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container-fluid">
            <div class="row d-flex mt-5 ">
                <div class="mx-auto">
                    <div class="breadcrumb d-flex">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500"
                               href="{{route('businessRegistration.business')}}">व्यवसाय</a>
                            <i class="fa fa-angle-double-right ml-lg-1"></i>
                            <a class="ml-1 text-primary-500">व्यवसाय दर्ता</a>
                        </div>
                    </div>
                    <h4 class="text-center">व्यवसाय दर्ता फारम</h4>
                    <p class="text-center">
                        तल दिएको फर्म लाई ३ तह मा पुरा गर्नुहोस् र आफुले भरेको फर्म ठीक छ छैन विचार
                        गरी पठाउनुहोस् ।
                    </p>
                    <livewire:businessregistration::registration-form />
                </div>
            </div>
        </div>
    </section>
    @push('styles')
        <style>

            /*progressbar*/
            .progressbar {
                overflow: hidden;
                /*CSS counters to number the steps*/
                counter-reset: step;
                width: 60%;
                margin: 0 auto 30px;
            }

            .progressbar li {
                list-style-type: none;
                color: white;
                text-transform: uppercase;
                font-size: 18px;
                width: 25%;
                float: left;
                position: relative;
                text-decoration: none;
            }

            .progressbar li a:hover {
                text-decoration: none;
            }

            .progressbar li:before {
                content: counter(step);
                counter-increment: step;
                width: 50px;
                line-height: 50px;
                display: block;
                font-size: 18px;
                font-weight: bold;
                color: #333;
                background: #eeeeee;
                border-radius: 50%;
                margin: 0 auto 5px auto;
            }

            /*progressbar connectors*/
            .progressbar li:after {
                content: '';
                width: 100%;
                height: 2px;
                background: white;
                position: absolute;
                left: -50%;
                top: 9px;
                z-index: -1;
                /*put it behind the numbers*/
            }

            .progressbar li:first-child:after {
                /*connector not needed before the first step*/
                content: none;
            }

            /*marking active/completed steps green*/
            /*The number of the step and the connector before it = green*/
            .progressbar li.active:before,
            .progressbar li.active:after {
                background: rgb(255, 99, 71);
                color: white;
            }

            .displayNone {
                display: none;
            }
        </style>
        <link rel="stylesheet" href="{{asset('assets/frontend/css/grievance/register.css')}}">
        <link rel="stylesheet" href="{{asset('assets/frontend/css/breadcrumb.css')}}">
    @endpush
    @push('scripts')
        {{--listener for toastr--}}
        <script>
            window.addEventListener('alert_message', event => {
                swal.fire({
                    title: event.detail.title,
                    text: event.detail.text,
                    icon: event.detail.type,
                });
            });
        </script>
    @endpush
@endsection
