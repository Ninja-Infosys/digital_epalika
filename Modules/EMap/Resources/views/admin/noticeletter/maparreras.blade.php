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
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <p class="text-center my-3"><b>नक्सा पासको लागि १५ दिने टास मुचुल्का ।</b>
                                <br>
                                <b>(कार्यालय प्रयोजनको लागि)</b></p>
                                <p class="mb-3">
                                   यस उप-महानगरपालिका वडा नं.<span class="underline-dotted"></span> टोल<span class="underline-dotted"></span> मा अवस्थित साविक <span class="underline-dotted"></span> कित्ता नं.<span class="underline-dotted"></span> क्षेत्रफल <span class="underline-dotted"></span> मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted"></span> ले भवन निर्माणको इजाजत प्रयोजनको सिलसिलामा यस उप-महानगरपालिका कार्यालयको च नं.<span class="underline-dotted"></span> मिति <span class="underline-dotted"></span> गते प्रकाशित १५ दिने सन्धी सर्पंन बारेको सूचना घरधनीले हामीहरुको रोहवरमा निर्माण स्थलको सबैले देख्ने ठाउँमा टास गरेको ठिक हो |
                                </p>
                                <h5>साक्षीहरु :-</h5>
                                <p>१. श्री<span class="underline-dotted"></span>   दरखास्त <span class="underline-dotted"></span></p>
                                <p>२. श्री<span class="underline-dotted"></span>   दरखास्त <span class="underline-dotted"></span></p>
                                <p>३. श्री<span class="underline-dotted"></span>   दरखास्त <span class="underline-dotted"></span></p>
                                <p>घरधनी:-</p>
                                <p>श्री<span class="underline-dotted"></span>   दरखास्त <span class="underline-dotted"></span></p>
                                <p>उपर्युक्त सूचना संधियारहरुलाई बुभाई निर्माण स्थलमा टास गरी वडा समिति मार्फत नेपालगञ्ज उप-महानगरपालिका नगर कार्यपालिकाको कार्यालयमा चढायौ |</p>
                                <p>काम तामेल गर्ने:-</p>
                                <p>दरखास्त :- <span class="underline-dotted"></span>  </p>
                                <p>नाम :- <span class="underline-dotted"></span>  </p>
                                <p>पद :- <span class="underline-dotted"></span>  </p>
                                <p><span class="underline-dotted"></span>नं. वडा समितिको कार्यालय</p>
                                <p class="text-center my-3"><b><span class="underline-dotted"></span>मिति <span class="underline-dotted"></span>साल <span class="underline-dotted"></span>महिना <span class="underline-dotted"></span>गते</b></p>
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
