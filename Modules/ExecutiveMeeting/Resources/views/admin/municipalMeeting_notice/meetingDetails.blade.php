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
                            <a href=""> ई-कार्यपालिका</a>
                        </li>
                        <li class="breadcrumb-item active">पालिका बैठक</li>
                    </ol>
                </div>
                <h4 class="page-title">पालिका बैठक</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> पालिका बैठक सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>बैठक मिति</th>
                                <th>बैठक बिसय</th>
                                <th>बिबरण</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($meetingDetails as $meetingDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$meetingDetail->meeting_date ? $meetingDetail->meeting_date->toDateString() :''}}</td>
                                    <td>{{$meetingDetail->meeting_subject}}</td>
                                    <td>{{$meetingDetail->description}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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

