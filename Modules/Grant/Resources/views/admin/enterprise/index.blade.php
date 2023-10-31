@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">निजि उधम/फर्म</li>
                    </ol>
                </div>
                <h4 class="page-title">निजि उधम/फर्म</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0"> निजि उधम/फर्महरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('enterprise_access')
                                <a href="{{route('admin.grant.enterprise.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>निजि उधम/फर्म परिचय पत्र नं. </th>
                                <th>निजि उधम/फर्मको नाम </th>
                                <th>निजि उधम/फर्मको प्रकार </th>
                                <th>पाना/भ्याट</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($enterprises as $enterprise)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{$enterprise->unique_id}}</td>
                                    <td>{{$enterprise->name}}</td>
                                    <td>{{$enterprise->enterpriseType->title ?? ''}}</td>
                                    <td>{{$enterprise->vat_pan}}</td>
                                    <td>
                                        <a data-bs-type="edit" href="{{route('admin.grant.enterprise.show', $enterprise)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="विवरण हेर्नुहोस">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a data-bs-type="edit" href="{{route('admin.grant.enterprise.edit', $enterprise)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.grant.enterprise.destroy', $enterprise)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
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
                        {{ $enterprises->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
