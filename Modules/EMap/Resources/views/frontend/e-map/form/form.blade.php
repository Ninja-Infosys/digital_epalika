@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        <i class="fa fa-angle-double-right text-light"></i>
                        <a class=" text-primary-500 text-center">नक्सा दरखास्त फारम</a>
                    </div>
                </div>
                <h4 class="fw-semibold text-center">नक्सा दरखास्त फारम</h4>
                <div class="row justify-content-center">
                        <div class="card">
                            <div class="card-body">
                            <livewire:emap::map-application-form/>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
