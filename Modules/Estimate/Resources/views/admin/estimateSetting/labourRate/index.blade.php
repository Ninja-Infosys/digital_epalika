@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.estimate.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">Labour Rate</li>
                    </ol>
                </div>
                <h4 class="page-title">Labour Rate</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header search-card">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">Labour Rate सूची</h4>
                        <a href="{{ route('admin.estimate.labourRate.create') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-custom">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th> दर</th>
                                    <th> labour</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($labourRates as $key=>$labourRate)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $labourRate->rate }}</td>
                                        <td>
                                            {{ $labourRate->labour->title ?? '' }}

                                        </td>
                                        <td class="d-flex">
                                            <a data-bs-type="edit" href="{{ route('admin.estimate.labourRate.edit', $labourRate) }}"
                                            class="btn btn-xs btn-outline-primary"  data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="सम्पादन गर्नुहोस">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.estimate.labourRate.destroy', $labourRate) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete"
                                                class="btn btn-xs me-1 btn-outline-danger show_confirm">
                                                <i class="fa fa-trash {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="मेटाउनु होस्"></i>
                                            </button>
                                        </form>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
