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
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.recommendation.recommendation.create', $applicationTypeEnum) }}">
                                <i class="fa fa-home"></i> सिफारिस
                            </a>
                        </li>

                        <li class="breadcrumb-item active">{{ $applicationTypeEnum->label() }}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ $applicationTypeEnum->label() }}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{ $applicationTypeEnum->label() }} सूची</h4>
                        @can('branch_create')
                            <a href="{{ route('admin.recommendation.recommendation.create', $applicationTypeEnum) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
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
                                <th>नाम</th>
                                <th>मिति</th>
                                <th>आर्थिक वर्ष</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($recommendations as $recommendation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{$recommendation->name ?? ''}}
                                    </td>
                                    <td>
                                        {{$recommendation->date_ne ?? ''}}
                                    </td>
                                    <td>
                                        {{$recommendation->fiscalYear->title ?? ''}}
                                    </td>
                                    <td>
                                        @can('recommendation_access')
                                            <a data-bs-type="edit" href="{{ route('admin.recommendation.recommendation.show', [$applicationTypeEnum, $recommendation]) }}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="भरेको फारम हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('recommendation_edit')
                                            <a data-bs-type="edit" href="{{ route('admin.recommendation.recommendation.edit', [$applicationTypeEnum, $recommendation]) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}" title="फारम सम्पादन गर्नुहोस">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        @endcan
                                        @can('recommendation_access')
                                            <a data-bs-type="edit" href="{{ route('admin.recommendation.recommendation.print',$recommendation) }}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}" title="प्रिन्ट गर्नुहोस">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        @endcan
                                        @can('recommendation_delete')
                                            <form
                                                action="{{ route('admin.recommendation.recommendation.destroy', [$applicationTypeEnum, $recommendation]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$recommendations->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
