@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.listRegistrations.listRegistration.index')}}">सुची दर्ता प्रणालि</a>
                        </li>
                        <li class="breadcrumb-item active">मौजुदा सुची दर्ता थप्नुहोस</li>
                    </ol>
                </div>
                <h4 class="page-title">मौजुदा सुची दर्ता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ सुची दर्ता थप्नुहोस्</h4>
                        <a href="{{route('admin.listRegistrations.listRegistration.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> मौजुदा सुची दर्ता बिवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.listRegistrations.listRegistration.store')}}" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>
                                    १. मौजुदा सूचीको लागि दर्ता दिने व्यक्ति, संस्था, आपूर्तिकर्ता,निर्माण ब्यबसायी,
                                    परामर्शदाता वा सेवा प्रदायकको बिबरण
                                </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="registration_no" class="form-label">दर्ता नम्बर * </label>
                                    <input
                                        type="text"
                                        name="registration_no"
                                        value="{{old('registration_no',$registration_no)}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="registration_no"
                                        placeholder="दर्ता नम्बर"
                                    />
                                    @error('registration_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="applicant_type" class="form-label">प्रकार *</label>
                                    <select name="applicant_type"
                                            class="form-select @error('applicant_type') is-invalid @enderror"
                                            id="applicant_type">
                                        <option value="">छान्नुहोस्</option>
                                        @foreach(config('defaults.applicant_types') as $applicant_type)
                                            <option
                                                value="{{$applicant_type}}" {{$applicant_type==old('applicant_type') ? 'selected' : ''}}>
                                                {{$applicant_type}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('applicant_type')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="form-label">नाम </label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name')}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="नाम"
                                    />
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="address" class="form-label">ठेगाना *</label>
                                    <input
                                        type="text"
                                        name="address"
                                        value="{{old('address')}}"
                                        class="form-control @error('address') is-invalid @enderror"
                                        id="address"
                                        placeholder="ठेगाना "
                                    />
                                    @error('address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="mailing_address" class="form-label">पत्राचार गर्ने ठेगाना *</label>
                                    <input
                                        type="text"
                                        name="mailing_address"
                                        value="{{old('mailing_address')}}"
                                        class="form-control @error('mailing_address') is-invalid @enderror"
                                        id="mailing_address"
                                        placeholder="पत्राचार गर्ने ठेगाना "
                                    />
                                    @error('mailing_address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="main_person" class="form-label">मुख्य व्यक्तिको नाम *</label>
                                    <input
                                        type="text"
                                        name="main_person"
                                        value="{{old('main_person')}}"
                                        class="form-control @error('main_person') is-invalid @enderror"
                                        id="main_person"
                                        placeholder="मुख्य व्यक्तिको  नाम"
                                    />
                                    @error('main_person')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="telephone" class="form-label">टेलिफोन नम्बर</label>
                                    <input
                                        type="text"
                                        name="telephone"
                                        value="{{old('telephone')}}"
                                        class="form-control @error('telephone') is-invalid @enderror"
                                        id="telephone"
                                        placeholder="टेलिफोन नम्बर"
                                    />
                                    @error('telephone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="mobile_no" class="form-label">मोबाइल नम्बर *</label>
                                    <input
                                        type="text"
                                        name="mobile_no"
                                        value="{{old('mobile_no')}}"
                                        class="form-control @error('mobile_no') is-invalid @enderror"
                                        id="mobile_no"
                                        placeholder="मोबाइल नम्बर"
                                    />
                                    @error('mobile_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>
                                    २. तपशिल कागजात अपलोड गर्नुहोस
                                </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="application_photo" class="form-label">निबेदन/अनुसूची २ (क)</label>
                                    <input type="file"
                                           name="application_photo"
                                           class="form-control @error('application_photo') is-invalid @enderror"
                                           id="application_photo">
                                    @error('application_photo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="registration_certificate" class="form-label">संस्था वा फार्म दर्ताको
                                        प्रमाण पत्र</label>
                                    <input type="file"
                                           name="registration_certificate"
                                           class="form-control @error('registration_certificate') is-invalid @enderror"
                                           id="registration_certificate">
                                    @error('registration_certificate')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="pan_photo" class="form-label">स्थायी लेखा नम्बर (PAN)</label>
                                    <input type="file"
                                           name="pan_photo"
                                           class="form-control @error('pan_photo') is-invalid @enderror"
                                           id="pan_photo">
                                    @error('pan_photo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="tax_payment_certificate" class="form-label">कर चुक्ता प्रमाण
                                        पत्र</label>
                                    <input type="file"
                                           name="tax_payment_certificate"
                                           class="form-control @error('tax_payment_certificate') is-invalid @enderror"
                                           id="tax_payment_certificate">
                                    @error('tax_payment_certificate')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-8 mb-2">
                                    <label for="license_photo" class="form-label">कुन खरिद को लागि सूची दर्ता हुन निबेदन
                                        दिने हो, सो को लागि इजाजत पत्र </label>
                                    <input type="file"
                                           name="license_photo"
                                           class="form-control @error('license_photo') is-invalid @enderror"
                                           id="tax_payment_certificate">
                                    @error('license_photo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="license_photo">अन्य फाइलहरु </label>
                                    @livewire('multiple-file')
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>
                                    ३. सार्बजनिक निकायबाट हुने खरिदको लागि दर्ता हुन चाहने खरिदको प्रकृति बिबरण
                                </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="business_nature" class="form-label">खरिद प्रकृति *</label>
                                    <select
                                        name="business_nature"
                                        class="form-select @error('business_nature') is-invalid @enderror"
                                        id="business_nature">
                                        <option value="">छान्नुहोस्</option>
                                        @foreach(config('defaults.business_natures') as $business_nature)
                                            <option
                                                value="{{$business_nature}}" {{$business_nature==old('business_nature') ? 'selected' : ''}}>
                                                {{$business_nature}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('business_nature')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="business_nature_description" class="form-label">बिबरण *</label>
                                    <textarea name="business_nature_description"
                                              id="business_nature_description"
                                              placeholder="बिबरण"
                                              class="form-control summernote @error('business_nature_description')  is-invalid @enderror"
                                              cols="30" rows="3">{{old('business_nature_description')}}</textarea>
                                    @error('business_nature_description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>
                                    ४. निबेदन मिति
                                </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="date" class="form-label">मिति *</label>
                                    <input
                                        type="text"
                                        name="date"
                                        value="{{old('date')}}"
                                        class="form-control nepali_date @error('date') is-invalid @enderror"
                                        id="date"
                                        placeholder="मिति"
                                    />
                                    @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".nepali_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    ndpYear: true
                });
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                let todayDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                $('#date').val(todayDate)
            });
        </script>
    @endpush
@endsection
