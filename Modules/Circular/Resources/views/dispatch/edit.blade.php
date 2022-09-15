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
                            <a href="{{route('admin.circular.dispatch.index')}}">चलानी प्रणाली </a>
                        </li>
                        <li class="breadcrumb-item active">चलानी पत्र अपडेट थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">चलानी प्रणाली</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">चलानी प्रणाली थप्नुहोस्</h4>
                        <a href="{{route('admin.circular.dispatch.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> चलानी प्रणाली सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.circular.dispatch.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="dispatch_no" class="form-label">चलानी न.</label>
                                    <input
                                        type="text"
                                        name="dispatch_no"
                                        value="{{old('dispatch_no',$dispatch->dispatch_no)}}"
                                        class="form-control @error('dispatch_no') is-invalid @enderror"
                                        id="dispatch_no"
                                        placeholder="चलानी न."
                                    />
                                    @error('dispatch_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="dispatch_date" class="form-label">चलानी मिति </label>
                                    <input
                                        type="text"
                                        name="dispatch_date"
                                        value="{{old('dispatch_date', $dispatch->dispatch_date)}}"
                                        class="form-control @error('dispatch_date') is-invalid @enderror"
                                        id="dispatch_date"
                                        placeholder="चलानी मिति"
                                    />
                                    @error('dispatch_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="letter_number" class="form-label">पत्र संख्या</label>
                                    <input
                                        type="text"
                                        name="letter_number"
                                        value="{{old('letter_number', $dispatch->letter_number)}}"
                                        class="form-control @error('letter_number') is-invalid @enderror"
                                        id="letter_number"
                                        placeholder="पत्र संख्या"
                                    />
                                    @error('letter_number')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="letter_date" class="form-label">पत्रको मिति </label>
                                    <input
                                        type="text"
                                        name="letter_date"
                                        value="{{old('letter_date', $dispatch->letter_date)}}"
                                        class="form-control @error('letter_date') is-invalid @enderror"
                                        id="letter_date"
                                        placeholder="पत्रको मिति "
                                    />
                                    @error('letter_date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="receiver_name" class="form-label">पाउने कार्यालयको नाम </label>
                                    <input
                                        type="text"
                                        name="receiver_name"
                                        value="{{old('receiver_name', $dispatch->receiver_name)}}"
                                        class="form-control @error('receiver_name') is-invalid @enderror"
                                        id="receiver_name"
                                        placeholder="पाउने कार्यालयको नाम"
                                    />
                                    @error('receiver_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="receiver_address" class="form-label">पाउने कार्यालयको ठेगाना</label>
                                    <input
                                        type="text"
                                        name="receiver_address"
                                        value="{{old('receiver_address',$dispatch->receiver_address)}}"
                                        class="form-control @error('receiver_address') is-invalid @enderror"
                                        id="receiver_address"
                                        placeholder="पाउने कार्यालयको ठेगाना"
                                    />
                                    @error('receiver_address')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="subject" class="form-label">बिषय </label>
                                    <input
                                        type="text"
                                        name="subject"
                                        value="{{old('subject',$dispatch->subject)}}"
                                        class="form-control @error('subject') is-invalid @enderror"
                                        id="subject"
                                        placeholder="बिषय"
                                    />
                                    @error('subject')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="receiver_contact" class="form-label">हुलाक/ र.न./इमेल </label>
                                    <input
                                        type="text"
                                        name="receiver_contact"
                                        value="{{old('receiver_contact',$dispatch->receiver_contact)}}"
                                        class="form-control @error('receiver_contact') is-invalid @enderror"
                                        id="receiver_contact"
                                        placeholder="हुलाक/ र.न. "
                                    />
                                    @error('receiver_contact')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="receiver_signature" class="form-label">बुझिलिनेको हस्तक्षर्</label>
                                    <input
                                        type="file"
                                        name="receiver_signature"
                                        class="form-control"
                                        id="receiver_signature"
                                    />
                                    @error('receiver_signature')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="remarks" class="form-label">कैफ़ियत</label>
                                    <textarea name="remarks" id="remarks" cols="30" rows="5" class="form-control" placeholder="कैफ़ियत">{{old('remarks',$dispatch->remarks)}}</textarea>
                                    @error('remarks')
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
                                    <label for="documents" class="form-label">डकुमेन्ट *</label>
                                    <input
                                        type="file"
                                        name="documents[]"

                                        class="form-control @error('documents') is-invalid @enderror"
                                        id="Documents"

                                        multiple />
                                    @error('documents')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('documents.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
