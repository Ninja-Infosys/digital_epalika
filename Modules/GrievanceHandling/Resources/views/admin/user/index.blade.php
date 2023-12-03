@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grievanceHandling.grievanceDetail.index') }}">प्रयोगकर्ताको
                                बिबरण </a>
                        </li>
                        <li class="breadcrumb-item active">गुनासो प्रयोगकर्ताहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">गुनासो प्रयोगकर्ताहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">गुनासो प्रयोगकर्ताहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('grievanceUser_create')
                                <a href="{{ route('admin.grievanceHandling.grievanceUser.create') }}"
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
                                        <td class="d-flex gap-1">
                                            <a href="{{ route('admin.grievanceHandling.grievanceUser.show', $grievanceUser) }}"
                                                title="थप हेर्नुहोस्" class="btn btn-xs btn-outline-primary" title="थप हेर्नुहोस्">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a data-bs-type="edit"
                                                href="{{ route('admin.grievanceHandling.grievanceUser.edit', $grievanceUser) }}"
                                                class="btn btn-xs btn-outline-warning {{ get_setting('Pin') ? 'confirm_pin' : '' }}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form
                                                action="{{ route('admin.grievanceHandling.grievanceUser.destroy', $grievanceUser) }}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                    class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}" title="मेटाउनूहोस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
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
                        {{ $grievanceUsers->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
