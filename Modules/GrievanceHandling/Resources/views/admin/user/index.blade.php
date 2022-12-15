@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grievanceHandling.grievanceDetail.index') }}">प्रयोगकर्ताको
                                बिबरण </a>
                        </li>
                        <li class="breadcrumb-item active">प्रयोगकर्ताको बिबरण</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रयोगकर्ताको बिबरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रयोगकर्ताको बिबरण </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>नाम</th>
                                    <th>इमेल</th>
                                    <th>फोन नं</th>
                                    <th>गुनासोहरुको संख्या</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($grievanceUsers as $grievanceUser)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $grievanceUser->name }}</td>
                                        <td>{{ $grievanceUser->email }}</td>
                                        <td>{{ $grievanceUser->phone }}</td>
                                        <td>{{ $grievanceUser->grievance_details_count }}</td>
                                        <td>
                                            <a href="{{route('admin.grievanceHandling.grievanceUser.show',$grievanceUser)}}"
                                           title="थप हेर्नुहोस्"
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
