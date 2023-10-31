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
                            <a href="{{route('admin.businessRegistration.setting.businessPurpose.index')}}">उदेश्य </a>
                        </li>
                        <li class="breadcrumb-item active">उदेश्य</li>
                    </ol>
                </div>
                <h4 class="page-title">उदेश्य </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">उदेश्य सूची</h4>
                        @can('businessPurpose_create')
                            <a href="{{route('admin.businessRegistration.setting.businessPurpose.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ उदेश्य थप्नुहोस्
                            </a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-2">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businessPurposes as $businessPurpose)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$businessPurpose->title}}</td>
                                    <td>
                                        @can('businessPurpose_edit')
                                            <a data-bs-type="edit" href="{{route('admin.businessRegistration.setting.businessPurpose.edit',$businessPurpose)}}"
                                               class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan

                                        <form
                                            action="{{route('admin.businessRegistration.setting.businessPurpose.destroy',$businessPurpose)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            @can('businessPurpose_delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
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
                    <div class="mt-2">
                        {{ $businessPurposes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

