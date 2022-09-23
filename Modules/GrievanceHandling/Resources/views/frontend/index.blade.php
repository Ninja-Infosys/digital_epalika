@extends('frontend.layouts.master')
@section('content')
<section class="inner-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-3">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <div class="card shadow text-center">
                            <div class="card-body">
                                <h5 class="card-title mt-2 mb-3">गुनासो दर्ता</h5>
                                <img class="icon" src="{{asset('assets/frontend/image/complain.png')}}" alt="">
                                <p class="card-text mt-2"><small>
                                        नयाँ गुनासोको दर्ता गर्नुहोस् ।
                                    </small></p>
                                <a href="{{route('grievanceHandling.grievance-register')}}" class="btn btn-primary" >गुनासो थप
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
                                <p class="card-text mt-2"><small>उजुरी/गुनासो समाधान नीति ।</small></p>
                                <a href="{{route('grievanceHandling.policy')}}" class="btn btn-primary" ><span>नीतिहरु</span>
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
                                <p class="card-text mt-2"><small>तपाईंको गुनासो/उजुरीको स्थिती थाहा पाउन ।</small></p>
                                <a href="{{route('grievanceHandling.track')}}" class="btn btn-primary" ><span>गुनासो ट्र्याक</span>
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
                                <p class="fw-semibold">कुल प्राप्त गुनासो</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="card bg-primary text-light text-center">
                            <div class="card-body">
                                <i class="fa fa-file fs-3"></i>
                                <h4 class="fw-bold mt-2">0</h4>
                                <p class="fw-semibold">कुल दर्ता गुनासो</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="card bg-info text-light text-center">
                            <div class="card-body">
                                <i class="fa fa-check-double fs-3"></i>
                                <h4 class="fw-bold mt-2">5</h4>
                                <p class="fw-semibold">फर्छ्यौट भएको</p>
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
                                <p class="fw-semibold">अनुसन्धान गरिदै</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="card bg-danger text-light text-center">
                            <div class="card-body">
                                <i class="fa fa-eye fs-3"></i>
                                <h4 class="fw-bold mt-2">9</h4>
                                <p class="fw-semibold">हेरिएको</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 p-2">
                        <div class="card bg-dark text-light text-center">
                            <div class="card-body">
                                <i class="fa fa-eye-slash fs-3"></i>
                                <h4 class="fw-bold mt-2">0</h4>
                                <p class="fw-semibold">नहेरिएको</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5 card">
                <h4 class="fw-bold heading-line">गुनासो प्राप्त भएका गुनासो प्रकृतिहरु</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">गुनासो प्रकृतिहरु</th>
                        <th scope="col"> संख्या</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>लागुपदार्थ को दुरुपयोग</td>
                        <td>१</td>
                    </tr>
                    <tr>
                        <td>प्राकृतिक स्रोत को दोहन</td>
                        <td>२</td>
                    </tr>
                    <tr>
                        <td>राजस्व छली</td>
                        <td>३</td>
                    </tr>
                    <tr>
                        <td>खानेपनि सम्बन्धि गुनासो</td>
                        <td>४</td>
                    </tr>
                    <tr>
                        <td>प्रयोगशालामा आवश्यक उपकरण को अभाव</td>
                        <td>५</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card col-md-7 grievance-answer">
                <h4 class="fw-bold heading-line">सार्वजनिक गरिएका गुनासोहरु</h4>
                <p>
                    <button class="btn w-100" data-bs-toggle="collapse" data-bs-target="#collapse" aria-expanded="false" >
                        सार्वजनिक भएका गुनासो हरु को शीर्षक हरु क्रमश: यहा देखिनेछ्न
                    </button>
                </p>
                <div class="collapse" id="collapse">
                    <div class="card card-body">
                        <p><i class="fa fa-angle-double-right m-lg-1"></i>सार्वजनिक भएका गुनासो हरु को उतरहरु क्रमश: यहा देखिनेछ्न |</p>
                    </div>
                </div>
                <a class="btn mb-1 mt-1 btn-primary mx-auto" href="{{route('grievanceHandling.public-grievance')}}">थप गुनासोहरु<i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/grievance/index.css')}}">
@endpush
@endsection



