@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">संगठनको विवरण</h4>
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
                        <li class="breadcrumb-item active">संगठनको विवरण </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">संगठनको विवरण</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>नामसारी मिति </th>
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
                                <td>{{$organizationArchive->archive_date_bs}}</td>
                                <td>{{ $organizationArchive->organization->organizationDetail->org_name_ne ?? '' }}</td>
                                <td>{{ $organizationArchive->organization->name??'' }}</td>
                                <td>{{ $organizationArchive->organization->email??'' }}</td>
                                <td>{{ $organizationArchive->organization->phone??'' }}</td>
                                <td class="d-flex">
                                    <a
                                        href="{{route('emap.admin.organization.show',$organizationArchive->organization)}}"
                                        class="btn btn-xs me-1 btn-outline-primary"
                                        title="पूरा विवरण हेर्नुहोस्"
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
    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">संगठनको फाइलहरू</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>फाईल</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($houseOwnerArchive->organization?->files??[] as $file)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $file->file_name }}</td>
                                    <td>
                                        <iframe src="{{ $file->file_url }}" alt="{{$file->file_name}}"></iframe>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center">
                                        तालिकामा कुनै डाटा उपलब्ध छैन !!!
                                    </td>
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
