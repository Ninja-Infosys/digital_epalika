@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section">
        <div class="breadcrumb d-flex pt-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500" href="{{ url('e-map') }}">सेवाग्राही</a>
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z" />
                            </svg>
                            <a class="ml-1 text-primary-500" href="">सेवाग्राहीको विवरण फारम</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row d-flex mt-5 ">
                <h4 class="fw-semibold text-left">सेवाग्राहीको विवरण फारम</h4>
                <div class="row justify-content-center">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card p-0">

                                    <div class="card-body px-2">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form action="{{ route('mobileUser.mobileUserDetail.store', $mobileUser) }}"
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <fieldset>
                                                <legend>
                                                    <h4 class="text-info">व्यक्तिगत विवरण</h4>
                                                </legend>
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="is_minor" class="form-label">प्रकार</label>
                                                        <select class="form-select" name="is_minor" id="is_minor">
                                                            <option value="">छान्नुहोस्</option>
                                                            <option value="0">बालिक</option>
                                                            <option value="1">नाबालिक</option>
                                                        </select>
                                                        @error('is_minor')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3" id="citizenship_no_field"
                                                        style="display: none;">
                                                        <label for="citizenship_no" class="form-label">नागरिकता नं.</label>
                                                        <input
                                                            class="form-control @error('citizenship_no') is-invalid @enderror"
                                                            type="text" id="citizenship_no" placeholder="नागरिकता नं."
                                                            name="citizenship_no" />
                                                        @error('citizenship_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3" id="birth_certificate_no_field"
                                                        style="display: none;">
                                                        <label for="birth_certificate_no" class="form-label">जन्म दर्ता
                                                            नं.</label>
                                                        <input
                                                            class="form-control @error('birth_certificate_no') is-invalid @enderror"
                                                            type="text" id="birth_certificate_no"
                                                            placeholder="जन्म दर्ता नं." name="birth_certificate_no" />
                                                        @error('birth_certificate_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4 mb-2">
                                                        <label for="name" class="form-label">सेवाग्रहिको नाम
                                                            *</label>
                                                        <input type="text" name="name"
                                                            value="{{ old('name', $mobileUser->name ?? '') }}"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            id="name" placeholder="सेवाग्रहिको नाम" />
                                                        @error('name')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="email" class="form-label">सेवाग्राहिको इमेल
                                                            *</label>
                                                        <input type="text" name="email"
                                                            value="{{ old('email', $mobileUser->email ?? '') }}"
                                                            class="form-control @error('email') is-invalid @enderror"
                                                            id="email" placeholder="सेवाग्राहिको इमेल" />
                                                        @error('email')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="phone" class="form-label">सेवाग्रहिको सम्पर्क नं.
                                                            *</label>
                                                        <input type="text" name="phone"
                                                            value="{{ old('phone', $mobileUser->phone ?? '') }}"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            id="phone" placeholder="सेवाग्रहिको नाम" />
                                                        @error('phone')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="avatar" class="form-label">सेवाग्राहिको फोटो
                                                            *</label>
                                                        <input type="file" name="avatar"
                                                            value="{{ old('avatar', $mobileUser->avatar ?? '') }}"
                                                            class="form-control @error('avatar') is-invalid @enderror"
                                                            id="avatar" placeholder="सेवाग्राहिको इमेल" />
                                                        @if ($mobileUser->avatar ?? '')
                                                            <div class="col-md-3">

                                                                <img src="{{ $mobileUser->avatar }}"
                                                                    style="height:200px; width:300px;"
                                                                    alt="सेवाग्राहिको फोटो">
                                                            </div>
                                                        @endif
                                                        @error('avatar')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="gender" class="form-label">लिंग *</label>
                                                        <select id="gender" name="gender" class="form-select">
                                                            <option value="">-- छान्नुहोस् --</option>
                                                            @foreach (\App\Enums\Gender::cases() as $gender)
                                                                <option
                                                                    {{ $gender->value == old('gender') ? 'selected' : '' }}
                                                                    value="{{ $gender->value }}">{{ $gender->label() }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                        @error('gender')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>


                                                    <div class="col-md-4 mb-2">
                                                        <label for="nec_no" class="form-label">राष्ट्रिय परिचय पत्र नं.
                                                            *</label>
                                                        <input type="text" name="nec_no"
                                                            value="{{ old('nec_no', $mobileUser->mobileUserDetail?->nec_no ?? '') }}"
                                                            class="form-control @error('nec_no') is-invalid @enderror"
                                                            id="nec_no" placeholder="राष्ट्रिय परिचय पत्र नं." />
                                                        @error('nec_no')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="citizenship_issued_date" class="form-label"> जारि
                                                            मिति *</label>
                                                        <div class="input-group">
                                                            <input name="citizenship_issued_date"
                                                                value="{{ old('citizenship_issued_date', $mobileUser->mobileUserDetail?->citizenship_issued_date ?? '') }}"
                                                                class="form-control @error('citizenship_issued_date') is-invalid @enderror"
                                                                type="date" id="citizenship_issued_date"
                                                                placeholder="जारि मिति">
                                                            @error('citizenship_issued_date')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="citizenship_issued_district" class="form-label">
                                                            जारी
                                                            जिल्ला *

                                                            <div class="input-group">
                                                                <select name="citizenship_issued_district"
                                                                    class="form-select @error('citizenship_issued_district') is-invalid @enderror"
                                                                    id="citizenship_issued_district">
                                                                    <option>---जिल्ला छान्नुहोस् ----</option>
                                                                    @foreach (get_districts() as $district)
                                                                        <option value="{{ $district->id }}"
                                                                            @if ($mobileUser->mobileUserDetail?->citizenship_issued_district == $district->id) selected @endif>
                                                                            {{ $district->district }}
                                                                        </option>
                                                                    @endforeach

                                                                </select>
                                                                @error('citizenship_issued_district')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @enderror
                                                            </div>

                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="citizenship_front" class="form-label">नागरिकताको फोटो
                                                            (अगाडी) *</label>
                                                        <input type="file" name="citizenship_front"
                                                            value="{{ old('citizenship_front') }}"
                                                            class="form-control @error('citizenship_front') is-invalid @enderror"
                                                            id="citizenship_front" />
                                                        @if ($mobileUser->mobileUserDetail->citizenship_front ?? '')
                                                            <div class="col-md-3">

                                                                <img src="{{ $mobileUser->mobileUserDetail->citizenship_front }}"
                                                                    style="height:200px; width:300px;"
                                                                    alt="citizenship-front">
                                                            </div>
                                                        @endif
                                                        @error('citizenship_front')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4 mb-2">
                                                        <label for="citizenship_back" class="form-label">नागरिकताको फोटो
                                                            (पछाडी)*</label>
                                                        <input type="file" name="citizenship_back"
                                                            value="{{ old('citizenship_back') }}"
                                                            class="form-control @error('citizenship_back') is-invalid @enderror"
                                                            id="citizenship_back" />
                                                        @if ($mobileUser->mobileUserDetail->citizenship_back ?? '')
                                                            <div class="col-md-3">

                                                                <img src="{{ $mobileUser->mobileUserDetail->citizenship_back }}"
                                                                    style="height:200px; width:300px;"
                                                                    alt="citizenship-back">
                                                            </div>
                                                        @endif
                                                        @error('citizenship_back')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset class="my-2">
                                                <legend>
                                                    <h4 class="text-info">स्थायी ठेगाना *</h4>
                                                </legend>
                                                <h6 class="py-2">नोट: कृपया क्रमशः प्रदेश, जिल्ला, गा.पा./न.पा., वार्ड
                                                    नं., गाउँ र टोल छनौट
                                                    गर्नुहोस् । </h6>
                                                @livewire('address', [
                                                    'province_id' => old('province_id', $mobileUser->mobileUserDetail?->province_id ?? ''),
                                                    'district_id' => old('district_id', $mobileUser->mobileUserDetail?->district_id ?? ''),
                                                    'local_body_id' => old('local_body_id', $mobileUser->mobileUserDetail?->local_body_id ?? ''),
                                                    'ward_no' => old('ward_no', $mobileUser->mobileUserDetail?->ward_no ?? ''),
                                                ])
                                                <div class="col-md-6 mb-2">
                                                    <label for="tole" class="form-label">
                                                        टोल</label>
                                                    <input type="text" name="tole"
                                                        value="{{ old('tole', $mobileUser->mobileUserDetail?->tole ?? '') }}"
                                                        class="form-control @error('tole') is-invalid @enderror"
                                                        id="tole" placeholder="टोल" />
                                                    @error('tole')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                            <fieldset class="my-2">
                                                <legend>
                                                    <h4 class="text-info">अस्थायी ठेगाना *</h4>
                                                </legend>
                                                <h6 class="py-2">नोट: कृपया क्रमशः प्रदेश, जिल्ला, गा.पा./न.पा., वार्ड
                                                    नं., गाउँ र टोल छनौट
                                                    गर्नुहोस् । </h6>
                                                @livewire('mobile-user-address', [
                                                    'temporary_province_id' => old('temporary_province_id', $mobileUser->mobileUserDetail?->temporary_province_id ?? ''),
                                                    'temporary_district_id' => old('temporary_district_id', $mobileUser->mobileUserDetail?->temporary_district_id ?? ''),
                                                    'temporary_local_body_id' => old('temporary_local_body_id', $mobileUser->mobileUserDetail?->temporary_local_body_id ?? ''),
                                                    'temporary_ward' => old('temporary_ward', $mobileUser->mobileUserDetail?->temporary_ward ?? ''),
                                                ])
                                                <div class="col-md-6 mb-2">
                                                    <label for="temporary_tole" class="form-label">
                                                        टोल</label>
                                                    <input type="text" name="temporary_tole"
                                                        value="{{ old('temporary_tole', $mobileUser->mobileUserDetail?->temporary_tole ?? '') }}"
                                                        class="form-control @error('temporary_tole') is-invalid @enderror"
                                                        id="temporary_tole" placeholder="टोल" />
                                                    @error('temporary_tole')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </fieldset>
                                            <button type="submit" class="btn btn-primary mt-2">
                                                पेश गर्नुहोस्
                                            </button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('scripts')
<script>
    document.getElementById('is_minor').addEventListener('change', function() {
        var selectedOption = this.value;
        if (selectedOption === '0') {
            document.getElementById('citizenship_no_field').style.display = 'block';
            document.getElementById('birth_certificate_no_field').style.display = 'none';
        } else if (selectedOption === '1') {
            document.getElementById('citizenship_no_field').style.display = 'none';
            document.getElementById('birth_certificate_no_field').style.display = 'block';
        } else {
            document.getElementById('citizenship_no_field').style.display = 'none';
            document.getElementById('birth_certificate_no_field').style.display = 'none';
        }
    });
</script>
@endpush
@endsection
