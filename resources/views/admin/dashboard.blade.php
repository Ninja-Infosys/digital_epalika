@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">गृहपृष्ठ</h4>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-2">
            <a href="{{route('admin.circular.registration.create')}}" class="btn btn-info w-100">दर्ता गर्नुहोस</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('admin.circular.dispatch.create')}}" class="btn btn-primary w-100">चलानी गर्नुहोस</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('admin.listRegistrations.listRegistration.create')}}" class="btn btn-secondary w-100">मौजुदा
                सुची दर्ता</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('admin.executiveMeeting.wardMeetingNotice.create')}}" class="btn btn-success  w-100">कार्यपालिका
                बैठक पेश गर्नुहोस</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('admin.grievanceHandling.grievanceDetail.index')}}"
               class="btn btn-warning text-white w-100">गुनासो विवरण</a>
        </div>
        <div class="col-md-2">
            <a href="{{route('admin.digitalBoard.notice.create','Notice')}}" class="btn btn-info w-100">सूचना
                थप्नुहोस</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$user_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा प्रयोगकर्ताहरु">
                                    जम्मा प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$grievance_user_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा गुनासो गर्ने प्रयोगकर्ताहरु">
                                    जम्मा गुनासो गर्ने प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-clipboard fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$notice_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा सूचना">
                                    जम्मा सूचना
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-newspaper fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$news_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा समाचार">
                                    जम्मा समाचार
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-users fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$registration_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा दर्ता">
                                    जम्मा दर्ता
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$dispatch_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा चलानी">
                                    जम्मा चलानी
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-clipboard fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$unseen_grievance_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा नहेरिएको गुनासो">
                                    जम्मा नहेरिएको गुनासो
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-newspaper fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$replied_grievance_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा रेपाई गुनासो">
                                    जम्मा रेपाई गुनासो
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-clipboard fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$investigated_grievance_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा अनुसन्धानमा रहेको गुनासो">
                                    जम्मा अनुसन्धानमा रहेको गुनासो
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-newspaper fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$closed_grievance_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title=" जम्मा बन्द गरिएको गुनासो">
                                    जम्मा बन्द गरिएको गुनासो
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-newspaper fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$municipal_meetings_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title="जम्मा कार्यपालिका बैठकहरु">
                                    जम्मा कार्यपालिका बैठकहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <i class="fa fa-newspaper fa-4x"></i>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="text-dark mt-1">
                                    {{$ward_meetings_count}}
                                </h3>
                                <p class="text-muted mb-1 text-truncate" title=" जम्मा वडा समितिका बैठकहरु">
                                    जम्मा वडा समितिका बैठकहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="widget-rounded-circle card">
                <div class="card-header">
                    प्रकार अनुसार गुनासोको विवरण
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>क्र.सं</th>
                                <th>प्रकार</th>
                                <th>संख्या</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($grievanceTypes as $grievanceType)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$grievanceType->title}}</td>
                                    <td>{{$grievanceType->grievance_detail_count}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
