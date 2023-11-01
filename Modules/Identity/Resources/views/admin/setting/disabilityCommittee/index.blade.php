@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('identity.admin.dashboard') }}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">सेटिङ</li>
                        <li class="breadcrumb-item active"> अपाङ्ग समिति</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपाङ्ग समिति</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> अपाङ्ग समिति सूची</h4>
                        <a href="{{ route('identity.admin.setting.disabilityCommittee.create') }}"
                            class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">क्र.सं.</th>
                                <th scope="col">नाम</th>
                                <th scope="col">फोन</th>
                                <th scope="col">पद</th>
                                <th scope="col">#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($disabilityCommittees as $disabilityCommittee)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $disabilityCommittee->name ?? '' }}</td>
                                    <td>{{ $disabilityCommittee->phone ?? '' }}</td>
                                    <td>{{ $disabilityCommittee->designation ?? '' }}</td>
                                    <td>
                                        <a data-bs-type="edit"
                                            href="{{ route('identity.admin.setting.disabilityCommittee.edit', $disabilityCommittee) }}"
                                            type="button"
                                            class="btn btn-xs btn-outline-primary {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form
                                            action="{{ route('identity.admin.setting.disabilityCommittee.destroy', $disabilityCommittee) }}"
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
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
