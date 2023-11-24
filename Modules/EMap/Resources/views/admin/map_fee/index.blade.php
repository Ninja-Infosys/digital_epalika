@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title mb-0">नक्शा दस्तुर </h4>
                <div class="">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                    alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active">नक्शा दस्तुर</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">नक्शा दस्तुर सूची</h4>
                        @can('mapFee_create')
                            <a href="{{ route('emap.admin.mapFee.create') }}" class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped ">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>तल्ला</th>
                                    <th>एकाइ</th>
                                    <th>दर</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mapFees as $key=>$mapFee)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <th>{{ $mapFee->storey }}</th>
                                        <td>{{ $mapFee->unit->title ?? '' }}</td>
                                        <td>{{ $mapFee->rate }}</td>
                                        <td class="d-flex">
                                            @can('mapFee_edit')
                                                <a data-bs-type="edit" href="{{ route('emap.admin.mapFee.edit', $mapFee) }}"
                                                    class="btn btn-xs me-1 btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="सम्पादन गर्नुहोस्">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan

                                            <form action="{{ route('emap.admin.mapFee.destroy', $mapFee) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                @can('mapFee_delete')
                                                    <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger show_confirm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="मेटाउनु होस्">
                                                        <i
                                                            class="fa fa-trash {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"></i>
                                                    </button>
                                                @endcan
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
                </div>
            </div>
        </div>
    </div>
@endsection
