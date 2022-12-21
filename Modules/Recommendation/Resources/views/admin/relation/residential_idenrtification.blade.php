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
                                <div class="image mt-3">
                                    <div class="flex-container" style="display:flex">
                                        <div class="item-auto" style="flex:1 1 auto; margin-bottom:0rem; margin-left:0rem; margin-right:4rem; margin-top:0rem; text-align:center"><img alt="" src="http://localhost:8000/storage/photos/1/cropped-logo.png" style="float:left; height:100px; width:110px" /></div>

                                        <div class="item-auto" style="flex:1 1 auto; margin-right:8rem; margin-top:0rem; text-align:center"><strong><span style="font-size:20px">....................पालिका</span><br />
                                                <span style="font-size:16px">वडा नं. ....................को कार्यालय</span></strong><br />
                                            <span style="font-size:14px">........(कार्यालय रहेको स्थान) ............(जिल्ला)<br />
........................ प्रदेश, नेपाल</span></div>

                                        <div class="item-auto" style="flex:1 1 auto; margin-bottom:0rem; margin-left:4rem; margin-right:0rem; margin-top:0rem; text-align:center">&nbsp;</div>
                                    </div>


                                <p class="text-center my-3"><b>बिषय : बन्द घर र कोठा खोल्न रोहवरमा बस्ने/बसेको प्रमाणित । (४) </b></p>
                                <p><b>जो जससँग सम्बन्धित छ ।</b></p>
                                <p class="my-3">...............गाउँ/नगरपालिका ............... वडा नं. ..............को ................. मा बस्ने श्री ................. ले बन्द घर/कोठा
                                    खुलाई पाउँ भनी दिएको निवेदन उपर मिति ............ मा बन्द घर वा कोठा खोल्ने सम्बन्धमा जारी गरेको सूचना बमोजिम सरोकारवालाहरुको उपस्थितिमा (यसै साथ संलग्न मुचुल्का बमोजिम) बन्द
                                    घर/कोठा खोलिएको व्यहोरा स्थानीय सरकार संचालन ऐन, २०७४ को दफा १२(२)ङ(४) बमोजिम सिफारिस/प्रमाणित गरिन्छ ।</p>
                                <div class="d-flex justify-content-end mt-2">
                                    <p class="text-center">हस्ताक्षर ........................<br>(वडा अध्क्षय) </p>
                                </div>

                                <p class="mt-5">नोट : बन्द/कोठा खोल्दा उपलब्ध भएसम्म स्थानीय प्रहरीको रोहवरमा खोल्नुपर्नेछ ।</p>
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
