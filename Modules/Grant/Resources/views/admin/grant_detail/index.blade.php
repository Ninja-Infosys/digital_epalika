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
                            <a href="{{route('admin.grant.grantDetail.index')}}">अनुदान विवरण</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">जारी भएका अनुदानहरु</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">जारी भएका अनुदानहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('grantDetail_create')
                                <a href="{{route('admin.grant.grantDetail.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th class="text-center">क्र.सं</th>
                                <th class="text-center">कार्यक्रम/क्रियाकलाप</th>
                                <th class="text-center">अनुदानग्राही नाम</th>
                                <th class="text-center"> अनुदानग्राही लगानी</th>
                                <th class="text-center">नयाँ/निरन्तर</th>
                                <th class="text-center">योजना स्थल</th>
                                <th class="text-center">सम्पर्क नम्बर</th>
                                <th class="text-center">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grantDetails as $grantDetail)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$grantDetail->grant->grantProgram->name??''}} ({{$grantDetail->grant->fiscalYear->title??''}})</td>
                                    <td class="text-center">{{$grantDetail->model->name ?? ''}}</td>
                                    <td>{{$grantDetail->personal_investment}}</td>
                                    <td>{{$grantDetail->is_old ? 'निरन्तरता': 'नयाँ'}}</td>
                                    <td class="text-center">{{$grantDetail->localBody->local_body ?? ''}} - {{$grantDetail->ward_no}}</td>
                                    <td>{{$grantDetail->contact}}</td>
                                    <td class="d-flex gap-1">
                                        @can('grantDetail_edit')
                                            <a data-bs-type="edit" href="{{route('admin.grant.grantDetail.edit', $grantDetail)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('grantDetail_access')
                                            <a data-bs-type="edit" href="{{route('admin.grant.grantDetail.show', $grantDetail)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="हेर्नुहोस्">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('grantDetail_delete')
                                            <form
                                                action="{{route('admin.grant.grantDetail.destroy', $grantDetail)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
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
                    </div>
                    <div class="mt-2">
                        {{ $grantDetails->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


