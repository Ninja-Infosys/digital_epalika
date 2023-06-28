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
                        <li class="breadcrumb-item active">फाइल ट्रयाकिङ</li>
                    </ol>
                </div>
                <h4 class="page-title">फाइल ट्रयाकिङ </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">फाइल ट्रयाकिङ विवरण </h4>
                        <div class="d-flex flex-wrap gap-1 align-items-center">
                            <a href="{{ route('admin.taskManagement.fileTracking.index') }}"
                                class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-list"></i> फाइल ट्रयाकिङ लिस्ट</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>दर्ता नं. : </b> {{ $fileTracking->registration_no }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>हार्डकपि/सफ्टकपि : </b> {{ $fileTracking->is_hardcopy ? 'हार्डकपि' : 'सफ्टकपि' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>कैफियत : </b> {{ $fileTracking->remarks }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">File Activities</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.सं.</th>
                                    <th>मिति</th>
                                    <th>प्राप्त गरे/नगरेको</th>
                                    <th>स्थिति</th>
                                    <th>Assigned By</th>
                                    <th>Assigned Users</th>
                                    <th>कैफियत</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fileTracking->fileActivities as $fileActivity)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fileActivity->date_bs }}</td>
                                        <td>
                                            <a href="{{ route('admin.taskManagement.fileTracking.fileActivity.updateReceivedStatus', [$fileTracking, $fileActivity]) }}"
                                                class="btn btn-xs btn-outline-{{ $fileActivity->is_received ? 'primary' : 'danger' }}"
                                                title="प्राप्त {{ $fileActivity->is_received ? 'गरेको' : 'नगरेको' }}">
                                                <i
                                                    class="fa  {{ $fileActivity->is_received ? ' fa-check' : 'fa-window-close' }}"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.taskManagement.fileTracking.fileActivity.updateStatus', [$fileTracking, $fileActivity]) }}"
                                                class="btn btn-xs btn-outline-{{ $fileActivity->status ? 'primary' : 'danger' }}"
                                                title="{{ $fileActivity->status ? 'सक्रिय' : 'निष्क्रिय' }}">
                                                <i
                                                    class="fa  {{ $fileActivity->status ? ' fa-check' : 'fa-window-close' }}"></i>
                                            </a>
                                        </td>
                                        <td>{{ $fileActivity->assignedBy->name ?? '' }}</td>
                                        <td>
                                            @foreach ($fileActivity->users as $user)
                                                {{ $user->name }} {{ !$loop->last ? ',' : '' }}
                                            @endforeach
                                        </td>
                                        <td>{{ $fileActivity->remarks }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="header-title mb-0">Transfer File To User</h4>
                </div>
                <div class="card-body">
                    @livewire('taskmanagement::file-transfer-livewire', ['fileTracking' => $fileTracking])
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4 class="header-title mb-0">Tracking Files</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Files</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fileTracking->fileTrackingFiles as $fileTrackingFile)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fileTrackingFile->title }}</td>
                                <td>{{ $fileTrackingFile->description }}</td>
                                <td>
                                    @forelse ($fileTrackingFile->files as $file)
                                        <a href="{{ route('admin.file.download', $file) }}">
                                            <i class="fa fa-file"> {{ $file->file_name }}</i>
                                            {{ !$loop->last ? ',' : '' }}
                                        </a>
                                    @empty
                                        No files Uploaded
                                    @endforelse
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
