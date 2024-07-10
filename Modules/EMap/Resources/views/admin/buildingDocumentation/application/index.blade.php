@extends('admin.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                alt="document-icon">
                            गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('emap.admin.buildingDocumentation.index') }}">भवन अभिलेखिकरण दर्खास्त
                            निवेदन
                        </a>
                    </li>
                    <li class="breadcrumb-item active">दर्खास्त निवेदन</li>
                </ol>
            </div>
            <h4 class="page-title">दर्खास्त निवेदन </h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card p-0">
            <div class="card-header search-card">
                <div class="d-flex align-items-center justify-content-between">
                    <h4 class="header-title mb-0">दर्खास्त निवेदनहरु</h4>
                    <div class="d-flex flex-wrap align-items-center">
                        @includeIf('inc.filter_form')
                        <button class="btn btn-sm mx-1 btn-outline-info waves-effect waves-light collapsed"
                            type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilterForm"
                            aria-expanded="false" aria-controls="collapseExample">
                            <i class="fa fa-filter"> फिल्टर</i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="card-body px-0">
                <div class="table">
                    <table class="table table-sm table-custom">
                        <thead class="align-middle text-nowrap text-center">
                            <tr>
                                <th>क्र.सं.</th>
                                <th>आर्थिक वर्ष</th>
                                <th>सबममिसन नं</th>
                                <th>दर्ता नं</th>
                                <th>वडा नं</th>
                                <th>स्थिती</th>
                                <th>डेस्क</th>
                                <th>Pending Days</th>
                                <th>निर्माण कार्यको किसिम</th>
                                <th>घर धनी</th>
                                <th>आवेदन भर्ने संस्था</th>
                                <th>#</th>

                            </tr>

                        </thead>
                        <tbody class="text-nowrap text-center">
                            @forelse($buildingDocumentations as $buildingDocumentation)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ get_nepali_number($buildingDocumentation?->fiscalYear->title ?? '') }}</td>
                                <td>{{ get_nepali_number($buildingDocumentation->submission_no ?? '') }}</td>
                                <td>{{ get_nepali_number($buildingDocumentation->registration_no ?? '') }}</td>
                                <td>{{ get_nepali_number($buildingDocumentation->land_ward_no ?? '') }}</td>
                                <td>{{ $buildingDocumentation->index_data['title'] ?? '' }}({{
                                    $buildingDocumentation->index_data['status'] ?? '' }})</td>
                                <td>{{ $buildingDocumentation->index_data['desk'] ?? '' }}</td>
                                <td>{{ $buildingDocumentation->index_data['pendingDays'] ?? '' }}</td>
                                <td>{{ $buildingDocumentation?->building_category?->label() ?? '' }}</td>
                                <td>{{ $buildingDocumentation->buildingHouseOwner->name ?? ''}}
                                <td>{{ $buildingDocumentation->organization->name ?? '' }}</td>

                                <td>
                                    <div class="d-flex align-items-center gap-1">


                                            <a href=""
                                                title="विवरण हेर्नुहोस" class="btn btn-xs btn-outline-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        <a href="{{ route('emap.admin.buildingDocumentation.admin-step.building-form-list', $buildingDocumentation) }}"
                                            title="नक्सा विवरण" class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-step-forward"></i>
                                        </a>
                                    </div>
                                </td>


                            </tr>

                            @empty
                            <tr>
                                <td class="text-center" colspan="13">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $buildingDocumentations->links() }}
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
