@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active"> अनुदान विवरणहरु  </li>
                    </ol>
                </div>
                <h4 class="page-title"> अनुदान विवरणहरु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> अनुदान विवरण सूची</h4>
                        @can('grantDetail_create')
                            <a href="{{route('admin.grant.grantDetail.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
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
                                <th>आर्थिक वर्ष</th>
                                <th>अनुदानग्राहीको नाम</th>
                                <th>अनुदान रकम</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grantDetails as $grantDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <th>{{$grantDetail->title}}</th>
                                    <td>
                                        @can('grantDetail_edit')
                                            <a href="{{route('admin.grant.grantDetail.edit',$grantDetail)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('grantDetail_delete')
                                            <form action="{{route('admin.grant.grantDetail.destroy',$grantDetail)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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

