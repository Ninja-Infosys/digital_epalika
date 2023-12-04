@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.executiveMeeting.dashboard') }}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">बैठक विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">बैठक विवरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">बैठक विवरण</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('meeting_create')
                                <a href="{{ route('admin.executiveMeeting.meeting.create') }}"
                                    class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>समिति</th>
                                    <th>बैठकको नाम</th>
                                    <th>विवरण</th>
                                    <th>Recurrence</th>
                                    <th>शुरु हुने मिति</th>
                                    <th>अन्त्य मिति</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($meetings as $meeting)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $meeting->committee->committee_name ?? '' }}</td>
                                        <td>{{ $meeting->meeting_name }}</td>
                                        <td>{{ $meeting->description }}</td>
                                        <td>{{ $meeting->recurrence->label() }}</td>
                                        <td>
                                            {{ $meeting->start_date }}
                                        </td>
                                        <td>
                                            {{ $meeting->end_date }}
                                        </td>

                                        <td class="d-flex">
                                            <div class="btn-group dropstart">
                                                <a style="width:75px;" href="{{ route('admin.executiveMeeting.meeting.show', $meeting) }}"
                                                title="विवरण हेर्नुहोस" class="btn btn-sm me-1 btn-primary">
                                                <i class="fa fa-eye"> विवरण </i>
                                            </a>
                                                <button type="button"
                                                    class="btn btn-sm btn-info waves-effect waves-light dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" style="">
                                                    @can('meeting_edit')
                                                        <a href="{{ route('admin.executiveMeeting.meeting.edit', $meeting) }}"
                                                            title="सम्पादन गर्नुहोस्" class="dropdown-item text-warning">
                                                            <i class="fa fa-edit"> सम्पादन गर्नुहोस</i>
                                                        </a>
                                                    @endcan
                                                    @can('meeting_delete')
                                                        <form
                                                            action="{{ route('admin.executiveMeeting.meeting.destroy', $meeting) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button data-bs-type="delete" type="submit"
                                                                class="dropdown-item text-danger show_confirm {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                                title="मेटाउनु होस्">
                                                                <i class="fa fa-trash"> मेटाउनु होस</i>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                    @can('meeting_edit')
                                                        <a href="{{ route('admin.executiveMeeting.meeting.meetingAgenda.index', $meeting) }}"
                                                            title="बैठक एजेन्डा" class="dropdown-item text-secondary">
                                                            <i class="fa fa-file"> बैठक एजेन्डा</i>
                                                        </a>
                                                    @endcan
                                                    @can('meetingDecision_access')
                                                        <a href="{{ route('admin.executiveMeeting.meeting.meetingDecision.index', $meeting) }}"
                                                            title="बैठक निर्णय" class="dropdown-item text-secondary">
                                                            <i class="fa fa-tasks"> बैठक निर्णय</i>
                                                        </a>
                                                    @endcan
                                                    @can('meetingDecision_access')
                                                        <a href="{{ route('admin.executiveMeeting.meeting.meetingMinute.index', $meeting) }}"
                                                            title="माइन्यूट" class="dropdown-item text-secondary">
                                                            <i class="fa fa-file"> माइन्यूट </i>
                                                        </a>
                                                    @endcan
                                                    <a href="javascript:void(0)"
                                                        data-meeting-print-url="{{ route('admin.executiveMeeting.meeting.printMinute', $meeting) }}"
                                                        title="माइन्यूट"
                                                        class="dropdown-item text-secondary showMeetingDetailModal">
                                                        <i class="fa fa-print"> माइन्यूट प्रिन्ट </i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="8">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $meetings->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="meeting-modal" class="modal fade" tabindex="-1" aria-labelledby="meeting-mdal" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-white fw-bold mb-0" id="meeting-modal">
                        बैठक माइन्यूट
                    </h4>
                    <x-print-button target-element="meeting-data" title="बैठक माइन्यूट"
                        btn-class="btn-sm btn-outline-light mx-3" />
                    <button type="button" class="btn-close border" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="meeting-data">

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.showMeetingDetailModal').on('click', function(e) {
                    e.preventDefault()
                    $.ajax({
                        method: "GET",
                        url: $(this).data("meeting-print-url"),
                        success: function(resp) {
                            $('#meeting-modal').modal('toggle')
                            $('#meeting-data').html(resp.view)
                        },
                        error: function() {
                            alert("Something Went Wrong");
                        }
                    });
                })
            })
        </script>
        <script src="{{ asset('assets/backend/js/plugins/footable.min.js') }}"></script>
    @endpush
@endsection
