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
                            <a href="">निर्णयहरु </a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ निर्णयहरु थप्नुहोस्</li>
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
                        <h4 class="header-title">नयाँ निर्णयहरु थप्नुहोस्</h4>
                        @can('wardMeeting_access')
                            <a href="{{route('admin.executiveMeeting.wardMeetingDecision.create')}}"
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
                            @forelse($wardMeetingDecisions as $wardMeetingDecision)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$wardMeetingDecision->meetingDetail->meeting_subject??''}}</td>
                                    <td>{{$wardMeetingDecision->date ? $wardMeetingDecision->date->toDateString():'' }}</td>
                                    <td>{{$wardMeetingDecision->subject}}</td>

                                    <td>
                                        @can('wardMeeting_edit')
                                            <a data-bs-type="edit" href="{{route('admin.executiveMeeting.wardMeetingDecision.edit',$wardMeetingDecision)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('wardMeeting_delete')
                                            <form action="{{route('admin.executiveMeeting.wardMeetingDecision.destroy',$wardMeetingDecision)}}"
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

