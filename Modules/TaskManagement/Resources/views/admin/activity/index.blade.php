@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.taskManagement.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कार्यहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्यहरू </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">कार्यहरू </h4>
                        <div class="d-flex flex-wrap gap-1 align-items-center">
                            @includeIf('inc.filter_form')
                            <a href="{{route('admin.taskManagement.activity.excel.import-page')}}"
                               class="btn btn-sm btn-outline-secondary waves-effect waves-light">
                                <i class="fa fa-file-excel"></i> EXCEL अपलोड</a>
                            <a href="{{route('admin.taskManagement.activity.create')}}"
                               class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>मिति</th>
                                <th>शाखा</th>
                                <th>कार्यहरु</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($activities as $activity)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        {{$activity->date}}
                                    </td>
                                    <td>
                                        {{$activity->branch->branch_name ?? ''}}
                                    </td>
                                    <td>
                                        <ul class="list-group list-group-numbered">
                                            @foreach($activity->activityLists as $list)
                                                <li class="list-group-item">{{$list->title}}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="d-flex gap-1">
                                        @can('taskActivity_access')
                                            <a
                                                href="{{route('admin.taskManagement.activity.show',$activity)}}"
                                                title="हेर्नुहोस"
                                                class="btn btn-xs btn-outline-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('taskActivity_edit')
                                            <a
                                                href="{{route('admin.taskManagement.activity.edit',$activity)}}"
                                                title="सम्पादन गर्नुहोस्"
                                                class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('taskActivity_delete')
                                            <form action="{{route('admin.taskManagement.activity.destroy',$activity)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $activities->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
