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

                                <div class="top-line d-flex justify-content-end mt-2">
                                    <p class="">मिति: <span class="underline-dotted custom-width">
                            </span></p>
                                </div>
                                <h3 class="text-center mt-3"><b>टिप्पणी र आदेश</b></h3>
                                <p class="text-center my-3"><b>बिषय: सुपरस्ट्रक्चर इजाजत सम्बन्धमा
                                        ।</b></p>
                                <p>श्रीमान,</p>
                                <p class="mb-3">
                                    जग्गा धनी श्री<span class="underline-dotted custom-width"></span> को नाममा दर्ता रहेको यस उप-महानगरपालिका वडा नं. <span class="underline-dotted custom-width"></span>
                                    टोल<span class="underline-dotted custom-width"></span> मा अवस्थित साविक <span class="underline-dotted custom-width"></span>कित्ता नं. <span class="underline-dotted custom-width"></span> क्षेत्रफल <span class="underline-dotted custom-width"></span> मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted custom-width"></span> दर्ता नं.
                                    <span class="underline-dotted custom-width"></span> ले भवन निर्माण गर्न मिति<span class="underline-dotted custom-width"></span> मा प्लिन्थ ईजाजत लिनु भएको हुँदा सोहि सिलसिलामा यस उप-महानगरपालिका कार्यालयका प्रबिधिक श्री<span class="underline-dotted custom-width"></span> ले स्थलगत निरिक्षण गरी पेश गर्नु भएको प्रतिवेदन अनुसार स्वीकृत भवन योजना मापदण्ड र नेपाल राष्ट्रिय
                                    भवन संहिता २०६० को पालना भएको प्रतिवेदन प्राप्त हुन आएकोले सुपरस्ट्रक्चर ईजाजत दिनको लागि मनासिब देखि पेश गरेको छु |
                                </p>
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
