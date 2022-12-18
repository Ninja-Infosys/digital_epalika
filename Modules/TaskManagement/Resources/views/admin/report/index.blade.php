@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.taskManagement.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title">रिपोर्ट</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">दैनिक कार्य रिपोर्ट</h4>

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
                                <div class="col-md-5">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>
                                                मिति
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <x-date-input-component
                                                    nameNe="from_date" labelNe="मिति देखि"
                                                    nameEn="en_from_date" labelEn="From Date"
                                                    :get-today-date="false"
                                                />
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <x-date-input-component
                                                    nameNe="to_date" labelNe="मिति सम्म"
                                                    nameEn="en_to_date" labelEn="To Date"
                                                    :get-today-date="false"
                                                />
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-7">
                                    <fieldset class="border p-2 mb-2">
                                        <legend class="font-16 text-info">
                                            <strong>
                                                शाखा
                                            </strong>
                                        </legend>
                                        <div class="row">
                                            <div class="col-md-6 mb-2">
                                                <label for="branch_id">शाखा</label>
                                                <select name="branch_id[]" multiple data-toggle="select2"
                                                        id="branch_id" class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach($branches as $branch)
                                                        <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-2">
                                                <label for="sub_branch_id">उप शाखा</label>
                                                <select name="sub_branch_id[]" multiple data-toggle="select2"
                                                        id="sub_branch_id" class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                </select>
                                            </div>
                                        </div>
                                    </fieldset>
                                </div>
                                <div class="col-md-4 mb-2">
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

    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
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
                        url: "{{route('admin.plan.report.report-data')}}",
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

                $(document.body).delegate('#branch_id', 'change', function (e) {
                    let branch_id = $('#branch_id').val()
                    $('#sub_branch_id').html('<option disabled>--- छान्नुहोस् ---</option>')
                    if (!branch_id.length) {
                        return false;
                    }
                    $.ajax({
                        type: 'get',
                        data: {branch_id: branch_id},
                        url: "{{route('admin.subBranch')}}",
                        success: function (resp) {
                            $(resp.data).each(function (key, data) {
                                $('#sub_branch_id').append("<option value=" + data.id + ">" + data.branch_name + "</option>")
                            })
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            toastMessage('error', XMLHttpRequest.responseJSON.message)
                        }
                    })
                })

                $(document.body).delegate('#plan_level_id', 'change', function (e) {
                    let plan_level_id = $('#plan_level_id').val()
                    $('#plan_sub_level_id').html('<option disabled>--- छान्नुहोस् ---</option>')
                    if (!plan_level_id.length) {
                        return false;
                    }
                    $.ajax({
                        type: 'get',
                        data: {plan_level_id: plan_level_id},
                        url: "{{route('admin.plan.planSubLevel')}}",
                        success: function (resp) {
                            $(resp.data).each(function (key, data) {
                                $('#plan_sub_level_id').append("<option value=" + data.id + ">" + data.level_name + "</option>")
                            })
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            toastMessage('error', XMLHttpRequest.responseJSON.message)
                        }
                    })
                })

                $(document.body).delegate('#budget_head_id', 'change', function (e) {
                    let budget_head_id = $('#budget_head_id').val()
                    $('#budget_sub_head_id').html('<option disabled>--- छान्नुहोस् ---</option>')
                    if (!budget_head_id.length) {
                        return false;
                    }
                    $.ajax({
                        type: 'get',
                        data: {budget_head_id: budget_head_id},
                        url: "{{route('admin.plan.budgetSubHead')}}",
                        success: function (resp) {
                            $(resp.data).each(function (key, data) {
                                $('#budget_sub_head_id').append("<option value=" + data.id + ">" + data.title + "</option>")
                            })
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            toastMessage('error', XMLHttpRequest.responseJSON.message)
                        }
                    })
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
