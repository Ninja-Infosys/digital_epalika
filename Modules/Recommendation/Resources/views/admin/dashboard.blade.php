@extends('admin.layouts.master')
@section('content')
<div class="row mt-2">
    <div class="col-lg-3">
        <div class="d-flex rounded-3 card flex-row align-items-center">
            <div class="avatar-sm d-flex justify-content-center align-items-center rounded-2 me-3">
                <img class="icon" src="http://127.0.0.1:8000/assets/backend/images/document.svg" alt="document-icon">
            </div>
            <div class="d-flex flex-column">
                <p class="text-muted font-15 mb-0">जम्मा सिफारिस</p>
                <h3 class="mt-1 mb-0"><span data-plugin="counterup"> {{$registrationDetailCount}}</span></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="d-flex rounded-3 flex-row card align-items-center">
            <div class="avatar-sm rounded-2 d-flex justify-content-center align-items-center me-3">
            <img class="icon" src="http://127.0.0.1:8000/assets/backend/images/document-today.svg" alt="document-icon">

            </div>
            <div class="d-flex flex-column">
                <p class="text-muted font-15 mb-0 text-truncate">आज दर्ता भएका सिफारिस</p>
                <h3 class="mt-1 mb-0"><span data-plugin="counterup">{{$todayRegistrationDetailCount}}</span></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="d-flex rounded-3 flex-row card align-items-center">
            <div class="avatar-sm rounded-2 d-flex justify-content-center align-items-center me-3">
            <img class="icon" src="http://127.0.0.1:8000/assets/backend/images/totaluser.svg" alt="document-icon">

            </div>
            <div class="d-flex flex-column">
                <p class="text-muted font-15 mb-0">जम्मा व्यक्ति</p>
                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$totalPersonalDetailCount}}</span></h3>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="d-flex rounded-3 flex-row card align-items-center">
            <div class="avatar-sm rounded-2 d-flex justify-content-center align-items-center me-3">
            <img class="icon" src="http://127.0.0.1:8000/assets/backend/images/multiplefiles.svg" alt="document-icon">

            </div>
            <div class="d-flex flex-column">
                <p class="text-muted font-15 mb-0">आर्थिक वर्षमा दर्ता भएका सिफारिस</p>
                <h3 class="mb-0 mt-1"><span data-plugin="counterup">{{$totalYealyRegistrationDetailCount}}</span></h3>
            </div>
        </div>
    </div>
</div>
<div class="row" id="charts" data-chart-url="{{route('admin.recommendation.dashboard')}}">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="wardWiseRegistration" chart-type="column" chart-title="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका वडा अनुसार जम्मा सिफारिस विवरण"></div>
                <div class="loading">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="monthlyWiseRegistration" chart-type="column" chart-title="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका महिना अनुसार जम्मा सिफारिस विवरण"></div>
                <div class="loading">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div id="categoryWise" chart-type="pie" chart-title="चालु आर्थिक ({{ $officeSetting->fiscalYear->title ?? '' }}) वर्षका सिफारिस अनुसार जम्मा सिफारिस विवरण"></div>
                <div class="loading">
                    <div class="d-flex justify-content-center">
                        <div class="spinner-border" role="status"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="{{asset('assets/backend/js/chart/chart.js')}}"></script>
<script src="{{asset('assets/backend/js/chart/chart-export.js')}}"></script>
<script src="{{asset('assets/backend/js/chart/export-data.js')}}"></script>
<script src="{{asset('assets/backend/js/chart/accessibility.js')}}"></script>
<script src="{{asset('assets/backend/js/chart/chart.init.js')}}"></script>
@endpush
@endsection