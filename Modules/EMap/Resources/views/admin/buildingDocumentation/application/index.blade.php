@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title mb-0">
                    भवन अभिलेखिकरण दर्खास्त


                </h4>
                <div class="">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}"
                                    alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">दर्खास्त निवेदन</li>
                        <li class="breadcrumb-item active">

                            भवन अभिलेखिकरण दर्खास्त
                        </li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title mb-0">

                    भवन अभिलेखिकरण दर्खास्त
                </h4>
                <div class="d-flex flex-wrap align-items-center">
                    @includeIf('inc.filter_form')
                </div>
            </div>
        </div>
        <div class="card-body px-0">

            <div class="">
                <div class="tab-pane " id="">
                    <table class="table table-striped mb-0">
                        <thead>
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
                        <tbody>
                            @forelse($buildingDocumentations as $buildingDocumentation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ get_nepali_number($buildingDocumentation?->fiscalYear->title ?? '') }}
                                    </td>
                                    <td>{{ get_nepali_number($buildingDocumentation->submission_no ?? '') }}</td>
                                    <td>{{ get_nepali_number($buildingDocumentation->registration_no ?? '') }}</td>
                                    <td>{{ get_nepali_number($buildingDocumentation->land_ward_no ?? '') }}</td>
                                    <td>{{ $buildingDocumentation->index_data['title'] ?? '' }}({{ $buildingDocumentation->index_data['status'] ?? '' }})
                                    </td>
                                    <td>{{ $buildingDocumentation->index_data['desk'] ?? '' }}</td>
                                    <td>{{ $buildingDocumentation->index_data['pendingDays'] ?? '' }}</td>
                                    <td>{{ $buildingDocumentation?->building_category?->label() ?? '' }}</td>
                                    <td>{{ $buildingDocumentation->buildingHouseOwner->name ?? '' }}
                                    <td>{{ $buildingDocumentation->organization->name ?? '' }}</td>
                                    <td>
                                        <div class="d-flex align-items-center gap-1">


                                            <a href="{{ route('emap.admin.buildingDocumentation.show', $buildingDocumentation) }}"
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
                                    <td class="text-center" colspan="12">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


                </div>


            </div>


        </div>
        <div class="mt-2">
            {{ $buildingDocumentations->onEachSide(config('app.pagination_count'))->links() }}
        </div>
    </div>
@endsection
