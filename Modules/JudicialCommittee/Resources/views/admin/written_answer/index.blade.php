@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">लिखित जवाफ</li>
                    </ol>
                </div>
                <h4 class="page-title">लिखित जवाफ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">लिखित जवाफ सूची</h4>
                        @can('writtenAnswer_create')
                            <a href="{{route('admin.judicialCommittee.complaintApplication.writtenAnswer.create',$complaintApplication)}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>पेश मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($complaintApplication->writtenAnswers as $writtenAnswer)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$writtenAnswer->submitted_date}}</td>
                                    <td>
                                        @can('writtenAnswer_access')
                                            <a data-bs-type="edit" href="{{route('admin.judicialCommittee.complaintApplication.writtenAnswer.show',[$complaintApplication,$writtenAnswer])}}"
                                               title="विवरण हेर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('writtenAnswer_edit')
                                            <a data-bs-type="edit" href="{{route('admin.judicialCommittee.complaintApplication.writtenAnswer.edit',[$complaintApplication,$writtenAnswer])}}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
