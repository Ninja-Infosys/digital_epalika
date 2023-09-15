@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस</li>
                    </ol>
                </div>
                <h4 class="page-title">सिफारिस</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @error('oc_file')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
            @error('oc_file.*')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="collapse mb-2" id="collapseFilterForm">
                <div class="card">
                    <div class="card-body">
                        
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">सिफारिस सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                            @can('recommendation_create')
                                <a href="{{ route('admin.recommendation.sipharish.form-type.create') }}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus-circle"></i> नयाँ सिफारिस थप्नुहोस
                                </a>
                            @endcan
                            <button class="btn btn-sm mx-1 btn-outline-info waves-effect waves-light collapsed"
                                    type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false"
                                    aria-controls="collapseExample">
                                <i class="fa fa-filter"> फिल्टर</i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>सिफारिस नाम</th>
                                <th>सिफारिस उप-श्रेणी </th>

                                <th>स्थिति </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sipharishFormTypes as $sipharishFormType)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sipharishFormType->title }}</td>
                                    <td>{{ $sipharishFormType->sipharis_sub_category}}</td>

                                    <td>{{ $sipharishFormType->status }}</td>
                                    <td>
                                        <a type="button" class="btn btn-xs btn-outline-info" data-bs-toggle="modal"
                                           data-bs-target="#staticBackdrop">
                                            <i class="fa fa-file"></i>
                                        </a>
                                        @can('recommendation_access')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.recommendationCategory.registrationDetail.show', ['d',$sipharishFormType]) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('recommendation_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.sipharish.form-type.edit',  [$sipharishFormType]) }}"
                                               class="btn btn-xs btn-outline-success  {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="फारम सम्पादन गर्नुहोस">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        @endcan

                                        <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.sipharish.form-fields.create',  [$sipharishFormType->id]) }}"
                                               class="btn btn-xs btn-outline-success  {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="फारम Field थपनुहोश">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        <form
                                            action="{{ route('admin.recommendation.recommendationCategory.registrationDetail.destroy', ['d',$sipharishFormType]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            @can('recommendation_delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
