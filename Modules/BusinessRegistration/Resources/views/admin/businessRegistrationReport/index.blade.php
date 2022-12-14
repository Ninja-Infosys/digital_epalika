@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href=""> व्यवसाय दर्ता रिपोर्ट </a>
                        </li>
                        <li class="breadcrumb-item active"> व्यवसाय दर्ता रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title"> व्यवसाय दर्ता रिपोर्ट </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय दर्ता रिपोर्ट</h4>

                        <button class="btn btn-primary waves-effect waves-light collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="collapse show" id="collapseFilterForm" style="">
                    <div class="card-body">
                        <form id="report-filter-form" method="POST">
                            <fieldset class="border p-2 mb-2">
                                <legend class="font-16 text-info">
                                    <strong>मिति </strong>
                                </legend>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <x-date-input-component
                                            nameNe="from_date" labelNe="देखि"
                                            nameEn="en_from_date" labelEn="From Date"
                                            :get-today-date="false"
                                        />

                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <x-date-input-component
                                            nameNe="to_date" labelNe="सम्म"
                                            nameEn="en_to_date" labelEn="To Date"
                                            :get-today-date="false"
                                        />
                                    </div>
                                </div>
                            </fieldset>
                            <div class="row">
                                <div class="col-md-4">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>आर्थिक बर्ष </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="fiscal_year">आर्थिक बर्ष</label>
                                                <select name="fiscal_year[]" multiple data-toggle="select2"
                                                        id="fiscal_year" class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach($fiscalYears as $fiscalYear)
                                                        <option value="{{$fiscalYear->id}}">{{$fiscalYear->title}}</option>
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
                                                व्यवसाय प्रकृति
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="business_nature">व्यवसाय प्रकृति अनुसार</label>
                                                <select name="business_nature[]" multiple data-toggle="select2"
                                                        id="business_nature"
                                                        class="form-control">
                                                    <option disabled> --- छान्नुहोस् ---</option>
                                                    @foreach(\Modules\BusinessRegistration\Enums\BusinessNature::cases() as $businessNature)
                                                        <option
                                                            value="{{$businessNature->value}}">{{$businessNature->label()}}</option>
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
                                                दर्ता र नविकरण
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="registration_renewal">दर्ता र नविकरण अनुसार</label>
                                                <select name="registration_renewal[]" id="registration_renewal" multiple
                                                        data-toggle="select2"
                                                        class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach(\Modules\BusinessRegistration\Enums\BusinessTypeEnum::cases() as $businessTypeEnum)
                                                        <option
                                                            value="{{$businessTypeEnum->value}}">{{$businessTypeEnum->label()}}</option>
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
                                                उदेश्य
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="business_purpose">उदेश्य अनुसार</label>
                                                <select name="business_purpose[]" multiple data-toggle="select2"
                                                        id="business_purpose" class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach($businessPurposes as $businessPurpose)
                                                        <option
                                                            value="{{$businessPurpose->id}}">{{$businessPurpose->title}}</option>
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
                                                कारोबार वस्तु
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="object_transaction">कारोबार वस्तु अनुसार</label>
                                                <select name="object_transaction[]"
                                                        multiple data-toggle="select2"
                                                        id="object_transaction" class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach($objectTransactions as $objectTransaction)
                                                        <option
                                                            value="{{$objectTransaction->id}}">{{$objectTransaction->title}}</option>
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
                                                पुँजीगत लगानी र राजस्वो
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="investment_revenue">पुँजीगत लगानी र राजस्वो</label>
                                                <select name="investment_revenue[]" id="investment_revenue" multiple
                                                        data-toggle="select2"
                                                        class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach($investmentRevenues as $investmentRevenue)
                                                        <option
                                                            value="{{$investmentRevenue->id}}">{{$investmentRevenue->title}}
                                                            ({{$investmentRevenue->registration_amount}})
                                                        </option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>
                                                लगानी
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="investment.from">देखि</label>
                                                <input type="number" name="investment[from]"
                                                       value="{{old('investment.from',$investmentData['from'])}}"
                                                       id="investment.from" class="form-control" placeholder="लगानी अनुसार">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="investment.to">सम्म</label>
                                                <input type="number" name="investment[to]"
                                                       value="{{old('investment.to',$investmentData['to'])}}"
                                                       id="investment.to" class="form-control" placeholder="लगानी अनुसार">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>
                                                रोजगार संख्या
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="employment.from">देखि</label>
                                                <input type="number" name="employment[from]"
                                                       value="{{old('employment.from',$employmentData['from'])}}"
                                                       id="employment.from" class="form-control" placeholder="लगानी अनुसार">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="employment.to">सम्म</label>
                                                <input type="number" name="employment[to]"
                                                       value="{{old('employment.to',$employmentData['to'])}}"
                                                       id="employment.to" class="form-control" placeholder="लगानी अनुसार">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>
                                                परिचय पाटी
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="introBoard.from">देखि</label>
                                                <input type="number" name="introBoard[from]"
                                                       value="{{old('introBoard.from',$introBoardData['from'])}}"
                                                       id="introBoard.from" class="form-control" placeholder="लगानी अनुसार">
                                            </div>

                                            <div class="col-md-6 mb-2">
                                                <label for="introBoard.to">सम्म</label>
                                                <input type="number" name="introBoard[to]"
                                                       value="{{old('introBoard.to',$introBoardData['to'])}}"
                                                       id="introBoard.to" class="form-control" placeholder="लगानी अनुसार">
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-6">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>
                                                व्यवसाय स्थापना साल
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-12 mb-2">
                                                <label for="business_year">साल</label>
                                                <select name="business_year[]" id="business_year" multiple
                                                        data-toggle="select2"
                                                        class="form-control">
                                                    <option disabled> --- छान्नुहोस् ---</option>
                                                    @foreach($businessYears as $year)
                                                        <option value="{{$year}}">{{$year}}</option>
                                                    @endforeach
                                                </select>

                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>


{{--                            <fieldset class="border p-2 mb-2">--}}
{{--                                <legend class="font-16 text-info">--}}
{{--                                    <strong>--}}
{{--                                        Columns--}}
{{--                                    </strong>--}}
{{--                                </legend>--}}
{{--                                <div class="row">--}}
{{--                                    @foreach($columnData as $columns)--}}
{{--                                        <div class="col-md-6 mb-2">--}}
{{--                                            <label for="column.{{$columns['table_name']}}">{{$columns['name']}}</label>--}}
{{--                                            <select name="columns[{{$columns['table_name']}}][]" id="column.{{$columns['table_name']}}" multiple data-toggle="select2"--}}
{{--                                                    class="form-control">--}}
{{--                                                <option disabled>--- छान्नुहोस् ---</option>--}}
{{--                                                @foreach($columns['columns'] as $column)--}}
{{--                                                    <option--}}
{{--                                                        value="{{$column['column'] ?? ''}}">{{$column['name'] ?? ''}}</option>--}}
{{--                                                @endforeach--}}
{{--                                            </select>--}}

{{--                                        </div>--}}
{{--                                    @endforeach--}}

{{--                                </div>--}}
{{--                            </fieldset>--}}

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
                            $("#submitFormBtn").html("Filter");
                            toastMessage('error',XMLHttpRequest.responseJSON.message)
                        }
                    });
                })

                function toastMessage(type,title){
                    swal.fire({
                        title: title,
                        toast:true,
                        position:'top-right',
                        showConfirmButton:false,
                        width:450,
                        timer:3000,
                        timerProgressBar:true,
                        icon: type,
                    });
                }
            });
        </script>
    @endpush
@endsection
