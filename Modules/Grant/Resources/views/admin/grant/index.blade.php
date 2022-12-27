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
                        <li class="breadcrumb-item active">कार्यक्रम/क्रियाकलाप</li>
                    </ol>
                </div>
                <h4 class="page-title">जारी भएका कार्यक्रम/क्रियाकलापहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कार्यक्रम/क्रियाकलापहरुको विवरण </h4>
                        @can('grant_create')
                            <a href="{{route('admin.grant.grant.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>आ.व.</th>
                                <th>अनुदान दिने सस्था</th>
                                <th>अनुदानको कार्यक्रमको नाम</th>
                                <th>अनुदानको प्रकार</th>
                                <th>शाखा</th>
                                <th>अनुदान रकम</th>
                                <th>अनुदान लागि</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grants as $grant)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$grant->fiscalYear->title??''}}</td>
                                    <td>{{$grant->grantOffice->office_name??''}}</td>
                                    <td>{{$grant->grantProgram->name??''}}</td>
                                    <td>{{$grant->grantType->title??''}}</td>
                                    <td>{{$grant->branch->branch_name??''}}</td>
                                    <td>{{$grant->grant_amount}}</td>
                                    <td>
                                        <ul>
                                            @foreach($grant->grant_for_data as $grant_for)
                                                <li>
                                                    {{\Modules\Grant\Enums\GranteeEnum::tryFrom($grant_for)->label()}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @can('grant_edit')
                                            <a href="{{route('admin.grant.grant.edit', $grant)}}"
                                               class="btn btn-xs btn-outline-primary" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('grant_delete')
                                            <form
                                                action="{{route('admin.grant.grant.destroy', $grant)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm"
                                                        title=" मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $grants->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
