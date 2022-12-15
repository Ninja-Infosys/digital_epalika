@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.executiveMeeting.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">आगामी बैठकहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">आगामी बैठकहरू</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> आगामी बैठकहरू</h4>
                        @can($event_for . 'MeetingEvent_create')
                            <a href="{{ route('admin.executiveMeeting.meetingEvent.create', $event_for) }}"
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
                                <th>विवरण</th>
                                <th>Recurrence</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($meetingEvents as $meetingEvent)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$meetingEvent->event_name}}</td>
                                    <td>{{$meetingEvent->description}}</td>
                                    <td>{{$meetingEvent->recurrence->label()}}</td>
                                    <td>{{$meetingEvent->start_date}}({{$meetingEvent->en_start_date?->toDateString()}})</td>
                                    <td>{{$meetingEvent->end_date}}({{$meetingEvent->en_end_date?->toDateString()}})</td>

                                    <td width="90">
                                        @can($event_for . 'MeetingEvent_edit')
                                            <a href="{{ route('admin.executiveMeeting.meetingEvent.edit', [$event_for, $meetingEvent]) }}"
                                                title="सम्पादन गर्नुहोस्" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can($event_for . 'MeetingEvent_delete')
                                            <form
                                                action="{{ route('admin.executiveMeeting.meetingEvent.destroy', [$event_for, $meetingEvent]) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-xs btn-outline-danger show_confirm"
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
                        {{$meetingEvents->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
