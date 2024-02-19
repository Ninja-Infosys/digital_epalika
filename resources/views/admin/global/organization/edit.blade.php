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
                        <li class="breadcrumb-item active">संगठन अद्यावधिक </li>
                    </ol>
                </div>
                <h4 class="page-title">संगठन अद्यावधिक</h4>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card p-0">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h3 class="card-title mb-0">संगठन अद्यावधिक</h3>
                    <a href="{{route('organization.auth-organization.profile')}}" class="btn btn-outline-primary btn-sm">
                        <i class="fa fa-list"></i> प्रोफाइल
                    </a>
                </div>
            </div>
            <div class="card-body px-0">
                <form action="{{ route('organization.auth-organization.update',$organization) }}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder">संगठन विवरण</legend>
                        <div class="card">
                            <div class="row">
                                <div class="col-md-8 mb-2">
                                    <label for="org_name_ne" class="form-label">संगठनको नाम <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <input name="org_name_ne"
                                               value="{{old('org_name_ne',$organization->organizationDetail->org_name_ne??'')}}"
                                               class="form-control @error('org_name_ne') is-invalid @enderror"
                                               type="text" id="org_name_ne" placeholder="नेपालीमा"
                                               >
                                        @error('org_name_ne')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <input name="org_name_en"
                                               value="{{old('org_name_en',$organization->organizationDetail->org_name_en??'')}}"
                                               class="form-control @error('org_name_en') is-invalid @enderror"
                                               type="text" id="org_name_en" placeholder="In English">
                                        @error('org_name_en')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="org_email" class="form-label">इमेल
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                    <span class="input-group-text" id="org_email">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                        <input name="org_email"
                                               value="{{old('org_email',$organization->organizationDetail->org_email??'')}}"
                                               class="form-control @error('org_email') is-invalid @enderror"
                                               type="text" id="org_email" placeholder="इमेल"
                                              >
                                    </div>
                                    @error('org_email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="org_contact" class="form-label">सम्पर्क नम्बर
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="input-group">
                                    <span class="input-group-text" id="org_contact">
                                        <i class="fa fa-phone"></i>
                                    </span>
                                        <input name="org_contact"
                                               value="{{old('org_contact',$organization->organizationDetail->org_contact??'')}}"
                                               class="form-control @error('org_contact') is-invalid @enderror"
                                               type="text" id="org_contact" placeholder="सम्पर्क नम्बर"
                                               >
                                    </div>
                                    @error('org_contact')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="org_pan_no" class="form-label">पाना नं.</label>
                                    <input name="org_pan_no"
                                           value="{{old('org_pan_no',$organization->organizationDetail->org_pan_no??'')}}"
                                           class="form-control @error('org_pan_no') is-invalid @enderror"
                                           type="text" id="org_pan_no" placeholder="पाना नं."
                                    />
                                    @error('org_pan_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="org_registration_no" class="form-label">कम्पनी दर्ता
                                        नं:</label>
                                    <input name="org_registration_no"
                                           value="{{old('org_registration_no',$organization->organizationDetail->org_registration_no??'')}}"
                                           class="form-control @error('org_registration_no') is-invalid @enderror"
                                           type="text" id="org_registration_no" placeholder="कम्पनी दर्ता न:"
                                            />
                                    @error('org_registration_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder">
                            कागजातहरू
                        </legend>
                        <div class="card">
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <label for="logo" class="form-label">कम्पनी लोगो
                                    <span class="text-danger">*</span></label>
                                <input type="file" name="logo" class="form-control"
                                       id="logo"  />
                                @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="org_registration_document" class="form-label">कम्पनी
                                    प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input type="file"
                                       name="org_registration_document"
                                       class="form-control"
                                       id="org_registration_document" />
                                @error('org_registration_document')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4 mb-2">
                                <label for="org_pan_document" class="form-label">पाना
                                    प्रमाणपत्र <span class="text-danger">*</span></label>
                                <input type="file"
                                       name="org_pan_document"
                                       class="form-control"
                                       id="org_pan_document"  />
                                @error('org_pan_document')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="title text-primary fs-4 fw-bolder">
                            प्रयोगकर्ता
                        </legend>
                        <div class="card p-2">
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="name" class="form-label">प्रयोगकर्ताको नाम <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                <span class="input-group-text" id="name">
                                    <i class="fa fa-user"></i>
                                </span>
                                        <input name="name" value="{{old('name',$organization->name)}}" class="form-control @error('name') is-invalid @enderror"
                                               type="text" id="name" placeholder="प्रयोगकर्ताको नाम" >
                                    </div>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="email" class="form-label">इमेल <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                <span class="input-group-text" id="email">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                        <input name="email" class="form-control @error('email') is-invalid @enderror"
                                               type="email" value="{{old('email',$organization->email)}}" id="email" placeholder="इमेल" >
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-2">
                                    <label for="phone" class="form-label">सम्पर्क नं. <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                <span class="input-group-text" id="phone">
                                    <i class="fa fa-envelope"></i>
                                </span>
                                        <input name="phone" value="{{old('phone',$organization->phone)}}" class="form-control @error('phone') is-invalid @enderror"
                                               type="text" id="phone" placeholder="सम्पर्क नं" >
                                    </div>
                                    @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
