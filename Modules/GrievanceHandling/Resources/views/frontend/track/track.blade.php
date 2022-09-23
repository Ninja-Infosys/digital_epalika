@extends('frontend.layouts.master')
@section('content')
    <section class="help-section">
        <div class="container-fluid">
            <div class="row d-flex mt-5">
                <div class="breadcrumb d-flex">
                    <div>
                        <a class="whitespace-nowrap text-primary-500" href="{{route('grievanceHandling.grievance')}}">गुनासो</a>
                        <i class="fa fa-angle-right ml-lg-1"></i><a class="ml-1 text-primary-500">गुनासो ट्रयाक</a>
                    </div>
                </div>
            </div>
            <div class="row text-center justify-content-center">
                <h4 class="fw-bold">गुनासो ट्रयाक</h4>
                <p>तपाईंको गुनासो/उजुरीको स्थिती थाहा पाउन तल उल्लेखित विवरण भरेर पठाउनुहोस् ।</p>
                <div class="mt-3">
                    <form class="m-2">
                        <div class="mb-3">
                            <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                            <input type="text" name="phone" class="" id="phone" placeholder="सम्पर्क नम्बर">
                        </div>
                        <div class="mb-3">
                            <label for="applicant_no" class="form-label">गुनासो नम्बर *</label>
                            <input type="text" name="token" class="" id="applicant_no" placeholder="आवेदक नम्बर">
                        </div>
                        <a type="button" class="btn btn-primary" href="{{route('grievanceHandling.single-grievance')}}">खोज्नुहोस्</a>
                    </form>
                    <hr>
                </div>
            </div>
        </div>
    </section>
@endsection
