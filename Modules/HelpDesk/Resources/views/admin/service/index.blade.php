@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.helpDesk.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">सेवा</li>
                    </ol>
                </div>
                <h4 class="page-title">सेवा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">सेवाहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('branch_create')
                                <a href="{{route('admin.helpDesk.service.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>सेवा नाम</th>
                                <th>शाखा</th>
                                <th>जिम्मेवार अधिकारी</th>
                                <th>कोठा नम्बर/कार्यालय </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($services as $key=>$service)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$service->service_name}}</td>
                                    <td>{{$service->branch->branch_name??''}}</td>
                                    <td>{{$service->responsible_officer}}</td>
                                    <td>{{$service->office}}</td>
                                    <td>
                                        <a href="{{route('admin.helpDesk.service.serviceEmployee.index',$service)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-plus-circle"></i> कर्मचारी
                                        </a>
                                        <a data-bs-type="edit" href="{{route('admin.helpDesk.service.show',$service)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-eye"></i> थप हेर्नुहोस्
                                        </a>
                                        <a data-bs-type="edit" href="{{route('admin.helpDesk.service.edit',$service)}}"
                                           class="btn btn-xs btn-outline-warning {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <form action="{{route('admin.helpDesk.service.destroy',$service)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete" class="btn btn-xs btn-outline-danger  {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
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
                    <div class="mt-2">
                        {{ $services->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
