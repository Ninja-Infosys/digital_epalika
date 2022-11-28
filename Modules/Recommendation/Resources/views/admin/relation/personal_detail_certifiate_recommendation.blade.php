@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3> </h3>
                        <div class="d-flex justify-content-end">
                            <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                                    requestRoute="{{route('print.application-print')}}">
                                <i class="fa fa-print"></i> Print
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="flex-container" style="display:flex">
                                    <div class="item-auto" style="flex:1 1 auto; margin-bottom:0rem; margin-left:0rem; margin-right:4rem; margin-top:0rem; text-align:center"><img alt="" src="http://localhost:8000/storage/photos/1/cropped-logo.png" style="float:left; height:100px; width:110px" /></div>

                                    <div class="item-auto" style="flex:1 1 auto; margin-right:8rem; margin-top:0rem; text-align:center"><strong><span style="font-size:20px">....................पालिका</span><br />
                                            <span style="font-size:16px">वडा नं. ....................को कार्यालय</span></strong><br />
                                        <span style="font-size:14px">........(कार्यालय रहेको स्थान) ............(जिल्ला)<br />
........................ प्रदेश, नेपाल</span></div>

                                    <div class="item-auto" style="flex:1 1 auto; margin-bottom:0rem; margin-left:4rem; margin-right:0rem; margin-top:0rem; text-align:center">&nbsp;</div>
                                </div>


                                <p class="text-center my-3"><b>विषय : व्यत्तिगत विवरण प्रमाणित वा सिफारिस । (१३) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">व्यत्तिगत के के विवरण प्रमाणित गर्नुपर्ने हो सो को प्रमाण राखेर सो को आधारमा मात्र स्थानीय सरकार संचालन ऐन,
                                    २००७४ को दफा १२(२)ङ(१३) बमोजिम प्रमाणित वा सिफारिस गरिदिनु पर्नेछ ।
                                जस्तै : कसैको शैक्षिक योग्यता प्रमाणित गर्नुपर्ने भएमा निजको शैक्षिक योग्यता हेरी सो को प्रमाण आधारमा मात्र गर्ने ।</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{asset('assets/backend/js/printAjaxScript.js')}}"></script>
    @endpush

@endsection
