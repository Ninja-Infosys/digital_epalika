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
                            <a href="{{route('admin.businessRegistration.setting.objectTransaction.index')}}">व्यवसाय को
                                प्रकृति </a>
                        </li>
                        <li class="breadcrumb-item active">कारोबार गर्ने वस्तु</li>
                    </ol>
                </div>
                <h4 class="page-title">कारोबार गर्ने वस्तु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कारोबार गर्ने वस्तु सूची</h4>

                        @can('objectTransaction_create')
                            <a href="{{route('admin.businessRegistration.setting.objectTransaction.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ वकारोबार गर्ने वस्तु थप्नुहोस्
                            </a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>कारोबार गर्ने वस्तुको वर्ग</th>
                                <th>शिर्षक</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($objectTransactions as $objectTransaction)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$objectTransaction->objectTransaction->title ?? ''}}</td>
                                    <td>{{$objectTransaction->title}}</td>
                                    <td>
                                        @can('objectTransaction_edit')
                                            <a href="{{route('admin.businessRegistration.setting.objectTransaction.edit',$objectTransaction)}}"
                                               class="btn btn-xs btn-outline-warning">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        <form
                                            action="{{route('admin.businessRegistration.setting.objectTransaction.destroy',$objectTransaction)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            @can('objectTransaction_delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
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
                </div>
            </div>
        </div>
    </div>
@endsection

