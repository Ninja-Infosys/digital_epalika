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
                        <li class="breadcrumb-item">नक्सा</li>
                        <li class="breadcrumb-item active">दस्तुर तथा दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">दस्तुर तथा दर्ता</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दस्तुर तथा दर्ता</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card mb_30">
                                <div class="card-body p-3">
                                    <div class="font-black" id="printData">
                                        <form
                                            action="{{route('emap.admin.map.map-apply.map-registration.store', $mapApply)}}"
                                            method="post">
                                            @csrf

                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th scope="col">तल्लाको विवरण</th>
                                                    <th scope="col">प्रस्तावित निर्माणको क्षेत्रफल ()</th>
                                                    <th>दर</th>
                                                    <th scope="col">कैफियत</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $totalRate = 0;
                                                @endphp
                                                @foreach($mapApply->storeyDetails as $index=>$storeyDetail)
                                                    @php
                                                        $totalRate+=($storeyDetail->mapFee->rate??0)
                                                    @endphp
                                                    <tr>
                                                        <th scope="row">
                                                            <input type="text"
                                                                   class="form-control @error("particulars.$index.storey") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][storey]"
                                                                   value="{{old("particular.$index.storey",($storeyDetail->mapFee->storey?? '')) }}">
                                                            @error("particulars.$index.storey")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </th>
                                                        <td>
                                                            <input type="text" class="form-control @error("particulars.$index.area") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][area]"
                                                                   value="{{old('area',($storeyDetail->total_area?? 0)) }}">
                                                            @error("particulars.$index.area")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td><input type="text" class="form-control @error("particulars.$index.rate") is-invalid @enderror"
                                                                       name="particulars[{{$index}}][rate]"
                                                                       value="{{old('rate',($storeyDetail->mapFee->rate?? 0)) }}">
                                                            @error("particulars.$index.rate")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control @error("particulars.$index.remarks") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][remarks]"
                                                                   value="{{old('remarks') }}">
                                                            @error("particulars.$index.remarks")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                <tr>
                                                    <th scope="row">फारम दस्तुर</th>
                                                    <td colspan="2">
                                                        <input type="number" class="form-control @error("form_receipt") is-invalid @enderror" name="form_receipt"
                                                                               value="{{old('form_receipt',0) }}">
                                                         @error("form_receipt")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                    </td>
                                                    <td rowspan="4">राजस्व उपशाखामा बुझाउने</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">निवेदक दर्ता दस्तुर</th>
                                                    <td colspan="2">
                                                        <input type="number" class="form-control @error("application_registration_fee") is-invalid @enderror"
                                                                               name="application_registration_fee"
                                                                               value="{{old('application_registration_fee',0) }}">
                                                         @error("application_registration_fee")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">अन्य</th>
                                                    <td colspan="2">
                                                        <input type="number" class="form-control @error("other") is-invalid @enderror" name="other"
                                                                               value="{{old('other',0) }}">
                                                         @error("other")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 my-2">
                                                    <x-date-input-component
                                                        nameNe="nepali_date" labelNe="मिति"
                                                        nameEn="english_date" labelEn="Date"
                                                    />
                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="receipt_no">रसिद नं:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control @error("receipt_no") is-invalid @enderror"
                                                                   name="receipt_no"
                                                                   value="{{old('receipt_no') }}">
                                                            @error("receipt_no")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="recipient">रकम बुझने:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="number" class="form-control @error("recipient") is-invalid @enderror"
                                                                   name="recipient"
                                                                   value="{{old('recipient') }}">
                                                            @error("recipient")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-sm btn-success">Save</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('style')
        <style>
            .font-black p {
                color: black;
            }

            .underline-dotted {
                border-bottom: dotted 2px !important;
                padding: 0 20px;
            }

            .custom-width {
                padding: 0 80px !important;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
