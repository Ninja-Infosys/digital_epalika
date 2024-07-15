@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">नक्सा</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्सा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">नक्साहरु</h4>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">सब्मिसन आइडी</th>
                                <th scope="col">घर धनीको नाम</th>
                                <th scope="col">घर धनीको फोन नं.</th>
                                <th scope="col">निर्माण कार्यको किसिम</th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($buildingDocumentations as $buildingDocumentation)

                                <tr>
                                    <td>{{ $loop->iteration ?? '' }}</td>
                                    <td>{{ get_nepali_number($buildingDocumentation->submission_no ?? '') }}</td>
                                    <td>{{ $buildingDocumentation->buildingHouseOwner->name ?? '' }}</td>
                                    <td>{{ $buildingDocumentation->buildingHouseOwner->phone ?? '' }}</td>
                                    <td>{{ $buildingDocumentation?->building_category?->label() }}</td>
                                    <td class="d-flex">
                                        @if ($buildingDocumentation->sent_to_organization !== 'Accept')
                                            <a data-bs-type="edit" class="btn me-1 btn-xs btn-outline-primary"
                                               href="{{ route('organization.admin.buildingDocumentation.show', $buildingDocumentation) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                               title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-pen"></i>
                                            </a>



                                            <a data-bs-type="show" class="btn me-1 btn-xs btn-outline-warning"
                                               href="{{ route('organization.admin.buildingDocumentationList', $buildingDocumentation) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <a data-bs-type="file" class="btn btn-xs btn-outline-info mx-1"
                                               href="{{ route('organization.admin.requiredDocument', $buildingDocumentation) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="कागजातहरु">
                                                <i class="fa fa-file"></i>
                                            </a>
                                            @if (empty($buildingDocumentation->registration_no))
                                                <a data-bs-type="sent-to-admin"
                                                   class="btn me-1 btn-xs {{ $buildingDocumentation->sent_to_admin_at == null ? 'btn-outline-danger' : 'btn-outline-success' }}"
                                                   href="{{ route('organization.admin.updateAdminStatus', $buildingDocumentation) }}"
                                                   data-bs-toggle="tooltip" data-bs-placement="top"
                                                   title="एडमिनलाई पठाउनुस">
                                                    <i
                                                        class="fa {{ $buildingDocumentation->sent_to_admin_at == null ? 'fa-times' : 'fa-check' }}"></i>
                                                    {{--                                                    {{ $mapApply->sent_to_admin_at == null ? 'सक्रिय गर्नुहोस्' : 'निष्क्रिय गर्नुहोस्' }} --}}
                                                </a>
                                                <form action="{{ route('organization.admin.buildingDocumentation.destroy', $buildingDocumentation) }}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')

                                                    @if (empty($buildingDocumentation->registration_no))
                                                        <button data-bs-type="delete"
                                                                class="btn btn-xs btn-outline-danger show_confirm">
                                                            <i class="fa fa-trash {{ get_setting('Pin') ? 'confirm_pin' : 'show_confirm' }}"
                                                               data-bs-toggle="tooltip" data-bs-placement="top"
                                                               title="मेटाउनु होस्"></i>
                                                        </button>
                                                    @endif

                                                </form>
                                            @endif
                                        @else
                                            तपाईको फारम पालिकाले स्वीकार गरेको छ
                                            <a data-bs-type="file" class="btn btn-xs btn-outline-info mx-1"
                                               href="{{ route('organization.admin.requiredDocument', $buildingDocumentation) }}"
                                               data-bs-toggle="tooltip" data-bs-placement="top" title="कागजातहरु">
                                                <i class="fa fa-file"></i>
                                            </a>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
