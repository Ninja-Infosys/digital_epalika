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
                        <div class="col-lg-12">
                            <div id="calendar"
                                 class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap fc-liquid-hack"
                                 style="height: 755px;">

                            </div>
                        </div> <!-- end col -->

                    </div>  <!-- end row -->
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
                // var calendar = $('#calendar').fullCalendar({});
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
                        const title = prompt('Event Title:');

                        if (title) {
                            const start = event.startStr;
                            const end = event.endStr;

                            $.ajax({
                                url: "{{route('admin.executiveMeeting.event.store')}}",
                                data: {
                                    title: title,
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
                                        allDay: event.allDay
                                    })
                                }
                            });
                        }
                    },
                    drop: function (event) {
                        alert('a day has been dropped!' + event.startStr + ' to ' + event.endStr);
                    },
                });
                calendar.render();
            });

        </script>
    @endpush
@endsection
