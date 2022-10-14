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
                        <li class="breadcrumb-item active">पालिका समिति</li>
                    </ol>
                </div>
                <h4 class="page-title">पालिका समिति</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> पालिका समिति सूची</h4>
                        @can('executiveCommittee_create')
                            <a href="{{route('admin.executiveMeeting.municipalCommittee.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ पालिका समिति थप्नुहोस्
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
                                <th>नाम</th>
                                <th>फोटो</th>
                                <th>पद</th>
                                <th>फोन नम्बर </th>
                                <th>इमेल </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($municipalCommittees as $municipalCommittee)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$municipalCommittee->name}}</td>
                                    <td class="table-user">
                                        <img src="{{$municipalCommittee->photo_url}}" class="me-2 rounded-circle" alt="">
                                    </td>
                                    <td>{{$municipalCommittee->designation}}</td>
                                    <td>{{$municipalCommittee->phone}}</td>
                                    <td>{{$municipalCommittee->email}}</td>

                                    <td>
                                        @can('executiveCommittee_edit')
                                            <a href="{{route('admin.executiveMeeting.municipalCommittee.edit',$municipalCommittee)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('executiveCommittee_delete')
                                            <form action="{{route('admin.executiveMeeting.municipalCommittee.destroy',$municipalCommittee)}}"
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
                                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
