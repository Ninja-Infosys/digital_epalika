@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.setting.dashboard') }}">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">आपतकालीन सम्पर्क विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title">आपतकालीन सम्पर्क विवरण</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> आपतकालीन सम्पर्कको वर्गको सूची</h4>
                        @can('emergencyNumber_create')
                            <a href="{{ route('admin.generalSetting.emergencyCategory.create') }}"
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
                                    <th>शिर्षक</th>
                                    <th>फोटो</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($EmergencyCategories as $EmergencyCategory)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $EmergencyCategory->title }}</td>
                                        <td class="align-middle">
                                            <img src="{{ $EmergencyCategory->image }}" alt="" height="50px"
                                            width="50px">
                                        </td>
                                        <td class="d-flex gap-1">
                                            @can('emergencyNumber_edit')
                                                <a data-bs-type="edit"
                                                    href="{{ route('admin.generalSetting.emergencyCategory.edit', $EmergencyCategory) }}"
                                                    class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                    title="सम्पादन गर्नुहोस्">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('emergencyNumber_delete')
                                                <form
                                                    action="{{ route('admin.generalSetting.emergencyCategory.destroy', $EmergencyCategory) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                        title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="7">जातियतामा कुनै डाटा उपलब्ध छैन !!!</td>
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
