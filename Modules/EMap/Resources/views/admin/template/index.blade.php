@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('emap.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('emap.admin.eMapTemplate.index',$noticeTypeEnum)}}"> टेम्प्लेट</a>
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
                        @can('eMapTemplate_create')
                            <a href="{{route('emap.admin.eMapTemplate.create',$noticeTypeEnum)}}"
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
                                <th>मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($eMapTemplates as $eMapTemplate)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$eMapTemplate->title}}</td>
                                    <td>{{$eMapTemplate->for->label() ??''}}</td>
                                    <td>
                                        @can('eMapTemplate_access')
                                            <a href="{{route('emap.admin.eMapTemplate.updateStatus',[$noticeTypeEnum,$eMapTemplate])}}">
                                                <i class="fa fa-2x  {{$eMapTemplate->status ? 'fa-toggle-on':'fa-toggle-off'}}"></i>
                                            </a>
                                        @endcan
                                    </td>
                                    <td>
                                        <x-ad-to-bs id="fbs_{{$loop->iteration}}" adDate="{{$eMapTemplate->created_at->toDateString()}}" />

                                    </td>
                                    <td>
                                        @can('eMapTemplate_edit')
                                            <a data-bs-type="edit" href="{{route('emap.admin.eMapTemplate.edit',[$noticeTypeEnum,$eMapTemplate])}}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan

                                        <form action="{{route('emap.admin.eMapTemplate.destroy',[$noticeTypeEnum,$eMapTemplate])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            @can('eMapTemplate_delete')
                                                @if($eMapTemplate->status==0)
                                                    <button data-bs-type="delete" class="btn btn-xs btn-outline-danger show_confirm">
                                                        <i class="fa fa-trash {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"></i> मेटाउनु होस्
                                                    </button>
                                                @endif
                                            @endcan
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

