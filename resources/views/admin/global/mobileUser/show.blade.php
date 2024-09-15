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
                        <li class="breadcrumb-item active">सेवाग्राही</li>
                    </ol>
                </div>
                <h4 class="page-title">सेवाग्राही विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-xl-4">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ $mobileUser->avatar }}" class="rounded-circle mb-1 avatar-lg img-thumbnail"
                        alt="profile-image">
                    <h4 class="mt-2 text-black">व्यक्तिगत विवरण</h4>
                    <a href="{{ route('admin.mobileUser.update-login-status', $mobileUser) }}"
                        class="btn btn-{{ $mobileUser->is_active == 1 ? 'success' : 'danger' }} btn-xs waves-effect mb-2 waves-light"
                        title="लग इन {{ $mobileUser->is_active == 1 ? 'गर्न मिल्छ' : 'गर्न मिल्दैन' }}">
                        <i class="fa  {{ $mobileUser->is_active == 1 ? ' fa-check' : 'fa-window-close' }}"></i>
                        लग इन स्थिति
                    </a>

                    <div class="text-start mt-3">

                        <p class="text-muted mb-2 font-15"><strong>नाम :</strong> <span
                                class="ms-2">{{ $mobileUser->name ?? '' }}</span>
                        </p>
                        <p class="text-muted mb-2 font-15"><strong>इमेल :</strong><span
                                class="ms-2">{{ $mobileUser->email ?? '' }}</span></p>

                        <p class="text-muted mb-2 font-15"><strong>फोन :</strong> <span
                                class="ms-2">{{ $mobileUser->phone ?? '' }}</span></p>
                        <h4 class="mt-2 text-black">स्थायि ठेगाना</h4>

                        <p class="text-muted mb-2 font-15"><strong>प्रदेश :</strong> <span
                                class="ms-2">{{ $mobileUser?->mobileUserDetail?->province?->province ?? '' }}</span></p>
                        <p class="text-muted mb-2 font-15"><strong>जिल्ला :</strong> <span
                                class="ms-2">{{ $mobileUser?->mobileUserDetail?->district?->district ?? ''}}</span></p>

                        <p class="text-muted mb-2 font-15"><strong>पालिका :</strong> <span
                                class="ms-2">{{ $mobileUser?->mobileUserDetail?->localBody?->local_body ?? '' }}</span></p>



                        <p class="text-muted mb-2 font-15"><strong>वडा नं. :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->ward_no ?? '' }}</span></p>

                        <p class="text-muted mb-2 font-15"><strong>टोल :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->tole ?? '' }}</span></p>
                        {{-- <h4 class="mt-2 text-black">अस्थायि ठेगाना</h4>

                        <p class="text-muted mb-2 font-15"><strong>प्रदेश :</strong> <span
                                class="ms-2">$mobileUser->mobileUserDetail->province?->province??''</span></p>
                        <p class="text-muted mb-2 font-15"><strong>जिल्ला :</strong> <span
                                class="ms-2">$mobileUser->mobileUserDetail->district?->district??''</span></p>

                        <p class="text-muted mb-2 font-15"><strong>पालिका :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->localBody?->localBody??'' }}</span></p>



                        <p class="text-muted mb-2 font-15"><strong>वडा नं. :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->temporary_ward??'' }}</span></p>

                        <p class="text-muted mb-2 font-15"><strong>टोल :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->temporary_tole??'' }}</span></p> --}}
                    </div>
                    <div @if (old('is_minor', optional($mobileUser->mobileUserDetail)->is_minor) != '0') style="display: none;" @endif>

                        <p class="text-muted mb-2 font-15"><strong>नागरिकता नं. :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->citizenship_no ?? '' }}</span></p>

                        <p class="text-muted mb-2 font-15"><strong>नागरिकता जारि जिल्ला :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->citizenship_issued_district ?? '' }}</span>
                        </p>

                        <p class="text-muted mb-2 font-15"><strong>नागरिकता जारि मिति:</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->citizenship_issued_date ?? '' }}</span></p>
                        <p class="text-muted mb-2 font-15"><strong>राष्ट्रिय परिचय प्रमाण पत्र नं. :</strong> <span
                                class="ms-2">{{ $mobileUser->mobileUserDetail->nec_no ?? '' }}</span></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="row col-md-12 d-flex gap-3">
        @if ($mobileUser->mobileUserDetail?->citizenship_front ?? '')
            <div class="col-md-3">
                <p>नागरिकताको फोटो(अगाडि)</p>
                <img src="{{ $mobileUser->mobileUserDetail->citizenship_front }}" style="height:200px; width:300px;"
                    alt="citizenship-front">
            </div>
        @endif
        @if ($mobileUser->mobileUserDetail?->citizenship_back ?? '')
            <div class="col-md-3">
                <p>नागरिकताको फोटो(पछाडि)</p>
                <img src="{{ $mobileUser->mobileUserDetail?->citizenship_back }}" style="height:200px; width:300px;"
                    alt="nec_certificate">
            </div>
        @endif
        @if ($mobileUser->mobileUserDetail?->nec_certificate ?? '')
            <div class="col-md-3">
                <p>राष्ट्रिय परिचय प्रमाण पत्रको फोटो</p>
                <img src="{{ $mobileUser->mobileUserDetail?->nec_certificate }}" style="height:200px; width:300px;"
                    alt="nec_certificate">
            </div>
        @endif
    </div>
    </div>
@endsection
