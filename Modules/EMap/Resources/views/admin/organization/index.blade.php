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
                        <li class="breadcrumb-item active">संगठन</li>
                    </ol>
                </div>
                <h4 class="page-title">संगठनहरु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">संगठन सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>इमेल</th>
                                <th>फोन</th>
                                <th>संगठनको नाम</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($organizations as $organization)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$organization->name}}</td>
                                    <td>{{$organization->email}}</td>
                                    <td>{{$organization->phone}}</td>
                                    <td>{{$organization->organizationDetail->org_name_ne ?? ''}}</td>
                                    <td>
                                        @can('organization_edit')
                                            <a href="{{route('emap.admin.organization.update-login-status',$organization)}}"
                                               class="btn btn-xs btn-outline-{{$organization->is_active==1 ?'primary':'danger'}}"
                                               title="लग इन {{$organization->is_active==1 ?'गर्न मिल्छ':'गर्न मिल्दैन'}}">
                                                <i class="fa  {{$organization->is_active==1 ?' fa-check':'fa-window-close'}}"></i>
                                            </a>
                                        @endcan
                                        @can('organization_access')
                                            <a href="{{route('emap.admin.organization.show',$organization)}}"
                                               title="हेर्नुहोस्" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('organization_edit')
                                            <a href="{{route('emap.admin.organization.edit',$organization)}}"
                                               title="सम्पादन गर्नुहोस्" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('organization_delete')
                                            <form action="{{route('emap.admin.organization.destroy',$organization)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
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
                        {{ $organizations->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

