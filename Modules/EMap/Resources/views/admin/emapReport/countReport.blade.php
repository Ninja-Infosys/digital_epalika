@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title mb-0">नक्सा दर्ता रिपोर्ट</h4>
            <div class="">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item">
                        <a href="{{ route('emap.admin.dashboard') }}">
                            <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                alt="document-icon">
                            गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item active">नक्सा दर्ता रिपोर्ट</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card  p-0">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title">नक्सा दर्ता रिपोर्ट</h4>

                    <button class="btn btn-primary waves-effect waves-light collapsed" type="button"
                        data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false"
                        aria-controls="collapseExample">
                        <i class="fa fa-filter"></i>
                    </button>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="collapse show mb-2" id="collapseFilterForm">
                    <form id="report-filter-form" method="POST">
                        {{-- <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>मिति </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <x-date-input-component nameNe="from_date" labelNe="देखि" nameEn="en_from_date"
                                        labelEn="From Date" :get-today-date="false" />

                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-date-input-component nameNe="to_date" labelNe="सम्म" nameEn="en_to_date"
                                        labelEn="To Date" :get-today-date="false" />
                                </div>
                            </div>
                        </fieldset> --}}

                        <div class="row">
                            <div class="col-md-4">
                                <fieldset class="border p-2 mb-2">
                                    <legend class="font-16 text-info">
                                        <strong>आर्थिक बर्ष </strong>
                                    </legend>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="fiscal_year">आर्थिक बर्ष</label>
                                            <select name="fiscal_year[]" multiple data-toggle="select2" id="fiscal_year"
                                                class="form-control">
                                                <option disabled>--- छान्नुहोस् ---</option>
                                                @foreach ($fiscalYears as $fiscalYear)
                                                <option value="{{ $fiscalYear->id }}">{{ $fiscalYear->title }}
                                                </option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset class="border p-2 mb-2">
                                    <legend class="font-16 text-info">
                                        <strong>महिना</strong>
                                    </legend>

                                    <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="month" class="form-label">महिना</label>
                                        <select name="month" id="month" class="form-select">
                                            <option value="">- - महिना छान्नुहोस् - -</option>
                                            @foreach ($months as $key => $month)
                                                <option value="{{ $key + 1 }}">
                                                    {{ $month }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-4">
                                <fieldset class="border p-2 mb-2">
                                    <legend class="font-16 text-info">
                                        <strong>
                                            वडा नं.
                                        </strong>
                                    </legend>
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <label for="ward_no"> वडा नं.</label>
                                            <select name="ward_no[]" multiple data-toggle="select2" id="ward_no"
                                            class="form-control">
                                            <option disabled>--- छान्नुहोस् ---</option>
                                            @foreach ($officeSetting->localBody->ward_no as $ward)
                                                <option value="{{ $ward }}">{{ $ward }}</option>
                                            @endforeach
                                        </select>

                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                        </div>


                        <button type="submit" id="submitFormBtn" class="btn btn-primary">
                            पेश गर्नुहोस्
                        </button>

                    </form>
                </div>
                <div id="report-table"></div>
            </div>
        </div>
    </div>
</div>
 <div class="row mt-2" id="charts" data-chart-url="{{ route('emap.admin.dashboard.ajax') }}">
        <div class="col-md-6">
            <div class="card">
                <h4>
                    आर्थिक बर्ष 2080/081 अनुसार प्रयोजन
                </h4>
                <div class="card-body">
                    <canvas id="mapApply" chart-type="bar"></canvas>
                </div>

            </div>
        </div>




        <div class="col-md-4">
            <div class="card">
                <h4>चालु आर्थिक बर्षको महिना अनुसारले प्लिन्थ लेभल सम्मको विवरण
                </h4>
                <div class="card-body">
                    <canvas id="mapAccordingToPlinth" chart-type="pie"> </canvas>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h4>चालु आर्थिक बर्षको महिना अनुसारले सुपरस्टर्कचर लेभल सम्मको विवरण
                </h4>
                <div class="card-body">
                    <canvas id="mapAccordingToSuperStructure" chart-type="doughnut"> </canvas>
                </div>

            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <h4>चालु आर्थिक बर्षको महिना अनुसारले निर्माण कार्य सम्पन्न भएका विवरण
                </h4>
                <div class="card-body">
                    <canvas id="mapAccordingToLastStep" chart-type="line"> </canvas>
                </div>

            </div>
        </div>

    </div>
    @push('scripts')
        <script src="{{ asset('assets/backend/js/chart.js') }}"></script>
        <script type="module" src="{{ asset('assets/backend/js/chartInit.js') }}"></script>
    @endpush

@push('scripts')
<script>
    $(document).ready(function() {
                // x-csrf protection
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document.body).delegate('#report-filter-form', 'submit', function(e) {
                    e.preventDefault()
                    $.ajax({
                        type: "post",
                        url: "{{ route('emap.admin.report.count-report-data') }}",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            $("#submitFormBtn").prop('disabled', true);
                            $("#submitFormBtn").html("<i class='fa fa-spinner fa-spin'></i>");
                        },
                        success: function(resp) {
                            $("#submitFormBtn").prop('disabled', false);
                            $("#collapseFilterForm").collapse('hide')
                            $("#submitFormBtn").html("पेश गर्नुहोस्");
                            $('#report-table').html(resp.view)
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            $('#submitFormBtn').prop('disabled', false)
                            $("#submitFormBtn").html("पेश गर्नुहोस्");
                            toastMessage('error', XMLHttpRequest.responseJSON.message)
                        }
                    });
                })

                function toastMessage(type, title) {
                    swal.fire({
                        title: title,
                        toast: true,
                        position: 'top-right',
                        showConfirmButton: false,
                        width: 450,
                        timer: 3000,
                        timerProgressBar: true,
                        icon: type,
                    });
                }
            });
</script>
@endpush
@endsection
