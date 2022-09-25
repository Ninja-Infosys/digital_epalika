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
                        <li class="breadcrumb-item active">प्रयोगकर्ता गतिविधिहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रयोगकर्ता गतिविधिहरू</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रयोगकर्ता गतिविधिहरू</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>मिति</th>
                                <th>प्रयोगकर्ता</th>
                                <th>कार्य</th>
                                <th>आईपी</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($activityLogs as $activityLog)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$activityLog->created_at->toDateString()}}</td>
                                    <td>{{$activityLog->user->name??''}}</td>
                                    <td>{{$activityLog->activity_type}}</td>
                                    <td>{{$activityLog->ip}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$activityLogs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
