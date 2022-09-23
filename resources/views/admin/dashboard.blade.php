@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">गृहपृष्ठ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    गुनासो गर्ने प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    सूचना
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    समाचार
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    गुनासो गर्ने प्रयोगकर्ताहरु
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    सूचना
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    समाचार
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    सूचना
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-2">
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
                                <p class="text-muted mb-1 text-truncate">
                                    समाचार
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
