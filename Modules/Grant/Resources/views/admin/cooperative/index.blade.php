@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.cooperative.index')}}">सहकारी</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">सहकारी विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0"> सहकारी सूची</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('cooperative_create')
                                <a href="{{route('admin.grant.cooperative.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>क्र.सं</th>
                                <th>सहकारी परिचय पत्र नं.</th>
                                <th>दर्ता नं</th>
                                <th>सहकारीको नाम</th>
                                <th>सहकारीको प्रकार</th>
                                <th>पाना/भ्याट</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($cooperatives as $index=>$cooperative)
                                <tr>
                                    <td>{{$index + $cooperatives->firstItem()}}</td>
                                    <td>{{$cooperative->unique_id}}</td>
                                    <td>{{$cooperative->registration_no}}</td>
                                    <td>{{$cooperative->name}}</td>
                                    <td>{{$cooperative->cooperativeType->title??''}}</td>
                                    <td>{{$cooperative->vat_pan}}</td>
                                    <td>
                                            @can('cooperative_access')
                                                <a data-bs-type="edit" href="{{route('admin.grant.cooperative.show', $cooperative)}}"
                                                   class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="हेर्नुहोस्">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            @endcan
                                                @can('cooperative_edit')
                                                    <a data-bs-type="edit" href="{{route('admin.grant.cooperative.edit', $cooperative)}}"
                                                       class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                        @can('cooperative_delete')
                                            <form
                                                action="{{route('admin.grant.cooperative.destroy', $cooperative)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}" title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $cooperatives->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


