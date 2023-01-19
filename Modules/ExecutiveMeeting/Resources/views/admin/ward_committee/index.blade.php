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
                            <a href="{{route('admin.executiveMeeting.municipalCommittee.index')}}">इ-कार्यपालिका</a>
                        </li>
                        <li class="breadcrumb-item active">वडा समिति</li>
                    </ol>
                </div>
                <h4 class="page-title">वडा समिति</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> वडा समिति सूची</h4>
                            @can('executiveWardCommittee_create')
                            <a href="{{route('admin.executiveMeeting.wardCommittee.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ वडा समिति थप्नुहोस्
                            </a>
                        @endcan
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
                                <th>फोटो</th>
                                <th>पद</th>
                                <th>फोन नम्बर </th>
                                <th>इमेल </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($wardCommittees as $wardCommittee)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$wardCommittee->name}}</td>
                                    <td class="table-user">
                                        <img src="{{$wardCommittee->photo_url}}" class="me-2 rounded-circle" alt="">
                                    </td>
                                    <td>{{$wardCommittee->designation}}</td>
                                    <td>{{$wardCommittee->phone}}</td>
                                    <td>{{$wardCommittee->email}}</td>

                                    <td>
                                        @can('executiveWardCommittee_edit')
                                        <a data-bs-type="edit" href="{{route('admin.executiveMeeting.wardCommittee.edit',$wardCommittee)}}"
                                        title="सम्पादन गर्नुहोस्" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan
                                    @can('executiveWardCommittee_delete')
                                        <form action="{{route('admin.executiveMeeting.wardCommittee.destroy',$wardCommittee)}}"
                                        method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete" type="submit" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $wardCommittees->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
