@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">नक्शा पास फारम</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्शा पास फारम</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">नक्शा पास फारम सूची</h4>
                        @can('mapFee_create')
                            <a href="{{route('emap.admin.dynamicForm.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($dynamicForms as $dynamicForm)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dynamicForm->title}}</td>
                                    <td>
                                        <a data-bs-type="edit" class="{{get_setting('Pin')?'confirm_pin':''}}"
                                           href="{{route('emap.admin.dynamicForm.updateStatus',$dynamicForm)}}">
                                            <i class="fa fa-2x {{ $dynamicForm->status == 'active' ? 'fa-toggle-on ':' fa-toggle-off'}}"></i>
                                        </a>
                                    </td>
                                    <td>
                                        <a data-bs-type="edit"
                                           href="{{route('emap.admin.dynamicForm.edit',$dynamicForm)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <a
                                           href="{{route('emap.admin.dynamicForm.show',$dynamicForm)}}"
                                           class="btn btn-xs btn-outline-warning ">
                                            <i class="fa fa-eye"></i> हेर्नुहोस
                                        </a>
                                        <form action="{{route('emap.admin.dynamicForm.destroy',$dynamicForm)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete"
                                                    class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"></i>
                                                मेटाउनु होस्
                                            </button>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
