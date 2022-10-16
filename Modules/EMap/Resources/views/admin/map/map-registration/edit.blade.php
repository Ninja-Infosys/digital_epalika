@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दस्तुर तथा दर्ता सम्बन्धी</h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="card mb_30">
                                <div class="card-body p-3">
                                    <div class="font-black" id="printData">
                                        <form
                                            action="{{route('emap.admin.map.map-apply.map-registration.update', [$mapApply,$mapRegistration])}}"
                                            method="post">
                                            @csrf
                                            @method('PUT')

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
                                                @foreach($mapRegistration->mapRegistrationParticulars as $index=>$storeyDetail)

                                                    <tr>
                                                        <th scope="row">
                                                            <input type="hidden"
                                                                   class="form-control @error("particulars.$index.storey") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][id]"
                                                                   value="{{old("particular.$index.id",($storeyDetail->id?? '')) }}">
                                                            <input type="text"
                                                                   class="form-control @error("particulars.$index.storey") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][storey]"
                                                                   value="{{old("particular.$index.storey",($storeyDetail->storey?? '')) }}">
                                                            @error("particulars.$index.storey")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </th>
                                                        <td>
                                                            <input type="text"
                                                                   class="form-control @error("particulars.$index.area") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][area]"
                                                                   value="{{old('area',($storeyDetail->area?? 0)) }}">
                                                            @error("particulars.$index.area")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="form-control @error("particulars.$index.rate") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][rate]"
                                                                   value="{{old('rate',($storeyDetail->rate?? 0)) }}">
                                                            @error("particulars.$index.rate")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                        <td>
                                                            <input type="text"
                                                                   class="form-control @error("particulars.$index.remarks") is-invalid @enderror"
                                                                   name="particulars[{{$index}}][remarks]"
                                                                   value="{{old('remarks'), $storeyDetail->remarks }}">
                                                            @error("particulars.$index.remarks")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </td>
                                                    </tr>
                                                @endforeach


                                                <tr>
                                                    <th scope="row">फारम दस्तुर</th>
                                                    <td colspan="2">
                                                        <input type="text"
                                                               class="form-control @error("form_receipt") is-invalid @enderror"
                                                               name="form_receipt"
                                                               value="{{old('form_receipt',$mapRegistration->form_receipt) }}">
                                                        @error("form_receipt")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                    <td rowspan="4">राजस्व उपशाखामा बुझाउने</td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">निवेदक दर्ता दस्तुर</th>
                                                    <td colspan="2">
                                                        <input type="text"
                                                               class="form-control @error("application_registration_fee") is-invalid @enderror"
                                                               name="application_registration_fee"
                                                               value="{{old('application_registration_fee',$mapRegistration->application_registration_fee) }}">
                                                        @error("application_registration_fee")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">अन्य</th>
                                                    <td colspan="2">
                                                        <input type="text"
                                                               class="form-control @error("other") is-invalid @enderror"
                                                               name="other"
                                                               value="{{old('other',$mapRegistration->other) }}">
                                                        @error("other")
                                                        <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                            <div class="row">
                                                <div class="col-md-12 my-2">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label for="nepali_date">मिति</label>
                                                            <input type="text" name="nepali_date" class="form-control @error('nepali_date') is-invalid @enderror"
                                                                   id="nepali_date" value="{{old('nepali_date', ($mapRegistration->nepali_date ?? ''))}}">
                                                            @error('nepali_date')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="english_date">Date</label>
                                                            <input type="date" name="english_date" class="form-control @error('english_date') is-invalid @enderror"
                                                                   id="english_date" value="{{old('english_date', ($mapRegistration->english_date ?? ''))}}">
                                                            @error('english_date')
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-md-6 ">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="">रसिद नं:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"
                                                                   class="form-control @error("receipt_no") is-invalid @enderror"
                                                                   name="receipt_no"
                                                                   value="{{old('receipt_no', $mapRegistration->receipt_no) }}">
                                                            @error("receipt_no")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="">रकम बुझने:</label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <input type="text"
                                                                   class="form-control @error("recipient") is-invalid @enderror"
                                                                   name="recipient"
                                                                   value="{{old('recipient', $mapRegistration->recipient) }}">
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
    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#nepali_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let parsedDate = NepaliFunctions.ParseDate($("#nepali_date").val());
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        $("#english_date").val(formattedDate)
                    }
                });

                $("#english_date").change(function () {
                    let parsedDate = NepaliFunctions.ParseDate($("#english_date").val());
                    let nepaliDate = NepaliFunctions.AD2BS(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(nepaliDate, "YYYY-MM-DD")
                    $("#nepali_date").val(formattedDate)
                })
            });
        </script>
    @endpush
@endsection
