@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.executiveMeeting.dashboard') }}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">समिति प्रकार सुची</li>
                    </ol>
                </div>
                <h4 class="page-title">समिति प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">समिति प्रकार सूची</h4>
                        @can('committeeType_create')
                            <a href="{{ route('admin.executiveMeeting.setting.committeeType.create') }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>समिति संख्या</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($committeeTypes as $committeeType)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $committeeType->name }}</td>
                                    <td>{{ $committeeType->committee_no }}</td>
                                    <td>
                                        @can('committeeType_edit')
                                            <a data-bs-type="edit"
                                               href="{{ route('admin.executiveMeeting.setting.committeeType.edit', $committeeType) }}"
                                               class="btn btn-xs btn-outline-warning {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('committeeType_delete')
                                            <form
                                                action="{{ route('admin.executiveMeeting.setting.committeeType.destroy', $committeeType) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
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
