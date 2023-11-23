@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grievanceHandling.setting.grievanceType.index')}}">गुनासो प्रकार </a>
                        </li>
                        <li class="breadcrumb-item active">गुनासो प्रकार  </li>
                    </ol>
                </div>
                <h4 class="page-title">गुनासो प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">गुनासोका प्रकारहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('grievanceType_create')
                                <a href="{{route('admin.grievanceHandling.setting.grievanceType.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>शिर्षक </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grievance_types as $grievance_type)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$grievance_type->title}}</td>
                                    <td class="d-flex gap-1">
                                        <a data-bs-type="edit"
                                        href="{{ route('admin.grievanceHandling.setting.grievanceType.edit', $grievance_type) }}"
                                        class="btn btn-xs btn-outline-warning {{ get_setting('Pin') ? 'confirm_pin' : '' }}" title="सम्पादन गर्नुहोस्">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form
                                    action="{{ route('admin.grievanceHandling.setting.grievanceType.destroy', $grievance_type) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button data-bs-type="delete"
                                        class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"title="मेटाउनूहोस्">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $grievance_types->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

