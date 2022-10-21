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
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3">
                            <button class="btn btn-lg font-16 btn-primary w-100" id="btn-new-event"><i class="mdi mdi-plus-circle-outline"></i> Create New Event</button>

                            <div id="external-events">
                                <br>
                                <p class="text-muted">तपाईंको घटना तान्नुहोस् र छोड्नुहोस् वा पात्रोमा क्लिक गर्नुहोस्</p>
                                <div class="external-event bg-success" data-class="bg-success">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>
                                    New Theme Release
                                </div>
                                <div class="external-event bg-info" data-class="bg-info">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>My Event
                                </div>
                                <div class="external-event bg-warning" data-class="bg-warning">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Meet manager
                                </div>
                                <div class="external-event bg-danger" data-class="bg-danger">
                                    <i class="mdi mdi-checkbox-blank-circle me-2 vertical-middle"></i>Create New theme
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-lg-9">
                            <div id="calendar"></div>
                        </div> <!-- end col -->
                    </div>
                    <div class="modal fade" id="event-modal" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header py-3 px-4 border-bottom-0 d-block">
                                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                                    <h5 class="modal-title" id="modal-title">Event</h5>
                                </div>
                                <div class="modal-body px-4 pb-4 pt-0">
                                    <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Event Name</label>
                                                    <input class="form-control" placeholder="Insert Event Name"
                                                           type="text" name="title" id="event-title" required />
                                                    <div class="invalid-feedback">Please provide a valid event name</div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Category</label>
                                                    <select class="form-select" name="className" id="event-class" required>
                                                        @foreach(\App\Enums\BackgroundEnum::cases() as $backgroundEnum)
                                                        <option value="{{$backgroundEnum->value}}">{{$backgroundEnum->label()}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="invalid-feedback">Please select a valid event category</div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">सुरू मिति</label>
                                                        <input class="form-control" type="date" name="title" id="event-start-date" required />
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">अन्त्य मिति</label>
                                                        <input class="form-control" type="date" name="title" id="event-end-date" required />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-4">
                                                <button type="button" class="btn btn-danger" id="btn-delete-event">Delete</button>
                                            </div>
                                            <div class="col-md-6 col-8 text-end">
                                                <button type="button" class="btn btn-light me-1" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end modal-content-->
                        </div> <!-- end modal dialog-->
                    </div>
                </div> <!-- end card body-->
            </div> <!-- end card -->


        </div>
        <!-- end col-12 -->
    </div>

    @push('style')
        <link href="{{asset('assets/backend/libs/fullcalendar/main.min.css')}}" rel="stylesheet" type="text/css"/>
    @endpush

    @push('scripts')
        <!-- plugin js -->
        <script src="{{asset('assets/backend/libs/moment/min/moment.min.js')}}"></script>
        <script src="{{asset('assets/backend/libs/fullcalendar/main.min.js')}}"></script>

        <!-- Calendar init -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                const modal = new bootstrap.Modal(document.getElementById('event-modal'));
                const calendarEl = document.getElementById('calendar');
                const calendar = new FullCalendar.Calendar(calendarEl, {
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,dayGridWeek,dayGridDay,dayGrid'
                    },
                    initialView: 'dayGridMonth',
                    selectable: true,
                    droppable: true,
                    editable: true,
                    dayMaxEvents: true,
                    events: "{{route('admin.executiveMeeting.event.index')}}",

                    dateClick: function (event) {

                    },
                    select: function (event) {
                        document.getElementById('event-start-date').value =  event.startStr;
                        document.getElementById('event-end-date').value =  event.endStr;
                        modal.show();
                    },
                    drop: function (event) {
                        alert('a day has been dropped!' + event.startStr + ' to ' + event.endStr);
                    },
                });

                $('#form-event').submit(()=>{
                        const title = document.getElementById('event-title').value;
                        const eventClass = document.getElementById('event-class').value;

                        const start = document.getElementById('event-start-date').value;
                        const end = document.getElementById('event-end-date').value;
                        console.log(title + eventClass + start + end);
                        if (title) {
                            console.log('ok');
                            $.ajax({
                                url: "{{route('admin.executiveMeeting.event.store')}}",
                                data: {
                                    title: title,
                                    className: eventClass,
                                    start: start,
                                    end: end
                                },
                                type: "POST",
                                success: function (data) {
                                    console.log(data);
                                    calendar.addEvent({
                                        id: data.id,
                                        title: data.title,
                                        start: data.start,
                                        end: data.end,
                                        allDay: true
                                    })
                                }
                            });
                        }
                })

                calendar.render();
            });
        </script>
    @endpush
@endsection
