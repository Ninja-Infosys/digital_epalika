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
                        <li class="breadcrumb-item active"> सिफारिस विवरण </li>
                    </ol>
                </div>
                <h4 class="page-title"> सिफारिस विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0"> सिफारिस विवरण सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @can('recommendationCategory_create')
                                <a href="{{ route('admin.recommendation.setting.recommendationDetail.create') }}"
                                   class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus-circle"></i> नयाँ सिफारिस थप्नुहोस
                                </a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>शिर्षक</th>
                            <th>स्थिति</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($recommendationDetails as $recommendationDetail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>  {{$recommendationDetail->title}}</td>
                                <td>

                                    <a data-bs-type="edit" class="{{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                       href="{{ route('admin.recommendation.setting.recommendationDetail.updateStatus',  $recommendationDetail) }}">
                                        <i
                                            class="fa fa-2x {{ $recommendationDetail->status ? 'fa-toggle-on ' : ' fa-toggle-off' }}"></i>
                                    </a>
                                </td>
                                <td class="d-flex gap-1">

                                    @can('recommendationCategory_edit')
                                        <a data-bs-type="edit"
                                           href="{{ route('admin.recommendation.setting.recommendationDetail.edit',  $recommendationDetail) }}"
                                           class="btn btn-xs btn-outline-success  {{get_setting('Pin')?'confirm_pin':''}}"
                                           title="फारम सम्पादन गर्नुहोस">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                    @endcan
                                        @can('recommendationCategory_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.setting.recommendationDetail.show',  $recommendationDetail) }}"
                                               class="btn btn-xs btn-outline-warning  {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="टेम्प्लेट सेट गर्नुहोस">
                                                <i class="fa {{$recommendationDetail->content != null ? 'fa-check' : 'fa-times'}}"></i>
                                            </a>
                                        @endcan
                                    @can('recommendationCategory_delete')
                                        <form
                                            action="{{ route('admin.recommendation.setting.recommendationDetail.destroy', $recommendationDetail) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete"
                                                    class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                    title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
