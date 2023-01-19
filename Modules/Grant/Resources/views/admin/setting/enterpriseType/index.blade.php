@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.setting.enterpriseType.index')}}">उद्यम प्रकार</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">उद्यम प्रकार विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">उद्यम प्रकार सूची</h4>
                        @can('enterpriseType_create')
                            <a href="{{route('admin.grant.setting.enterpriseType.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>क्र.सं</th>
                                <th>शीर्षक</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($enterpriseTypes as $type)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$type->title}}</td>
                                    <td>
                                        @can('enterpriseType_edit')
                                            <a data-bs-type="edit" href="{{route('admin.grant.setting.enterpriseType.edit', $type)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('enterpriseType_delete')
                                            <form
                                                action="{{route('admin.grant.setting.enterpriseType.destroy', $type)}}"
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
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $enterpriseTypes->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


