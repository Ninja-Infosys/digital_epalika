@extends('admin.layouts.master')

@section('content')
    <div class="row mt-2">
        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-danger border-danger border">
                                <i class="fe-shopping-bag font-22 avatar-title text-danger"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">178</span></h3>
                                <p class="text-muted mb-1 text-truncate">Available Stores</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-secondary border-secondary border">
                                <i class="fe-gitlab font-22 avatar-title text-secondary"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">289</span></h3>
                                <p class="text-muted mb-1 text-truncate">Gitlab Commits</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-blue border-blue border">
                                <i class="fe-gift font-22 avatar-title text-blue"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">1021</span></h3>
                                <p class="text-muted mb-1 text-truncate">Free Gifts</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-3">
            <div class="widget-rounded-circle card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="avatar-lg rounded-circle bg-soft-pink border-pink border">
                                <i class="fa fa-users font-22 avatar-title text-pink"></i>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-end">
                                <h3 class="mt-1"><span data-plugin="counterup">154</span>k</h3>
                                <p class="text-muted mb-1 text-truncate">Paid Users</p>
                            </div>
                        </div>
                    </div> <!-- end row-->
                </div>
            </div> <!-- end widget-rounded-circle-->
        </div> <!-- end col-->
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
        <div class="col-md-12 col-xl-4">
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
                                    <td>{{$grievanceType->grievance_details_count}}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12 col-xl-8">
            <div class="widget-rounded-circle card">
                <div class="card-header">
                   गुनासोको विवरण
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>टोकन</th>
                                <th>गुनासोको प्रकार</th>
                                <th> गुनासोको शिर्षक</th>
                                <th> गुनासो प्रकाशन मिति</th>
                                <th> गुनासो गम्भीरता</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($unseen_grievances as $grievanceDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$grievanceDetail->token}}</td>
                                    <td>{{$grievanceDetail->grievanceType->title??''}}</td>
                                    <td>{{$grievanceDetail->subject}}</td>
                                    <td>{{$grievanceDetail->created_at->toDateString()}}</td>
                                    <td>
                                        @switch($grievanceDetail->complaint_severity)
                                            @case('High priority')
                                                उच्च प्राथमिकता
                                                @break
                                            @case('Priority')
                                                प्राथमिकता
                                                @break
                                            @default
                                                साधारण
                                        @endswitch
                                    </td>

                                    <td>
                                        <a href="{{route('admin.grievanceHandling.grievanceDetail.show',$grievanceDetail)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
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
