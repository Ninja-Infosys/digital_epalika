@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grant.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title"> कृषक रिपोर्ट </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कृषक रिपोर्ट</h4>
                        <button class="btn btn-primary waves-effect waves-light collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false"
                                aria-controls="collapseExample">
                            <i class="fa fa-filter"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="collapse show mb-2" id="collapseFilterForm" style="">
                        <form id="report-filter-form" method="POST">
                            <div class="row">
                                    <div class="col-md-3 mb-2">
                                        <label for="ward_no" class="form-label">
                                            वडा नं.</label>
                                        <select name="ward_no[]" multiple data-toggle="select2"
                                                id="ward_no" class="form-select">
                                            <option disabled>--- छान्नुहोस् ---</option>
                                            @foreach($officeSetting->localBody->ward_no as $ward )
                                                <option value="{{$ward}}">{{$ward}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                <div class="col-md-3 mb-2">
                                    <label for="gender" class="form-label">लिंग</label>
                                    <select id="gender" name="gender" class="form-select">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach(\App\Enums\Gender::cases() as $gender)
                                            <option
                                                {{$gender->value==old('gender') ? 'selected' : ''}}
                                                value="{{$gender->value}}">{{$gender->label()}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="marital_status" class="form-label">बैबाहिक अवस्था </label>
                                    <select id="marital_status" name="marital_status" class="form-select">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach(\App\Enums\MaritalStatusEnum::cases() as $marital_status)
                                            <option
                                                value="{{$marital_status->value}}" {{$marital_status->value==old('marital_status') ? 'selected' : ''}}>
                                                {{$marital_status->label()}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <fieldset>
                                    <legend><h4 class="text-info">संलग्नता ?</h4></legend>
                                    <h6 class="py-2"> नोट: कुनै समूह, सहकारी वा उद्यममा संलग्न भएमा ।</h6>
                                    <div class="row">
                                        <div class="col-md-4 mb-2">
                                            <label for="cooperatives" class="form-label">
                                                सहकारी</label>
                                            <select name="cooperatives[]" multiple data-toggle="select2"
                                                    id="cooperatives" class="form-control">
                                                <option disabled>--- छान्नुहोस् ---</option>
                                                @foreach($cooperatives as $cooperative)
                                                    <option value="{{$cooperative->id}}">{{$cooperative->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('cooperatives')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="groups" class="form-label">
                                                समूह</label>
                                            <select name="groups[]" multiple data-toggle="select2"
                                                    id="groups" class="form-control">
                                                <option disabled>--- छान्नुहोस् ---</option>
                                                @foreach($groups as $group)
                                                    <option value="{{$group->id}}">{{$group->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('groups')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-2">
                                            <label for="enterprises" class="form-label">
                                                उद्यम</label>
                                            <select name="enterprises[]" multiple data-toggle="select2"
                                                    id="enterprises" class="form-control">
                                                <option disabled>--- छान्नुहोस् ---</option>
                                                @foreach($enterprises as $enterprise)
                                                    <option value="{{$enterprise->id}}">{{$enterprise->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('enterprises')
                                            <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset>
                                    <legend class="font-16 text-info">
                                        <strong>
                                            Columns
                                        </strong>
                                    </legend>
                                    <div class="row">
                                        @foreach($columnData as $columns)
                                            <div class="col-md-3 mb-2">
                                                <label for="column.{{$columns['table_name']}}">{{$columns['name']}}</label>
                                                <select name="columns[{{$columns['table_name']}}][]"
                                                        id="column.{{$columns['table_name']}}" multiple
                                                        data-toggle="select2"
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
                            </div>
                            <button type="submit" id="submitFormBtn" class="btn btn-primary mt-1">
                                पेश गर्नुहोस्
                            </button>
                        </form>
                    </div>
                    <div id="report-table"></div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                // x-csrf protection
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document.body).delegate('#report-filter-form', 'submit', function (e) {
                    e.preventDefault()
                    $.ajax({
                        type: "post",
                        url: "{{route('admin.grant.report.farmer.report-data')}}",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        beforeSend: function () {
                            $("#submitFormBtn").prop('disabled', true);
                            $("#submitFormBtn").html("<i class='fa fa-spinner fa-spin'></i>");
                        },
                        success: function (resp) {
                            $("#submitFormBtn").prop('disabled', false);
                            $("#collapseFilterForm").collapse('hide')
                            $("#submitFormBtn").html("पेश गर्नुहोस्");
                            $('#report-table').html(resp.view)
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
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
