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
                            <a href="">सूचना प्रशारण </a>
                        </li>
                        <li class="breadcrumb-item active">सूचना प्रशारण </li>
                    </ol>
                </div>
                <h4 class="page-title">सूचना प्रशारण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> पालिका सूचना प्रशारण सूची</h4>
                        @can('municipalMeeting_access')
                            <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ सूचना प्रशारण थप्नुहोस्
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
                                <th>सूचना प्रसारण मिति</th>
                                <th>प्रकार</th>
                                <th>बैठकको बिषय </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($municipalMeetingDecisions as $municipalMeetingDecision)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$municipalMeetingDecision->municipalMeetingNotice->meeting_subject??''}}</td>

                                    <td>
                                        @can('municipalMeeting_edit')
                                            <a href="{{route('admin.executiveMeeting.municipalMeetingNotice.edit',$municipalMeetingNotice)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('municipalMeeting_delete')
                                            <form action="{{route('admin.executiveMeeting.municipalMeetingNotice.destroy',$municipalMeetingNotice)}}"
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

