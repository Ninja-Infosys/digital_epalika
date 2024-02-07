@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">नयाँ संगठन विवरण</h4>
                <div class="mb-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('emap.admin.dashboard') }}">
                                <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg"
                                    alt="document-icon"> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                        <a href="{{ route('emap.admin.mapApply.admin-step.form-list',$mapApply) }}">
                            चरण
                            </a>
                        </li>
                        <li class="breadcrumb-item active">संगठनको विवरण</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">संगठन विवरण</h4>
                    </div>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('emap.admin.organizationArchive.store',$mapApply) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="card p-4 mb-4">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label class="form-label" for="organization_id"> संगठन </label>
                                    <select name="organization_id" id="organization_id" class="form-select">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}">
                                                {{$organization->organizationDetail->org_name_ne??''}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('organization_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <x-date-input-component
                                        label-ne="संगठन अभिलेख मिति"
                                        name-ne="archive_date_bs"
                                    />
                                </div>
                                @livewire('multiple-file')
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        पेश गर्नुहोस
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    @if($mapApply->organizationArchives->count() > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">नया संगठन विवरण</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>संगठनको नाम</th>
                                <th>संस्थापकको नाम</th>
                                <th>इमेल</th>
                                <th>फोन</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>{{ $mapApply->organization->organizationDetail->org_name_ne ?? '' }}</td>
                                    <td>{{ $mapApply->organization->name??'' }}</td>
                                    <td>{{ $mapApply->organization->email??'' }}</td>
                                    <td>{{ $mapApply->organization->phone??'' }}</td>
                                    <td class="d-flex">
                                        <a
                                            href="#"
                                            class="btn btn-xs me-1 btn-outline-primary"
                                            data-bs-toggle="tooltip" data-bs-placement="top">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="header-title mb-0">पुरानो घर धनीको विवरण</h4>

                </div>
            </div>
            <div class="card-body">
                <table class="table table-sm table-striped">
                    <thead>
                    <tr>
                        <th>क्र.स</th>
                        <th>संगठनको नाम</th>
                        <th>संस्थापकको नाम</th>
                        <th>इमेल</th>
                        <th>फोन</th>
                        <th>#</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($mapApply->organizationArchives as $organizationArchive)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $organizationArchive->organization->organizationDetail->org_name_ne ?? '' }}</td>
                            <td>{{ $organizationArchive->organization->name??'' }}</td>
                            <td>{{ $organizationArchive->organization->email??'' }}</td>
                            <td>{{ $organizationArchive->organization->phone??'' }}</td>
                            <td class="d-flex">
                                <a
                                    href="#"
                                    class="btn btn-xs me-1 btn-outline-primary"
                                    data-bs-toggle="tooltip" data-bs-placement="top">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="8">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                        </tr>
                    @endforelse

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

@endsection
