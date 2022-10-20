@extends('helpdesk::layouts.master')
@section('content')
    <div class="content-section">
        <div class="breadcrumb d-flex">
            <div class="breadcrumb-item">
                <a class="whitespace-nowrap text-primary-500" href="{{route('welcome')}}">ई-पालिका</a>
                <i class="fa fa-angle-double-right"></i>
                <a class="ml-1 text-primary-500">हेल्प डेस्क </a>
            </div>
        </div>
        <div class="text-center mt-5 text-decoration-underline m-4">
            <h5 class="fw-bold">तपशिल सेवा लिन सम्बन्धित ठाउँमा click गर्नुहोस्</h5>
        </div>
        <livewire:helpdesk::help-desk-livewire/>
    </div>
@endsection
