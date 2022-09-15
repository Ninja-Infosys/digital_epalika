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
                            <a href="{{route('admin.circular.registration.index')}}">दर्ता प्रणाली </a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ दर्ता पत्र थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">दर्ता प्रणाली</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ दर्ता पत्र थप्नुहोस्</h4>
                        <a href="{{route('admin.circular.registration.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> दर्ता पत्र सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.circular.registration.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="registration_no" class="form-label">दर्ता न.  *</label>
                                    <input
                                        type="text"
                                        name="registration_no"
                                        value="{{old('registration_no')}}"
                                        class="form-control @error('registration_no') is-invalid @enderror"
                                        id="registration_no"
                                        placeholder="दर्ता न."
                                    />
                                    @error('registration_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="registration_date" class="form-label">दर्ता मिति  *</label>
                                    <input
                                        type="text"
                                        name="registration_date"
                                        value="{{old('registration_date')}}"
                                        class="form-control @error('registration_date') is-invalid @enderror"
                                        id="registration_date"
                                        placeholder="दर्ता मिति"
                                    />
                                    @error('registration_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="letter_number" class="form-label">पत्र संख्या  *</label>
                                    <input
                                        type="text"
                                        name="letter_number"
                                        value="{{old('letter_number')}}"
                                        class="form-control @error('letter_number') is-invalid @enderror"
                                        id="letter_number"
                                        placeholder="पत्र संख्या"
                                    />
                                    @error('letter_number')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="letter_date" class="form-label">पत्रको मिति  *</label>
                                    <input
                                        type="text"
                                        name="letter_date"
                                        value="{{old('letter_date')}}"
                                        class="form-control @error('letter_date') is-invalid @enderror"
                                        id="letter_date"
                                        placeholder="पत्रको मिति "
                                    />
                                    @error('letter_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="sender_name" class="form-label">पठाउने कार्यालयको नाम  *</label>
                                    <input
                                        type="text"
                                        name="sender_name"
                                        value="{{old('sender_name')}}"
                                        class="form-control @error('sender_name') is-invalid @enderror"
                                        id="sender_name"
                                        placeholder="पठाउने कार्यालयको नाम"
                                    />
                                    @error('sender_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="subject" class="form-label">बिषय  *</label>
                                    <input
                                        type="text"
                                        name="subject"
                                        value="{{old('subject')}}"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        id="subject"
                                        placeholder="बिषय"
                                    />
                                    @error('subject')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="remarks" class="form-label">कैफ़ियत *</label>
                                    <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control" placeholder="कैफ़ियत">{{old('remarks')}}</textarea>
                                    @error('remarks')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> बुझिलिनेको बिवरण</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="receiver_name" class="form-label">नाम *</label>
                                    <input
                                        type="text"
                                        name="receiver_name"
                                        value="{{old('receiver_name')}}"
                                        class="form-control @error('receiver_name') is-invalid @enderror"
                                        id="receiver_name"
                                        placeholder="नाम"
                                    />
                                    @error('receiver_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{old('phone')}}"
                                        class="form-control"
                                        id="phone"
                                        placeholder="सम्पर्क नम्बर"
                                    />
                                    @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="signature_image" class="form-label">सहि *</label>
                                    <input
                                        type="file"
                                        name="signature_image"

                                        class="form-control"
                                        id="signature_image"

                                    />
                                    @error('signature_image')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="date" class="form-label">मिति *</label>
                                    <input
                                        type="text"
                                        name="date"
                                        value="{{old('date')}}"
                                        class="form-control"
                                        id="date"
                                        placeholder="मिति"
                                    />
                                    @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>डकुमेन्ट राख्नुहोस्</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-12 mb-2">
                                    <label for="circularDocuments" class="form-label">डकुमेन्ट *</label>
                                    <input
                                        type="file"
                                        name="circularDocuments[]"

                                        class="form-control @error('circularDocuments') is-invalid @enderror"
                                        id="circularDocuments"

                                   multiple />
                                    @error('circularDocuments')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('circularDocuments.*')
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
@endsection
