@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.plan.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> योजना रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title"> योजना रिपोर्ट </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">योजना रिपोर्ट</h4>

                        <button class="btn btn-primary waves-effect waves-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="collapseFilterForm" style="">
                    <div class="card-body">
                        <form id="report-filter-form" method="POST">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component
                                        nameNe="from_date" labelNe="मिति देखि"
                                        nameEn="en_from_date" labelEn="From Date"
                                        :get-today-date="false"
                                    />
                                </div>
                                <div class="col-md-3">
                                    <x-date-input-component
                                        nameNe="to_date" labelNe="मिति सम्म"
                                        nameEn="en_to_date" labelEn="To Date"
                                        :get-today-date="false"
                                    />
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="fiscal_year">आर्थिक बर्ष</label>
                                    <select name="fiscal_year[]" multiple data-toggle="select2"
                                            id="fiscal_year" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach($fiscalYears as $fiscalYear)
                                            <option value="{{$fiscalYear->id}}">{{$fiscalYear->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="ward_no">वडा नं.</label>
                                    <select name="ward_no[]" multiple data-toggle="select2"
                                            id="ward_no" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach($officeSetting->localBody->ward_no as $ward)
                                            <option value="{{$ward}}">{{$ward}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <fieldset class="border p-2 mb-2">
                                <legend class="font-16 text-info">
                                    <strong>
                                        Columns
                                    </strong>
                                </legend>
                                <div class="row">
                                    @foreach($columnData as $columns)
                                        <div class="col-md-3 mb-2">
                                            <label for="column.{{$columns['table_name']}}">{{$columns['name']}}</label>
                                            <select name="columns[{{$columns['table_name']}}][]" id="column.{{$columns['table_name']}}" multiple data-toggle="select2"
                                                    class="form-control">
                                                <option disabled>--- छान्नुहोस् ---</option>
                                                @foreach($columns['columns'] as $column)
                                                    <option
                                                        value="{{$column['column'] ?? ''}}">{{$column['name'] ?? ''}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    @endforeach

                                </div>
                            </fieldset>

                            <button type="submit" id="submitFormBtn" class="btn btn-primary">
                                Filter
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> व्यवसाय दर्ता रिपोर्ट</h4>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fa fa-print"></i>
                            Print
                        </a>
                    </div>
                </div>
                <div class="card-body" id="report-table">

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                // x-csrf protection
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document.body).delegate('#report-filter-form','submit',function (e){
                    e.preventDefault()
                    $.ajax({
                        type:"post",
                        url:"{{route('admin.businessRegistration.report.report-data')}}",
                        data:new FormData(this),
                        processData: false,
                        contentType: false,
                        beforeSend:function(){
                            $("#submitFormBtn").prop('disabled',true);
                            $("#submitFormBtn").html("<i class='fa fa-spinner fa-spin'></i>");
                        },
                        success:function(resp){
                            $("#submitFormBtn").prop('disabled',false);
                            $("#collapseFilterForm").collapse('hide')
                            $("#submitFormBtn").html("Filter");
                            $('#report-table').html(resp.view)
                        },
                        error:function(XMLHttpRequest, textStatus, errorThrown){
                            $('#submitFormBtn').prop('disabled',false)
                            if(XMLHttpRequest.status===422){
                                $.each(XMLHttpRequest.responseJSON.errors,function(prefix,value){
                                    $('span.'+prefix+'-error').text(value);
                                });
                            }
                            else{
                                alert("Something Went Wrong");
                            }
                        }
                    });
                })
            });
        </script>
    @endpush
@endsection
