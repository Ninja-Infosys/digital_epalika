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
                            <a href="{{route('admin.organizationRegistration.institution.index')}}">संस्थाहरू</a>
                        </li>
                        <li class="breadcrumb-item active">सबै दर्ता भएका संस्थाहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">सबै दर्ता भएका संस्थाहरू </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">संस्थाहरूको सूची</h4>
                        <a href="{{route('admin.organizationRegistration.institution.create')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ संस्था थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-2">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>संस्थाको नाम:</th>
                                <th>दर्ता नं:</th>
                                <th>ठेगाना:</th>
                                <th>सम्पर्क नम्बर:</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($institutions as $institution)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$institution->name}}</td>
                                    <td>{{$institution->registration_no}}</td>
                                    <td>{{$institution->institution_address}}</td>
                                    <td>{{$institution->contact_no}}</td>
                                    <td>1</td>
                                    <td>
                                        <a href="{{route('admin.organizationRegistration.business.institution.index',$institution)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-history" aria-hidden="true"></i> नबिकरण गर्नुहोस्
                                        </a>
                                        <a href="{{route('admin.organizationRegistration.institution.edit',$institution)}}"
                                           class="btn btn-xs btn-outline-warning">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <form
                                            action="{{route('admin.organizationRegistration.institution.destroy',$institution)}}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                        </form>
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
                        {{ $institutions->onEachSide(5)->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

