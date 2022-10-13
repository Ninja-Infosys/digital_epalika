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
                            <a href="">नोटिफिकेसन</a>
                        </li>
                        <li class="breadcrumb-item active">नोटिफिकेसन</li>
                    </ol>
                </div>
                <h4 class="page-title">नोटिफिकेसन</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नोटिफिकेसन</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0">
                            <thead>
                            <tr>
                                <th>SN</th>
                                <th>Type</th>
                                <th>Data</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($notifications as $key=>$notification )
                                <tr style="{{ $notification->read_at ? '' : 'background-color:#edeff1;' }}">
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $notification->type }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($notification->data as $key=>$data)
                                                <li>{{ Str::upper($key).' : ' .$data }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $notification->created_at->diffForHumans() }}</td>
                                    <td>
                                        @if(!$notification->read_at)
                                            <a href="{{ route('admin.notification.read',$notification) }}" class="btn btn-success btn-sm" >
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$notifications->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
