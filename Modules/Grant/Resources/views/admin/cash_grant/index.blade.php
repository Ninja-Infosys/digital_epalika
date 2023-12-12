@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.grant.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">नगद अनुदान</li>
                    </ol>
                </div>
                <h4 class="page-title">जारी भएका नगद अनुदान</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">नगद अनुदान</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('grant_create')
                                <a href="{{ route('admin.grant.cashGrant.create') }}"
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
                                    <th>ठेगान (वडा)</th>
                                    <th>उमेर</th>
                                    <th>सम्पर्क नं</th>
                                    <th>नागरिकत नं</th>
                                    <th>बुवाको नाम</th>
                                    <th>बाजेको नाम</th>
                                    <th>असहायताको प्रकार</th>
                                    <th>नगद</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($cashGrants as $cashGrant)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $cashGrant->name ?? '' }}</td>
                                        <td>{{ $cashGrant->address ?? '' }}</td>
                                        <td>{{ $cashGrant->age ?? '' }}</td>
                                        <td>{{ $cashGrant->contact ?? '' }}</td>
                                        <td>{{ $cashGrant->citizenship_no ?? '' }}</td>
                                        <td>{{ $cashGrant->father_name ?? '' }}</td>
                                        <td>{{ $cashGrant->grandfather_name ?? '' }}</td>
                                        <td>{{ $cashGrant->helplessnessType?->helplessness_type ?? '' }}</td>
                                        <td>{{ $cashGrant->cash ?? '' }}</td>
                                        <td class="d-flex gap-1">

                                            <a data-bs-type="edit"
                                                href="{{ route('admin.grant.cashGrant.edit', $cashGrant) }}"
                                                class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{-- @can('grant_access')
                                            <a data-bs-type="edit" href="{{route('admin.grant.grant.show', $grant)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan  --}}
                                         @can('grant_delete')
                                            <form
                                                action="{{route('admin.grant.cashGrant.destroy', $cashGrant)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title=" मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan 
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{-- {{ $cashGrants->onEachSide(config('app.pagination_count'))->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
