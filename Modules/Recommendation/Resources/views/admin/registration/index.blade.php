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
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सिफारिस सूची</h4>
                        @can('branch_create')
                            <a href="{{ route('admin.recommendation.registrationDetail.create') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ सिफारिस थप्नुहोस
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
                                <th>दर्ता नं</th>
                                <th>सिफारिस</th>
                                <th>मिति</th>
                                <th>फोटो</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($registrationDetails as $registrationDetail)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $registrationDetail->registration_no }}</td>
                                    <td>
                                        {{ $registrationDetail->recommendation }}
                                    </td>
                                    <td>{{ $registrationDetail->date_ne }}</td>
                                    <td>
                                        <img src="{{ $registrationDetail->application }}"
                                             alt="{{$registrationDetail->registration_no}}" height="60">
                                    </td>
                                    <td>
                                        <a data-bs-type="edit"
                                           href="{{ route('admin.recommendation.registrationDetail.show', $registrationDetail) }}"
                                           class="btn btn-xs btn-outline-warning"
                                           title="विवरण हेर्नुहोस">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a data-bs-type="edit"
                                           href="{{ route('admin.recommendation.registrationDetail.edit', $registrationDetail) }}"
                                           class="btn btn-xs btn-outline-warning"
                                           title="फारम सम्पादन गर्नुहोस">
                                            <i class="fa fa-pen"></i>
                                        </a>
                                        <form
                                            action="{{ route('admin.recommendation.registrationDetail.destroy',$registrationDetail) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete"
                                                    class="btn btn-xs btn-outline-danger show_confirm"
                                                    title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
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
