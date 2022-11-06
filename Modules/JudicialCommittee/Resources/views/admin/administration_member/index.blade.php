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

                        <li class="breadcrumb-item active"> प्रशासन सदस्य</li>
                    </ol>
                </div>
                <h4 class="page-title"> प्रशासन सदस्य</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> प्रशासन सदस्य सूची</h4>
                        @can('administrationMember_create')
                            <a href="{{route('admin.judicialCommittee.administrationMember.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
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
                                <th>नाम </th>
                                <th>पद </th>
                                <th>फोन </th>
                                <th>रातो हस्ताक्षर  </th>
                                <th>कालो हस्ताक्षर </th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($administrationMembers as $administrationMember)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img src="{{$administrationMember->photo_url}}" height="40" width="40" class="me-2 rounded-circle"
                                             alt="">
                                        {{$administrationMember->name}}</td>
                                    <td>{{$administrationMember->designation->title}}</td>
                                    <td>{{$administrationMember->phone}}</td>
                                    <td><img src="{{$administrationMember->red_signature_url}}" width="60" height="60" alt=""></td>
                                    <td><img src="{{$administrationMember->black_signature_url}}" width="60" height="60" alt=""></td>
                                    <td>
                                        <a href="{{route('admin.judicialCommittee.administrationMember.updateStatus',$administrationMember)}}">
                                            <i class="fa fa-2x {{$administrationMember->is_active ? 'fa-toggle-on text-success' : 'fa-toggle-off text-danger'}}"></i>
                                        </a>
                                    </td>
                                    <td>
                                        @can('administrationMember_edit')
                                            <a href="{{route('admin.judicialCommittee.administrationMember.edit',$administrationMember)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('administrationMember_delete')
                                            <form
                                                action="{{route('admin.judicialCommittee.administrationMember.destroy',$administrationMember)}}"
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
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
