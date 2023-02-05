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
                            <a href="{{ route('admin.executiveMeeting.municipalCommittee.index') }}">इ-कार्यपालिका</a>
                        </li>
                        <li class="breadcrumb-item active">पालिका समिति</li>
                    </ol>
                </div>
                <h4 class="page-title">पालिका समितिहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">पालिका समितिहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('executiveWardCommittee_create')
                                <a href="{{route('admin.executiveMeeting.municipalCommittee.create')}}" class="btn btn-sm btn-outline-primary waves-effect waves-light">
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
                                <th>फोटो</th>
                                <th>पद</th>
                                <th>फोन नम्बर</th>
                                <th>इमेल</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($municipalCommittees as $municipalCommittee)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $municipalCommittee->name }}</td>
                                    <td class="table-user">
                                        <img src="{{ $municipalCommittee->photo_url }}" class="me-2 rounded-circle"
                                             alt="">
                                    </td>
                                    <td>{{ $municipalCommittee->designation }}</td>
                                    <td>{{ $municipalCommittee->phone }}</td>
                                    <td>{{ $municipalCommittee->email }}</td>

                                    <td>
                                        @can('update',$municipalCommittee)
                                            @can('executiveMunicipalCommittee_edit')
                                                <a data-bs-type="edit"
                                                   href="{{ route('admin.executiveMeeting.municipalCommittee.edit', $municipalCommittee) }}"
                                                   title="सम्पादन गर्नुहोस्"
                                                   class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                        @endcan
                                        @can('delete',$municipalCommittee)
                                            @can('executiveMunicipalCommittee_delete')
                                                <form
                                                    action="{{ route('admin.executiveMeeting.municipalCommittee.destroy', $municipalCommittee) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete" type="submit"
                                                            class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                            title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        @endcan
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
                        {{ $municipalCommittees->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
