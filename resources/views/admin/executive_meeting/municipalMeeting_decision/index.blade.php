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
                        <li class="breadcrumb-item active">पालिका बैठक निर्णयहरु </li>
                    </ol>
                </div>
                <h4 class="page-title">निर्णयहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">पालिका बैठक निर्णयहरु </h4>
                        @can('municipalMeeting_access')
                            <a href="{{route('admin.executiveMeeting.municipalMeetingDecision.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ निर्णयहरु थप्नुहोस्
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
                                <th>बैठक नाम</th>
                                <th>मिति</th>
                                <th>बैठकको बिषय </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($municipalMeetingDecisions as $municipalMeetingDecision)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$municipalMeetingDecision->meetingDetail->meeting_subject??''}}</td>
                                    <td>{{$municipalMeetingDecision->date ? $municipalMeetingDecision->date->toDateString():'' }}</td>
                                    <td>{{$municipalMeetingDecision->subject}}</td>

                                    <td>
                                        @can('municipalMeeting_edit')
                                            <a data-bs-type="edit" href="{{route('admin.executiveMeeting.municipalMeetingDecision.edit',$municipalMeetingDecision)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('municipalMeeting_delete')
                                            <form action="{{route('admin.executiveMeeting.municipalMeetingDecision.destroy',$municipalMeetingDecision)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
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

