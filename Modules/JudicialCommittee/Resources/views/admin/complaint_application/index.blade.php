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

                        <li class="breadcrumb-item active">निवेदन फारम</li>
                    </ol>
                </div>
                <h4 class="page-title">निवेदन फारम</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">उजुरी फारम सूची</h4>
                        @can('complaintApplication_create')
                            <a href="{{route('admin.judicialCommittee.complaintApplication.create')}}"
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
                                <th>सबमिशन नं.</th>
                                <th>निवेदकको पुरा नाम</th>
                                <th>प्रतिवादीको पुरा नाम</th>
                                <th>मिति</th>
                                <th>विषय</th>
                                <th>मुद्दा प्रकृति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($complaintApplications as $complaintApplication)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$complaintApplication->submission_no}}</td>
                                    <td>{{$complaintApplication->complainant_name}}</td>
                                    <td>{{$complaintApplication->defendant_name}}</td>
                                    <td>{{$complaintApplication->date}}</td>
                                    <td>{{$complaintApplication->subject}}</td>
                                    <td>
                                        {{$complaintApplication->lawsuitNature->title??''}}
                                    </td>
                                    <td>
                                        @can('complaintApplication_access')
                                            <a href="{{route('admin.judicialCommittee.complaintApplication.show',$complaintApplication)}}"
                                               title="विवरण हेर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('complaintApplication_edit')
                                            <a href="{{route('admin.judicialCommittee.complaintApplication.edit',$complaintApplication)}}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('complaintApplication_delete')
                                            <form
                                                action="{{route('admin.judicialCommittee.complaintApplication.destroy',$complaintApplication)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
