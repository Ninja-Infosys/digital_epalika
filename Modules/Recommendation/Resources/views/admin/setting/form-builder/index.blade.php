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

                        <li class="breadcrumb-item active"> सेटिंग</li>
                    </ol>
                </div>
                <h4 class="page-title">सेटिंग</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">फारम बिल्डर सूची</h4>
                        @can('branch_create')
                            <a href="{{ route('admin.recommendation.setting.formBuilder.create',$applicationTypeEnum) }}"
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
                                <th>फारम बिल्डर नाम</th>
                                <th>स्थिति</th>
                                <th>सिर्जना गरियो</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($formBuilders as $formBuilder)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $formBuilder->title?? '' }}</td>
                                    <td>
                                        @can('formBuilder_access')
                                        <a href="{{route('admin.recommendation.setting.formBuilder.updateStatus',[$applicationTypeEnum,$formBuilder])}}">
                                            <i class="fa fa-2x  {{$formBuilder->status === 1 ? 'fa-toggle-on':'fa-toggle-off'}}"></i>
                                        </a>
                                        @endcan
                                    </td>
                                    <td>
                                        <x-ad-to-bs id="fb_{{$loop->iteration}}" adDate="{{$formBuilder->created_at->toDateString()}}" />
                                    </td>
                                    <td>

                                        @can('formBuilder_access')
                                            <a href="{{ route('admin.recommendation.setting.formBuilder.show', [$applicationTypeEnum,$formBuilder]) }}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('formBuilder_edit')
                                            <a href="{{ route('admin.recommendation.setting.formBuilder.edit', [$applicationTypeEnum,$formBuilder]) }}"
                                               class="btn btn-xs btn-outline-info">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('formBuilder_delete')
                                            <form
                                                action="{{ route('admin.recommendation.setting.formBuilder.destroy', [$applicationTypeEnum,$formBuilder]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                @if($formBuilder->status===0)
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                                @endif
                                            </form>
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
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">टेम्प्लेट सूची</h4>
                        @can('eMapTemplate_create')
                            <a href="{{route('admin.recommendation.setting.recommendationTemplate.create',$applicationTypeEnum)}}"
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
                                <th>बर्ग</th>
                                <th>स्थिति</th>
                                <th>Date</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($recommendationTemplates as $recommendationTemplate )
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$recommendationTemplate->title ??''}}</td>
                                    <td>{{$recommendationTemplate->application_type->label() ??''}}</td>
                                    <td>
                                        @can('recommendationTemplate_access')
                                            <a href="{{route('admin.recommendation.setting.recommendationTemplate.updateStatus',[$applicationTypeEnum,$recommendationTemplate])}}">
                                                <i class="fa fa-2x  {{$recommendationTemplate->status === 1 ? 'fa-toggle-on':'fa-toggle-off'}}"></i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        <x-ad-to-bs id="fb1_{{$loop->iteration}}" adDate="{{$recommendationTemplate->created_at->toDateString()}}" />
                                    </td>
                                    <td>
                                        @can('recommendationTemplate_edit')
                                            <a href="{{route('admin.recommendation.setting.recommendationTemplate.edit',[ $applicationTypeEnum,$recommendationTemplate])}}"
                                               class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                            <form
                                                action="{{ route('admin.recommendation.setting.recommendationTemplate.destroy', [$applicationTypeEnum,$recommendationTemplate]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                @if($recommendationTemplate->status===0)
                                                    @can('recommendationTemplate_delete')
                                                    <button class="btn btn-xs btn-outline-danger show_confirm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    @endcan
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
