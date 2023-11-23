@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.revenue.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">करदाताको प्रकार</li>
                    </ol>
                </div>
                <h4 class="page-title">करदाताको प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">करदाताको प्रकार सूची</h4>
                        @can('revenueCategory_create')
                            <a href="{{route('admin.revenue.setting.taxPayerType.create')}}"
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
                                <th>करदाताको प्रकार</th>
                                <th>कोड</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($taxPayerTypes as $key=>$taxPayerType)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$taxPayerType->title}}</td>
                                    <td>{{$taxPayerType->code}}</td>
                                    <td class="d-flex gap-1">
                                        @can('taxPayerType_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.revenue.setting.taxPayerType.edit',[$taxPayerType])}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i> 
                                            </a>
                                        @endcan
                                        @can('taxPayerType_delete')
                                            <form
                                                action="{{route('admin.revenue.setting.taxPayerType.destroy',[$taxPayerType])}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>

                               
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
