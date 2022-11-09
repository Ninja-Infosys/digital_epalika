@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        <i class="fa fa-angle-double-right"></i>
                        <a class=" text-primary-500 text-center">नक्सा दरखास्त फारम</a>
                    </div>
                </div>
                <h4 class="fw-semibold text-center">नक्सा दरखास्त फारम</h4>
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <h3></h3>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card mb_30">
                            <div class="card-body p-3">
                                <livewire:emap::map-application-form/>
                            </div>
                        </div>
                    </div>
                </div>
                @push('scripts')
                    <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
                @endpush
            </div>
        </div>
    </section>
@endsection
