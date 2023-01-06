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
                            <a href="{{route('admin.organizationRegistration.business.index')}}">व्यवसायहरू</a>
                        </li>
                        <li class="breadcrumb-item active">सबै दर्ता भएका व्यवसायहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">वसबै दर्ता भएका व्यवसायहरू </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसायहरूको सूची</h4>
                        @can('businessNature_create')
                            <a href="{{route('admin.organizationRegistration.business.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ व्यवसाय थप्नुहोस्
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
                                <th>व्यवसायको नाम:</th>
                                <th>दर्ता नं:</th>
                                <th>दर्ता मिति:</th>
                                <th>ठेगाना:</th>
                                <th>व्यवसायीको नाम:</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businesses as $business)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$business->name}}</td>
                                    <td>{{$business->registration_no}}</td>
                                    <td>{{$business->registration_date}}</td>
                                    <td>{{$business->address}}</td>
                                    <td>{{$business->owner_name}}</td>
                                    <td>{{$business->is_active}}</td>
                                    <td>
                                        @can('business_edit')
                                            <a href="{{route('admin.organizationRegistration.business.edit',$business)}}"
                                               class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        <form
                                            action="{{route('admin.organizationRegistration.business.edit',$business)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            @can('business_delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="8">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $businesses->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

