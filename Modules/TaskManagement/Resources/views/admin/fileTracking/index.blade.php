@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.taskManagement.dashboard') }}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
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
                        <h4 class="header-title mb-0">फाइल ट्रयाकिङ </h4>
                        <div class="d-flex flex-wrap gap-1 align-items-center">
                            @includeIf('inc.filter_form')
                            @can('fileTracking_create')
                                <a href="{{ route('admin.taskManagement.fileTracking.create') }}"
                                    class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>दर्ता नं.</th>
                                    <th>हार्डकपि/सफ्टकपि</th>
                                    <th>कैफियत</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($fileTrackings as $fileTracking)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $fileTracking->registration_no }}</td>
                                        <td>{{ $fileTracking->is_hardcopy ? 'हार्डकपि' : 'सफ्टकपि' }}</td>
                                        <td>{{ $fileTracking->remarks }}</td>
                                        <td class="d-flex gap-1">

                                            <a href="{{ route('admin.taskManagement.fileTracking.show', $fileTracking) }}"
                                                title="हेर्नुहोस" class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                                <form
                                                    action="{{ route('admin.taskManagement.fileTracking.destroy', $fileTracking) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                        title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $fileTrackings->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
