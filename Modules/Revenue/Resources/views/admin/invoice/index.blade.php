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
                        <li class="breadcrumb-item active">नक्साहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्साहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                            <h4 class="header-title mb-0">नगदी रसिदहरु सूची</h4>
                            <div class="d-flex flex-wrap align-items-center">
                                @includeIf('inc.filter_form')
                                @can('revenueCategory_create')
                                <a href="{{route('admin.revenue.invoice.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>मिति</th>
                                <th>रसिद नं</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>रकम</th>
                                <th>कैफियत</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($invoices as $key=>$invoice)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$invoice->payment_date ?? ''}}</td>
                                    <td>{{$invoice->invoice_no ?? ''}}</td>
                                    <td>{{$invoice->name ?? ''}}</td>
                                    <td>{{$invoice->address ?? ''}}</td>
                                    <td>{{$invoice->invoice_particulars_sum_total ?? ''}}</td>
                                    <td>{{$invoice->remarks ?? ''}}</td>
                                    <td>
                                        @can('taxPayerType_access')
                                            <a
                                                href="{{route('admin.revenue.invoice.show',[$invoice])}}"
                                                class="btn btn-xs btn-outline-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('taxPayerType_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.revenue.invoice.edit',[$invoice])}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('taxPayerType_delete')
                                            <form
                                                action="{{route('admin.revenue.invoice.destroy',[$invoice])}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$invoices->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
