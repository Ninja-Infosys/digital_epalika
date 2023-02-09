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
                            <a href="{{route('admin.organizationRegistration.business.index')}}">व्यवसायको नवीकरण</a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसायको नवीकरणको विवरण </li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसायको नवीकरणको विवरण  </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसायको नवीकरणको सूची</h4>
                        @can('businessNature_create')
                            <a href="{{route('admin.organizationRegistration.business.businessRenew.create',$business)}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> व्यवसायको नवीकरण थप्नुहोस्
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
                                <th>आर्थिक बर्ष:</th>
                                <th>नबिकरण मिति:</th>
                                <th>कायम रहने मिति:</th>
                                <th>रकम:</th>
                                <th>जरिवाना:</th>
                                <th>दस्तुर रसिद नं. /मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businessRenews as $businessRenew)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$businessRenew->fiscalYear->title?? ''}}</td>
                                    <td>{{$businessRenew->business_renew_date}}</td>
                                    <td>{{$businessRenew->date_to_be_maintained}}</td>
                                    <td>{{$businessRenew->renew_amount}}</td>
                                    <td>{{$businessRenew->penalty_amount}}</td>
                                    <td>{{$businessRenew->payment_receipt}}/{{$businessRenew->payment_receipt_date}}</td>
                                    <td>
                                        <a href="{{route('admin.organizationRegistration.business.businessRenew.edit',[$business,$businessRenew,])}}"
                                           class="btn btn-xs btn-outline-warning">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
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
                        {{ $businessRenews->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

