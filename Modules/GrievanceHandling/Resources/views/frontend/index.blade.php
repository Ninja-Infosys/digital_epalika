@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section">
        <div class="container">
            <div class="row">
                <div class="breadcrumb d-flex pt-2">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{route('welcome')}}">ई-पालिका</a>
                        <i class="fa fa-angle-double-right text-light"></i>
                        <a class="ml-1 text-primary-500">गुनासो</a>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="card shadow text-center">
                                <div class="card-body">
                                    <h5 class="card-title mt-2 mb-3">गुनासो दर्ता</h5>
                                    <img class="icon" src="{{asset('assets/frontend/image/complain.png')}}" alt="">
                                    <h6 class="card-text mt-2">
                                            नयाँ गुनासोको दर्ता गर्नुहोस् ।
                                        </h6>
                                    <a href="{{route('grievanceHandling.grievance-register')}}" class="btn btn-primary">गुनासो
                                        दर्ता
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card shadow text-center">
                                <div class="card-body">
                                    <h5 class="mt-2 mb-3 card-title">उजुरी/गुनासो नीति</h5>
                                    <img class="icon" src="{{asset('assets/frontend/image/insurance.png')}}" alt="">
                                    <h6 class="card-text mt-2">उजुरी/गुनासो समाधान नीति ।</h6>
                                    <a href="{{route('grievanceHandling.policy')}}" class="btn btn-primary"><span>नीतिहरु</span>
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card shadow text-center">
                                <div class="card-body">
                                    <h5 class="mt-2 mb-3 card-title">गुनासो ट्र्याक</h5>
                                    <img class="icon" src="{{asset('assets/frontend/image/track.png')}}" alt="">
                                    <h6 class="card-text mt-2">गुनासो/उजुरीको स्थिती थाहा पाउन ।
                                    </h6>
                                    <a href="{{route('grievanceHandling.track')}}" class="btn btn-primary"><span>गुनासो ट्र्याक</span>
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card shadow text-center">
                                <div class="card-body">
                                    <h5 class="mt-2 mb-3 card-title">गुनासो लग इन</h5>
                                    <img class="icon" src="{{asset('assets/frontend/image/login.png')}}" alt="">
                                    <h6 class="card-text mt-2"> गुनासो/उजुरी लग इन ।
                                    </h6>
                                    <a href=""
                                       class="btn btn-primary"><span>लग इन</span>
                                        <i class="fa fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row">
                        <div class="col-md-4 p-2">
                            <div class="card bg-success text-light text-center">
                                <div class="card-body">
                                    <i class="fa fa-file-contract fs-3"></i>
                                    <h4 class="fw-bold mt-2">1</h4>
                                    <h6 class="fw-semibold">कुल प्राप्त गुनासो</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="card bg-primary text-light text-center">
                                <div class="card-body">
                                    <i class="fa fa-file fs-3"></i>
                                    <h4 class="fw-bold mt-2">0</h4>
                                    <h6 class="fw-semibold">कुल दर्ता गुनासो</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="card bg-info text-light text-center">
                                <div class="card-body">
                                    <i class="fa fa-check-double fs-3"></i>
                                    <h4 class="fw-bold mt-2">5</h4>
                                    <h6 class="fw-semibold">फर्छ्यौट भएको</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4 p-2">
                            <div class="card bg-warning text-light text-center">
                                <div class="card-body">
                                    <i class="fa fa-search fs-3"></i>
                                    <h4 class="fw-bold mt-2">8</h4>
                                    <h6 class="fw-semibold">अनुसन्धान गरिदै</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="card bg-danger text-light text-center">
                                <div class="card-body">
                                    <i class="fa fa-eye fs-3"></i>
                                    <h4 class="fw-bold mt-2">9</h4>
                                    <h6 class="fw-semibold">हेरिएको</h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 p-2">
                            <div class="card bg-dark text-light text-center">
                                <div class="card-body">
                                    <i class="fa fa-eye-slash fs-3"></i>
                                    <h4 class="fw-bold mt-2">0</h4>
                                    <h6 class="fw-semibold">नहेरिएको</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-5 card">
                    <h5 class="fw-semibold heading-line">गुनासो प्राप्त भएका गुनासो प्रकृतिहरु</h5>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">गुनासो प्रकृतिहरु</th>
                            <th scope="col"> संख्या</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($grievanceTypes as $type)
                        <tr>
                            <td>{{$type->title}}</td>
                            <td>{{$type->grievance_details_count}}</td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="card col-md-7 grievance-answer">
                    <h5 class="fw-semibold heading-line">सार्वजनिक गरिएका गुनासोहरु</h5>
                    <p>
                        @foreach($grievanceDetails as $grievanceDetail)
                        <button class="btn w-100" data-bs-toggle="collapse" data-bs-target="#collapse{{$loop->iteration}}"
                                aria-expanded="false">
                            {{$grievanceDetail->subject}}
                        </button>
                        @endforeach
                    </p>
                    @foreach($grievanceDetails as $grievanceDetail)
                    <div class="collapse" id="collapse{{$loop->iteration}}">
                        <div class="card card-body">
                            <p><i class="fa fa-angle-double-right m-lg-1"></i>{{$grievanceDetail->description}}</p>
                        </div>
                    </div>
                    @endforeach
                    <a class="btn mb-1 mt-1 btn-primary mx-auto" href="{{route('grievanceHandling.public-grievance')}}">थप
                        गुनासोहरु
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection



