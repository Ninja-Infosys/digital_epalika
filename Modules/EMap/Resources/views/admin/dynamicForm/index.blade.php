@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
            <h4 class="page-title">नक्शा पास फारम</h4>
                <div class="">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">नक्शा पास फारम</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
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
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
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
                                    <td  class="d-flex">
                                        <a data-bs-type="edit"
                                           href="{{route('emap.admin.dynamicForm.edit',$dynamicForm)}}"
                                           class="btn btn-xs me-1 btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a
                                            href="{{route('emap.admin.dynamicForm.template',$dynamicForm)}}"
                                            class="btn btn-xs me-1 btn-outline-secondary">
                                            <i class="fa fa-file"></i>
                                        </a>
                                        <a
                                            href="{{route('emap.admin.dynamicForm.show',$dynamicForm)}}"
                                            class="btn btn-xs me-1 btn-outline-warning ">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <form action="{{route('emap.admin.dynamicForm.destroy',$dynamicForm)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete"
                                                    class="btn btn-xs me-1 btn-outline-danger show_confirm">
                                                <i class="fa fa-trash {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"></i>
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
