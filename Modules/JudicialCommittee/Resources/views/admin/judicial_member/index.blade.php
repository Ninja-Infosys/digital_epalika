@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">न्यायिक समिति विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">न्यायिक समिति विवरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">न्यायिक समिति विवरण सूची</h4>
                        @can('judicialMember_create')
                            <a href="{{route('admin.judicialCommittee.judicialMember.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>पद</th>
                                <th>सम्पर्क नं.</th>
                                <th>ठेगाना</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($judicialMembers as $judicialMember)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="table-user">
                                        <img src="{{$judicialMember->photo_url}}" class="me-2 rounded-circle" alt="">
                                        {{$judicialMember->name}}
                                    </td>
                                    <td>{{$judicialMember->designation->title??''}}</td>
                                    <td>{{$judicialMember->phone}}</td>
                                    <td>
                                        {{$judicialMember->localBody->local_body??''}} - {{$judicialMember->ward_no}}
                                        , {{$judicialMember->district->district??''}}
                                        , {{$judicialMember->province->province??''}}
                                    </td>
                                    <td>
                                        <a href="{{route('admin.judicialCommittee.judicialMember.updateStatus',$judicialMember)}}">
                                            <i class="fa fa-2x {{$judicialMember->is_active ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger'}}"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @can('judicialMember_edit')
                                            <a href="{{route('admin.judicialCommittee.judicialMember.edit',$judicialMember)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('judicialMember_delete')
                                            <form
                                                action="{{route('admin.judicialCommittee.judicialMember.destroy',$judicialMember)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
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
                </div>
            </div>
        </div>
    </div>
@endsection
