@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">जातियता विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">जातियता विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">जातियताहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('ethnicity_create')
                                <a href="{{route('admin.generalSetting.ethnicity.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>जातियता</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($ethnicities as $ethnicity)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$ethnicity->title}}</td>
                                    <td>
                                        @can('ethnicity_edit')
                                            <a data-bs-type="edit" href="{{route('admin.generalSetting.ethnicity.edit', $ethnicity)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('ethnicity_delete')
                                            <form action="{{route('admin.generalSetting.ethnicity.destroy', $ethnicity)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">जातियतामा कुनै डाटा उपलब्ध छैन !!!</td>
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
