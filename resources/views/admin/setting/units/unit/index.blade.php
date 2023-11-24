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
                            <a href="{{ route('admin.units.measurementUnit.index') }}">मापन एकाइ</a>
                        </li>
                        <li class="breadcrumb-item active">मापन एकाइ</li>
                    </ol>
                </div>
                <h4 class="page-title">मापन एकाइ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> मापन एकाइ</h4>
                        @can('unit_create')
                            <a href="{{ route('admin.units.unit.create') }}" class="btn btn-sm btn-outline-primary">
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
                                    <th>प्रकार</th>
                                    <th>मापन एकाइ विविधता</th>
                                    <th>मापन एकाइ</th>
                                    <th>नोटेशन</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($units as $unit)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{ $unit->measurementUnit->type->title ?? '' }}
                                        </td>
                                        <td>
                                            {{ $unit->measurementUnit->title ?? '' }}(
                                            {{ $unit->measurementUnit->title_en ?? '' }})
                                        </td>
                                        <td>
                                            {{ $unit->title ?? '' }}
                                        </td>
                                        <td class="d-flex gap-1">
                                            @if ($unit->is_smallest)
                                                <a href="{{ route('admin.units.unit.external-unit-conversion.index', $unit) }}"
                                                    class="btn btn-xs btn-outline-warning" title=" बाह्य रूपान्तरण">
                                                    <i class="fa fa-exchange-alt"></i>
                                                </a>
                                            @endif

                                            <a href="{{ route('admin.units.unit.internal-unit-conversion.index', $unit) }}"
                                                class="btn btn-xs btn-outline-info" title="आन्तरिक रूपान्तरण">
                                                <i class="fa fa-exchange-alt"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <div class="d-flex gap-1">
                                                @can('unit_edit')
                                                    <a data-bs-type="edit" href="{{ route('admin.units.unit.edit', $unit) }}"
                                                        class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                @endcan
                                                @can('unit_delete')
                                                    <form action="{{ route('admin.units.unit.destroy', $unit) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button data-bs-type="delete"
                                                            class="btn btn-xs btn-outline-danger {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
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
                </div>
            </div>
        </div>
    </div>
@endsection
