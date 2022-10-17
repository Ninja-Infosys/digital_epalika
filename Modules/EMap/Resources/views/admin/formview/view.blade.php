@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                requestRoute="{{route('print.office-letter-print')}}">
                            <i class="fa fa-print"></i> Print
                        </button>

                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="d-flex justify-content-center my-5">
                                    <div class="row ">
                                        <div class="col-sm-6">
                                            <div class="card" style="width: 7rem; height: 8rem;">
                                                <div class="card-body">
                                                    <h5 class="card-title text-center my-4">फोटो</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="mt-3 ">
                                            <p><strong>पुरा नाम : </strong> <span class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; सुशील</span></p>
                                            <p><strong>इमेल : </strong> <span class="float-end"><span class="badge bg-danger">Unpaid</span></span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>लिङ्ग : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>वैबाहिक स्थिति : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>बुवाको नाम : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>हजुरबुवाको नाम : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                            <p><strong>समर्प्क नं. : </strong> <span class="float-end">000028 </span></p>
                                        </div>
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
                padding: 0 50px !important;
            }
        </style>
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
