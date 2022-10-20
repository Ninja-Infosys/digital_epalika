@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{route('grievanceHandling.grievance')}}">गुनासो</a>
                        <i class="fa fa-angle-double-right ml-lg-1"></i><a class="ml-1 text-primary-500">गुनासो ट्रयाक</a>
                    </div>
                </div>
                <div class="row bg-card shadow rounded overflow-hidden">
                    <div class="d-flex justify-content-start">
                        <h4 class="text-center mt-5">गुनासो विषय: {{$grievanceDetail->subject}}</h4>
                    </div>
                    <div class="col-md-7"><p>गुनासो प्रकार: {{$grievanceDetail->grievanceType->title??''}}</p></div>
                    <div class="col-md-5"><p>सम्वन्धित शाखा: {{$grievanceDetail->grievanceOffice->title??''}}</p></div>
                    <div>आवेदक नम्बर: {{$grievanceDetail->grievanceUser->phone??''}}</div>
                    <div class=" row mt-4 border rounded mx-auto">
                        <div class=" single-grievance-details  d-flex px-3 py-2">
                            <img src="{{asset('assets/frontend/image/avatar.png')}}"
                                 class="img-fluid rounded-circle mt-1" alt="">
                            <p>{{$grievanceDetail->description}}</p>
                        </div>
                        <hr>
                        <div class="row">
                            @foreach($grievanceDetail->files as $file)
                            <div class="col-md-3 grievance-doc-img">

                                <img src="{{$file->file_url}}" class="img-fluid rounded mb-2"
                                     alt="">

                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="row mt-4 mb-2 border rounded mx-auto">
                        @foreach($grievanceDetail->grievanceDetails as $details)
                        <div class=" single-grievance-details px-3 pt-2 d-flex justify-content-end">
                            <p>{{$details->description}}
                            </p>
                            <img src="{{asset('assets/frontend/image/avatar.png')}}"
                                 class="img-fluid rounded-circle mt-1 rounded" alt="">
                        </div>
                        <hr>
                        <div class=" row container-fluid">
                            @foreach($details->files as $detailFile)
                            <div class="col-md-3 grievance-doc-img">

                                <img src="{{$detailFile->file_url}}" class="img-fluid rounded mb-2"
                                     alt="">

                            </div>
                            @endforeach
                                <hr>
                        </div>
                        @endforeach
                    </div>
{{--                    <div class="reply mx-auto mt-5">--}}
{{--                        <form action="" class="mb-3">--}}
{{--                            <h5>टिप्पणी छोड्नुहोस</h5>--}}
{{--                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
{{--                        </form>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </section>
@endsection
