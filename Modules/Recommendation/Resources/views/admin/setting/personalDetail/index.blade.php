@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title mb-0">व्यक्तिगत विवरण</h4>
            <div class="">
                <ol class="breadcrumb mb-2">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.recommendation.dashboard') }}" class="d-flex align-items-center">
                            <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item active">व्यक्तिगत विवरण</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card rounded-3">
            <div class="">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="header-title mb-0">व्यक्तिगत विवरण सूची</h4>
                    <div class="d-flex flex-wrap align-items-center">
                        @includeIf('inc.filter_form')
                        @can('personalDetail_delete')
                        <button class="btn btn-md btn-outline-primary">
                            <a href="{{ route('admin.recommendation.setting.personalDetail.create') }}" style="text-decoration: none; color: inherit;">
                                <i class="fa fa-plus-circle"></i> नयाँ व्यक्तिगत विवरण थप्नुहोस
                            </a>
                        </button>
                        @endcan
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <div class="table-responsive">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>दर्ता नं</th>
                                <th>नाम</th>
                                <th>नागरिकता नं</th>
                                <th>सम्पर्क नं</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($personalDetails as $personalDetail)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $personalDetail->reg_no }}</td>
                                <td>
                                    {{ $personalDetail->name }}
                                </td>
                                <td>{{ $personalDetail->citizenship_no }}</td>
                                <td>{{ $personalDetail->phone_no }}</td>
                                <td>
                                    @can('personalDetail_edit')
                                    <a data-bs-type="edit" href="{{ route('admin.recommendation.setting.personalDetail.edit', $personalDetail) }}" class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}" title="फारम सम्पादन गर्नुहोस">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    @endcan
                                    @can('personalDetail_access')
                                    <a data-bs-type="edit" href="{{ route('admin.recommendation.setting.personalDetail.show', $personalDetail) }}" class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}" title="व्यक्तिगत विवरण हेर्नुहोस">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    @endcan
                                    <form action="{{ route('admin.recommendation.setting.personalDetail.destroy',$personalDetail) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        @can('personalDetail_delete')
                                        <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
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
                    {{$personalDetails->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection