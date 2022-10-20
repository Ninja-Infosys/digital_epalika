@extends('frontend.layouts.master')
@section('content')
    <section class="help-section">
        <div class="container">
            <div class="row d-flex mt-5">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{route('grievanceHandling.grievance')}}">गुनासो</a>
                        <i class="fa fa-angle-double-right ml-lg-1"></i><a class="ml-1 text-primary-500">गुनासो
                            ट्रयाक</a>
                    </div>
                </div>
            </div>
            <div class="row card-01 text-center justify-content-center">
                <h4 class="fw-bold">गुनासो ट्रयाक</h4>
                <p>तपाईंको गुनासो/उजुरीको स्थिती थाहा पाउन तल उल्लेखित विवरण भरेर पठाउनुहोस् ।</p>
                <div class="mt-3">
                    <form class="m-2" method="get" action="{{route('grievanceHandling.single-grievance')}}">
                        @csrf
                        <div class="mb-3">
                            <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                            <input type="text" name="phone" class="" id="phone" placeholder="सम्पर्क नम्बर">
                            @error('phone')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="token" class="form-label">गुनासो नम्बर *</label>
                            <input type="text" name="token" class="" id="token" placeholder="आवेदक नम्बर">
                            @error('token')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">खोज्नुहोस्</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
