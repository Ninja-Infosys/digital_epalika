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
                                <a href="{{route('businessRegistration.business-register')}}" class="btn btn-primary">व्यवसाय
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