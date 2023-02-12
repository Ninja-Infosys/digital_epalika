@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.recommendation.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.recommendation.setting.recommendationCategory.recommendationTemplate.index', [$type,$recommendationCategory])}}"> टेम्प्लेट</a>
                        </li>
                        <li class="breadcrumb-item active">टेम्प्लेट</li>
                    </ol>
                </div>
                <h4 class="page-title">टेम्प्लेट</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">टेम्प्लेट सूची</h4>
                        @can('recommendationTemplate_create')
                            <a href="{{route('admin.recommendation.setting.recommendationCategory.recommendationTemplate.create', [$type,$recommendationCategory])}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ टेम्प्लेट थप्नुहोस्
                            </a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक </th>
                                <th>स्थिति</th>
                                <th>मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recommendationTemplates as $recommendationTemplate)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$recommendationTemplate->title ?? ''}}</td>

                                    <td>
                                        @can('recommendationTemplate_access')
                                        <a data-bs-type="edit" href="{{route('admin.recommendation.setting.recommendationTemplate.updateStatus',[$type,$recommendationTemplate])}}">
                                            <i class="fa fa-2x  {{$recommendationTemplate->is_active  ? 'fa-toggle-on':'fa-toggle-off'}} {{get_setting('Pin')?'confirm_pin':''}}"></i>
                                        </a>
                                    @endcan
                                    </td>
                                    <td>
                                        <x-ad-to-bs id="fb_{{$loop->iteration}}" adDate="{{$recommendationTemplate->created_at->toDateString()}}" />
                                    </td>
                                    <td>
                                        @can('recommendationTemplate_edit')
                                            <a data-bs-type="edit" href="{{route('admin.recommendation.setting.recommendationCategory.recommendationTemplate.edit',[$type,$recommendationCategory,$recommendationTemplate])}}"
                                               class="btn btn-xs btn-outline-warning{{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        <form
                                        action="{{ route('admin.recommendation.setting.recommendationCategory.recommendationTemplate.destroy', [$type,$recommendationCategory,$recommendationTemplate]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        @if(!$recommendationCategory->status)
                                        <button data-bs-type="delete" class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        @endif
                                    </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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

