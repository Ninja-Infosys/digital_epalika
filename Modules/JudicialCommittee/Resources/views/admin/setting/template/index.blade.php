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
                        <li class="breadcrumb-item active">टेम्प्लेट सूची</li>
                    </ol>
                </div>
                <h4 class="page-title">टेम्प्लेट</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">टेम्प्लेट सूची</h4>
                        @can('judicialCommitteeTemplate_create')
                            <a href="{{route('admin.judicialCommittee.judicialCommitteeTemplate.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ टेम्प्लेट थप्नुहोस्
                            </a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक </th>
                                <th>बर्ग</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($judicialCommitteeTemplates as $judicialCommitteeTemplate)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$judicialCommitteeTemplate->title}}</td>
                                    <td>{{$judicialCommitteeTemplate->type}}</td>
                                    <td>
                                        @can('judicialCommitteeTemplate_edit')
                                            <a href="{{route('admin.judicialCommittee.judicialCommitteeTemplate.edit',$judicialCommitteeTemplate)}}"
                                               class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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

