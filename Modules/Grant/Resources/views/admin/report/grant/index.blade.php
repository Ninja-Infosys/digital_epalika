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
                <h4 class="page-title"> अनुदान रिपोर्ट </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">अनुदान रिपोर्ट</h4>
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
                                    <select name="ward_no[]" multiple data-toggle="select2" id="ward_no"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($officeSetting->localBody->ward_no as $ward)
                                            <option value="{{ $ward }}">{{ $ward }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="fiscal_year_id" class="form-label">
                                        आर्थिक वर्ष</label>
                                    <select name="fiscal_year_id" multiple data-toggle="select2" id="fiscal_year_id"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>

                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="grant_type_id" class="form-label">
                                        अनुदानको प्रकार</label>
                                    <select name="grant_type_id" multiple data-toggle="select2" id="grant_type_id"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>

                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="grant_for" class="form-label">
                                        अनुदानग्राहीको प्रकार</label>
                                    <select name="grant_for" multiple data-toggle="select2" id="grant_for"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>

                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="is_new" class="form-label">
                                        नयाँ / निरन्तर</label>
                                    <select name="is_new" multiple data-toggle="select2" id="is_new"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>

                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="grant_program_id" class="form-label">
                                        अनुदान कार्यक्रमको नाम</label>
                                    <select name="grant_program_id" multiple data-toggle="select2" id="grant_program_id"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>

                                    </select>
                                </div>
                                <div class="col-md-3 mb-2">
                                    <label for="grant_office_id" class="form-label">
                                        अनुदान दिने संस्था</label>
                                    <select name="grant_office_id" multiple data-toggle="select2" id="grant_office_id"
                                        class="form-select">
                                        <option disabled>--- छान्नुहोस् ---</option>

                                    </select>
                                </div>

                                <fieldset>
                                    <legend class="font-16 text-info">
                                        <strong>
                                            Columns
                                        </strong>
                                    </legend>
                                    <div class="row">
                                        @foreach ($columnData as $columns)
                                            <div class="col-md-3 mb-2">
                                                <label
                                                    for="column.{{ $columns['table_name'] }}">{{ $columns['name'] }}</label>
                                                <select name="columns[{{ $columns['table_name'] }}][]"
                                                    id="column.{{ $columns['table_name'] }}" multiple data-toggle="select2"
                                                    class="form-control">
                                                    <option disabled>--- छान्नुहोस् ---</option>
                                                    @foreach ($columns['columns'] as $column)
                                                        <option value="{{ $column['column'] ?? '' }}">
                                                            {{ $column['name'] ?? '' }}</option>
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
                </div>
                <div id="report-table"></div>
            </div>

        </div>
    </div>
@endsection
