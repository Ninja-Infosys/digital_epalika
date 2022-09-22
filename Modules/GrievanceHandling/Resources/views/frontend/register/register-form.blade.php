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
                    <p class="text-center">तल दिएको फर्म लाई २ तह मा पुरा गर्नुहोस् र आफुले भरेको फर्म ठीक छ छैन विचार
                        गरी पठाउनुहोस् ।</p>
                    <div class="card">
                        <div class="card-body">
                            <form action="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/grievance/register.css')}}">
    @endpush
@endsection
