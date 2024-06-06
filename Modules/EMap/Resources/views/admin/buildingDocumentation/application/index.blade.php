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
                            <a href="{{ route('emap.admin.buildingDocumentation.index') }}">भवन अभिलेखिकरण दर्खास्त निवेदन
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
                    <div class="table-responsive">
                        <table class="table table-sm table-custom">
                            <thead class="align-middle text-nowrap text-center">
                                <tr>
                                    <th rowspan="2">क्र.स</th>
                                    <th rowspan="2">दर्ता नं</th>
                                    <th rowspan="2">दर्ता मिति</th>
                                    <th rowspan="2">घरधनिको नाम</th>
                                    <th rowspan="2">ठेगाना</th>
                                    <th rowspan="2">#</th>
                                </tr>

                            </thead>
                            <tbody class="text-nowrap text-center">
                                @forelse($buildingDocumentations as $buildingDocumentation)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ get_nepali_number($buildingDocumentation->registration_no ?? '') }}</td>
                                        <td>{{ get_nepali_number($buildingDocumentation->bill_date_bs ?? '') }}</td>
                                        <td>{{ $buildingDocumentation->house_owner_name ?? '' }}</td>
                                        <td>
                                            <span>{{ $buildingDocumentation->localBody->local_body ?? '' }}
                                                - {{ $buildingDocumentation->ward_no ?? '' }} </span>
                                        </td>
                                        <td class="d-flex gap-1">

                                            <a data-bs-type="edit"
                                                href="{{ route('emap.admin.buildingDocumentation.edit', $buildingDocumentation) }}"
                                                class="btn btn-xs btn-outline-info {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                title="पुरा विवरण हेर्नुहोस">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                                    <path
                                                        d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                                </svg>
                                            </a>


                                            <a data-bs-type="edit"
                                                href="{{ route('emap.admin.buildingDocumentation.show', $buildingDocumentation) }}"
                                                class="btn btn-xs btn-outline-info {{ get_setting('Pin') ? 'confirm_pin' : '' }}"
                                                title="पुरा विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button"
                                                class="btn btn-sm btn-info waves-effect waves-light dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-angle-down"></i>
                                            </button>
                                            <div class="dropdown-menu" style="">
                                                @if ($buildingDocumentation->isRegistrationDateMoreThanAWeekOld())
                                                    @can('landConfirmation_access')
                                                        <form
                                                            action="{{ route('emap.admin.buildingDocumentation.printLandConfirmation', $buildingDocumentation) }}"
                                                            method="post" style="display: inline">
                                                            @csrf
                                                            @method('put')

                                                            <button data-bs-type="edit" type="submit" title="प्रिन्ट गर्नुहोस"
                                                                class="btn btn-xs btn-outline-warning">
                                                                <i class="fa fa-print"></i>सरजमिन मुचुल्का
                                                            </button>
                                                        </form>
                                                    @endcan
                                                @endif
                                                @if ($buildingDocumentation->status == Modules\EMap\Enums\BuildingDocumentationStatusEnum::LAND_CONFIRMATION
                                                ||Modules\EMap\Enums\BuildingDocumentationStatusEnum::RECOMMENDATION
                                                ||Modules\EMap\Enums\BuildingDocumentationStatusEnum::REPORT
                                                ||Modules\EMap\Enums\BuildingDocumentationStatusEnum::CERTIFICATE)
                                                    @can('landRecommendation_access')
                                                        <form
                                                            action="{{ route('emap.admin.buildingDocumentation.printRecommendation', $buildingDocumentation) }}"
                                                            method="post" style="display: inline">
                                                            @csrf
                                                            @method('put')

                                                            <button data-bs-type="edit" type="submit" title="प्रिन्ट गर्नुहोस"
                                                                class="btn btn-xs btn-outline-warning">
                                                                <i class="fa fa-print"></i>वडाको सिफारिस
                                                            </button>
                                                        </form>
                                                    @endcan
                                                @endif

                                            </div>
                                            {{-- @if (!is_null($buildingDocumentation->registration_no))
                                    <a data-bs-type="edit"
                                        href="{{ route('admin.businessRegistration.buildingDocumentation.printData', $buildingDocumentation) }}"
                                        title="प्रिन्ट गर्नुहोस" class="btn btn-xs btn-outline-warning">
                                        <i class="fa fa-print"></i>
                                    </a>
                                    @endif --}}
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
