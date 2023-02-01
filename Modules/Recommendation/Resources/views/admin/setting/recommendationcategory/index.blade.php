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

                    <li class="breadcrumb-item active">आधरभूत सेटिंग</li>
                </ol>
            </div>
            <h4 class="page-title">आधरभूत सेटिंग</h4>
        </div>
    </div>
</div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सिफारिस प्रकार सूची</h4>
                        @can('branch_create')
                            <a href="{{ route('admin.recommendation.setting.recommendationCategory.create', $type) }}"
                                class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ सिफारिस प्रकार थप्नुहोस
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
                                    @if($type=='recommendationSubCategory')
                                    <th>सिफारिस उप श्रेणी</th>
                                    @endif
                                    <th>सिफारिस</th>
                                    <th>स्थिति</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recommendationCategories as $recommendationCategory)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $recommendationCategory->title ?? '' }}
                                        </td>
                                        @if($type=='recommendationSubCategory')
                                        <td>
                                            {{ $recommendationCategory->recommendationCategory->title ?? '' }}
                                        </td>
                                        @endif
                                        <td>
                                            <a href="{{route('admin.recommendation.setting.recommendationCategory.edit',[$type,$recommendationCategory])}}">
                                                <i class="fa fa-2x  fa-toggle-off"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-outline-warning" href="{{ route('admin.recommendation.setting.recommendationCategory.recommendationTemplate.index', [$type,$recommendationCategory]) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a data-bs-type="edit"
                                                href="{{ route('admin.recommendation.setting.recommendationCategory.edit', [$type,$recommendationCategory]) }}"
                                                class="btn btn-xs btn-outline-warning"
                                                title="फारम सम्पादन गर्नुहोस">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <form
                                                action="{{ route('admin.recommendation.setting.recommendationCategory.destroy', [$type,$recommendationCategory]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                @if(!$recommendationCategory->status)
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endif
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
