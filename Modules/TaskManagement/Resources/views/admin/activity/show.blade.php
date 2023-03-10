@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.taskManagement.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कार्य</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्य</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">कार्य</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            <a href="{{ route('admin.taskManagement.activity.index') }}"
                               class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-list"></i> कार्यहरूको सुची</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0 table-striped table-bordered">
                                    <tbody>
                                    <tr>
                                        <th>शाखा</th>
                                        <td>{{ $activity->branch->branch_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th>कार्यहरु</th>
                                        <td>
                                            <ul class="list-group list-group-numbered">
                                                @foreach ($activity->activityLists as $list)
                                                    <li class="list-group-item">{{ $list->title }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>मिति</th>
                                        <td>
                                            {{ $activity->date }}
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end row-->
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">कागजातहरू</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($activity->activityLists as $activityList)
                            @forelse($activityList->files as $file)
                                <div class="col-xl-4 col-lg-6">
                                    <div class="card shadow-none border">
                                        <div class="p-2">
                                            <div class="row align-items-center">
                                                <div class="col-2 pe-0">
                                                    <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                          <i class="fa {{getFileIconClass($file->extension)}} font-18"></i>
                                                    </span>
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <a href="javascript:void(0);"
                                                       onclick="openFileModal('{{$activityList->title}}', '{{ $file->extension }}', '{{ $file->file_url }}')"
                                                       class="text-muted fw-medium" type="button">{{$activityList->title}}.{{$file->extension}}</a>
                                                    <p class="mb-0 font-13">{{convert_to_highest_unit($file->file_size)}}</p>
                                                </div>
                                                <div class="col-2">
                                                        <a href="{{route('admin.file.download', $file)}}" class="btn btn-xs btn-outline-primary">
                                                            <i class="fa fa-download"></i>
                                                        </a>
                                                </div>
                                            </div> <!-- end row -->
                                        </div> <!-- end .p-2-->
                                    </div> <!-- end col -->
                                </div>
                            @empty
                                <p class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</p>
                            @endforelse
                        @endforeach
                    </div> <!-- end row-->
                </div>
            </div>
        </div>
        @include('admin.inc.file-view');
    </div>
@endsection
