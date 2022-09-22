@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container-fluid">
            <div class="row d-flex mt-5 ">
                <div class="col-md-10  mx-auto">
                    <div class="breadcrumb d-flex">
                        <div>
                            <a class="whitespace-nowrap text-primary-500" href="">गुनासो</a>
                        </div>
                        <div class="d-flex items-center ml-1 whitespace-nowrap">
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
    @push('styles')
        <style>
            body {
                margin-top: 40px;
            }

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
                width: 33.33%;
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
    @endpush
@endsection
