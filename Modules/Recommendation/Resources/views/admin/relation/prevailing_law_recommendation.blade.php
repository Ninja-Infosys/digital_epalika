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


                                <p class="text-center my-3"><b>विषय : प्रचलित कानून अनुसार प्रत्यायोजित अधिकार बमोजिमको अन्य सिफारिस वा प्रमाणित गर्ने । (३६) </b></p>
                                <p><b>श्री जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">यस सम्बन्धी सिफारिस गर्दा स्थानीय सरकार संचालन ऐन,२०७४ ले वडा कार्यालय तथा स्थानीय तहलाई दिएको अधिकार क्षेत्र, संविधानका अनुसूची
                                    बमोजिम स्थानीय सरकारको कार्यक्षेत्र भित्र रहेका विषय तथा अन्य संधीय र प्रदेश कानून बमोजिम स्थानीय तहलाई प्रत्यायोजन गरेका विषयमा मात्र सिफारिस वा प्रमाणित
                                    गर्नुपर्नेछ । सिफारिस वा प्रमाणित गर्दा गर्नुपर्नाका आधार र प्रमाण, आवश्यक भएमा स्थानीय सर्जमिन मुचुल्का, प्रहरी प्रतिवेदन, प्रचलित कानून आदिलाई आधार मानि
                                    स्थानीय सरकार संचालन ऐन,२०७४ को दफा १२(२)ङ(३६) बमोजिम प्रमाणित गरिन्छ ।</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>
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
