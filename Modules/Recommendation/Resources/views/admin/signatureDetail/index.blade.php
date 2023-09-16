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

                        <li class="breadcrumb-item active">हस्ताक्षर </li>
                    </ol>
                </div>
                <h4 class="page-title">हस्ताक्षर </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">हस्ताक्षर 
                            सूची</h4>
                        @can('recommendationCategory_create')
                            <a href="{{ route('admin.recommendation.sipharish.signature.create') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i>
                                नयाँ हस्ताक्षर   थप्नुहोस
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                    <th>पुरा नाम</th>
                                    <th>पद</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($signatureDetails as $signatureDetail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $signatureDetail->full_name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $signatureDetail->position ?? '' }}
                                    </td>
                                    <td>
                                        @can('recommendationCategory_access')
                                            <a data-bs-type="edit" class="{{get_setting('Pin')?'confirm_pin':''}}" href="{{route('admin.recommendation.sipharish.signature.updateStatus',[$signatureDetail])}}">
                                                <i class="fa fa-2x {{ $signatureDetail->status == 'active' ? 'fa-toggle-on ':' fa-toggle-off'}}"></i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('recommendationCategory_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.recommendation.sipharish.signature.edit', [$signatureDetail]) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}"
                                               title="फारम सम्पादन गर्नुहोस">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        @endcan
                                        <form
                                            action="{{ route('admin.recommendation.setting.recommendationCategory.destroy', ['sss',$signatureDetail]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            @can('recommendationCategory_delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
