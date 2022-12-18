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
                            <a href="{{route('admin.grievanceHandling.grievanceDetail.index')}}">गुनासो बिबरण </a>
                        </li>
                        <li class="breadcrumb-item active">गुनासो बिबरण</li>
                    </ol>
                </div>
                <h4 class="page-title">गुनासो बिबरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">गुनासो बिबरण </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>टोकन</th>
                                <th>गुनासोको प्रकार</th>
                                <th> गुनासोको शिर्षक</th>
                                <th> गुनासो प्रकाशन मिति</th>
                                <th> गुनासो गम्भीरता</th>
                                <th> गुनासोको अवस्था</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grievanceDetails as $grievanceDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$grievanceDetail->token}}</td>
                                    <td>{{$grievanceDetail->grievanceType->title??''}}</td>
                                    <td>{{$grievanceDetail->subject}}</td>
                                    <td>{{$grievanceDetail->created_at->toDateString()}}</td>
                                    <td>
                                        {{$grievanceDetail->complaint_severity->label()}}
                                    </td>
                                    <td>
                                        {{$grievanceDetail->status->label()}}
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
                    <div class="mt-2">
                        {{ $grievanceDetails->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


