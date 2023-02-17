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
                        <form id="report-filter-form" method="POST"
                              action="{{route('admin.taskManagement.report.report-data')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">

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
                                </div>
                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-6 mb-2">
                                            <label for="branch_id">शाखा</label>
                                            <select name="branch_id[]" multiple data-toggle="select2"
                                                    id="branch_id" class="form-control">
                                                <option disabled>--- छान्नुहोस् ---</option>
                                                @foreach($branches as $branch)
                                                    <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                                    @foreach($branch->branches as $subBranch)
                                                        <option value="{{$subBranch->id}}">
                                                            --- {{$subBranch->branch_name}}</option>
                                                    @endforeach
                                                    <option value="{{$branch->id}}">{{$branch->branch_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-2">
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

                                </div>
                            </div>


                            <button type="submit" id="submitFormBtn" class="btn btn-primary">
                                पेश गर्नुहोस्
                            </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">दैनिक कार्य रिपोर्ट</h4>

                        <x-print-button />
                    </div>
                </div>
                <div class="card-body">

                    @if(!empty($activities))
                        <div id="printData">
                            {!! letterHead() !!}
                            <table id="report-table" class="table table-sm mt-3 table-bordered">
                                <thead>
                                <tr>
                                    <th>क्र.सं.</th>
                                    <th>मिति</th>
                                    <th>कर्मचारीको नाम</th>
                                    <th>शाखा</th>
                                    <th>शिर्षक</th>
                                    <th>विवरण</th>
                                    <th>कैफियत</th>
                                    <th>कैफियत</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($activities as $activity)
                                    <tr>
                                        <td rowspan="{{count($activity['list'])}}">{{$loop->iteration}}</td>
                                        <td rowspan="{{count($activity['list'])}}">{{$activity['date'] ?? ''}}</td>
                                        <td rowspan="{{count($activity['list'])}}">{{$activity['user'] ?? ''}}</td>
                                        <td rowspan="{{count($activity['list'])}}">{{$activity['branch'] ?? ''}}</td>
                                        <td>{{collect($activity['list'])->first()['title'] ?? ''}}</td>
                                        <td>{{collect($activity['list'])->first()['description'] ?? ''}}</td>
                                        <td>{{collect($activity['list'])->first()['remarks'] ?? ''}}</td>
                                        <td rowspan="{{count($activity['list'])}}">{{$activity['remarks'] ?? ''}}</td>
                                    </tr>


                                    @foreach(collect($activity['list'])->skip(1) as $list)
                                        <tr>
                                            <td>{{$list['title'] ?? ''}}</td>
                                            <td>{{$list['description'] ?? ''}}</td>
                                            <td>{{$list['remarks'] ?? ''}}</td>
                                        </tr>

                                    @endforeach
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
