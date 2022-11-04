@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-6 p-2">
                        <div class="card bg-primary text-light text-center">
                            <div class="card-body">
                                <h5 class="fw-semibold mt-2">
                                    सेवा कालिन तालिम आवेदन फारम
                                </h5>
                                <i class="fa fa-file-invoice fs-5"></i>
                                <p>नाम</p>
                                <a href="{{route('individual-training-view','technical_trainee')}}" class="btn btn-light"><span>तालिम आवेदन</span>
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 p-2">
                        <div class="card bg-primary text-light text-center">
                            <div class="card-body">
                                <h5 class="fw-semibold mt-2">
                                    कृषक तालिम आवेदन फारम
                                </h5>
                                <i class="fa fa-file-invoice fs-5"></i>
                                <p>नाम</p>
                                <a href="{{route('individual-training-view','trainee')}}" class="btn btn-light"><span>तालिम आवेदन</span>
                                    <i class="fa fa-angle-double-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
