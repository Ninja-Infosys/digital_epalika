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

                        <li class="breadcrumb-item active">फारम बिल्डर</li>
                    </ol>
                </div>
                <h4 class="page-title">फारम बिल्डर</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">फारम बिल्डर सूची</h4>
                        @can('branch_create')
                            <a href="{{ route('admin.recommendation.setting.formBuilder.create') }}"
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
                                    <th>सिफारस</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (\Modules\Recommendation\Enums\ApplicationTypeEnum::cases() as $application)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $application->label() ?? '' }}</td>
                                        <td>
                                            @can('recommendation_access')
                                                <a href="{{ route('admin.recommendation.recommendation.index', $application) }}"
                                                    class="btn btn-xs btn-outline-primary">
                                                    <i class="fa fa-pen"></i> फारम भर्नुहोस्
                                                </a>
                                            @endcan
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
