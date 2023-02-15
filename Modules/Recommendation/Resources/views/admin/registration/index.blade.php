@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.setting.dashboard') }}">
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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सिफारिस सूची</h4>
                        @can('recommendation_create')
                            <a href="{{ route('admin.recommendation.registrationDetail.create') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ सिफारिस थप्नुहोस
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>दर्ता नं</th>
                                <th>नाम</th>
                                <th>सिफारिस</th>
                                <th>मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($registrationDetails as $registrationDetail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $registrationDetail->registration_no }}</td>
                                    <td>{{ $registrationDetail->personalDetail->name??'' }}</td>
                                    <td>
                                        {{ $registrationDetail->recommendationCategory->title??'' }}
                                    </td>
                                    <td>{{ $registrationDetail->date_ne }}</td>
                                    <td>
                                        <a type="button" class="btn btn-xs btn-outline-warning" data-bs-toggle="modal"
                                           data-bs-target="#staticBackdrop">
                                            <i class="fa fa-file"></i>
                                        </a>
                                        @can('recommendation_access')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.registrationDetail.show', $registrationDetail) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('recommendation_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.registrationDetail.edit', $registrationDetail) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="फारम सम्पादन गर्नुहोस">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        @endcan
                                        <form
                                            action="{{ route('admin.recommendation.registrationDetail.destroy',$registrationDetail) }}"
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
                                @includeIf('recommendation::admin.registration.inc.document')
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
