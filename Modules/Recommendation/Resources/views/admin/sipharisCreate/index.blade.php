@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box mb-0">
            <h4 class="page-title">सिफारिस</h4>
                <div class="">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.dashboard') }}" class="d-flex align-items-center">
                            <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
 गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सिफारिस</li>
                    </ol>
                </div>
               
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
            <div class="card rounded-3">
                <div class="">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">सिफारिस सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')

                            @can('recommendation_create')
                            <button class="btn btn-md btn-primary btn-outline">
                                <a href="{{ route('admin.recommendation.sipharish.sipharishCreate.create') }}">
                                <img class="icon btn-icon me-1" src="http://127.0.0.1:8000/assets/backend/images/add.svg" alt="add-icon"> नयाँ सिफारिस थप्नुहोस
                                </a>
                            </button>
                            @endcan
                            <button class="btn btn-md mx-1 btn-outline waves-effect waves-light collapsed"
                                    type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseFilterForm" aria-expanded="false"
                                    aria-controls="collapseExample">
                                    <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/filter.svg" alt="filter-icon"> </i> फिल्टर
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>सेवाग्राहीको नाम</th>
                                <th>सिफारिस नाम</th>
                                <th>सिफारिस स्वीकृति</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($sipharishCreates as $sipharish)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $sipharish->personalDetail?->name ?? '' }}</td>
                                    <td>{{ $sipharish->SipharishFormType?->title ?? '' }}</td>
                                    <td>{{ $sipharish->approved_status ?? '' }}</td>

                                    <td>
                                        @can('recommendationCategory_access')
                                            <a data-bs-type="edit" class="{{get_setting('Pin')?'confirm_pin':''}}"
                                               href="{{route('admin.recommendation.sipharish.sipharishCreate.updateStatus',$sipharish)}}">
                                                <i class="fa fa-2x {{ $sipharish->status ? 'fa-toggle-on ':' fa-toggle-off'}}"></i>
                                            </a>
                                        @endcan

                                    </td>
                                    <td>
                                        @can('recommendationCategory_access')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.sipharish.sipharishCreate.show', $sipharish->id) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                       {{-- @can('recommendation_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.sipharish.sipharishCreate.edit',  $sipharish) }}"
                                               class="btn btn-xs btn-outline-success  {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="फारम सम्पादन गर्नुहोस">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        @endcan
                                        @can('recommendation_delete')
                                            <form
                                                action="{{ route('admin.recommendation.sipharish.sipharishCreate.destroy', $sipharish) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan--}}
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
