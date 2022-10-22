@extends('admin.layouts.master')
@section('content')
    <div>
        @error('file')
        <div class="alert alert-danger">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="card mb_30">
        <div class="card-header p-3">
            <div class="main-title d-flex justify-content-between">
                <h3> {{\Modules\EMap\Enums\NoticeTypeEnum::NOTICE_ISSUED_IN_THE_NAME_OF_SANGHIAR->label()}}</h3>
                <div class="d-flex justify-content-between">
                    <x-application-component
                        :application-type="\Modules\EMap\Enums\NoticeTypeEnum::NOTICE_ISSUED_IN_THE_NAME_OF_SANGHIAR"
                        url="{{route('emap.admin.map.map-apply.notice.upload.notice',$mapApply)}}"/>

                    <button id="printButton" class="btn btn-sm btn-success" printElementId='printData'
                            requestRoute="{{route('print.office-letter-print')}}">
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
                        <div class="top-line d-flex justify-content-between">
                            <p>पत्र सं: <span class="underline-dotted custom-width"></span></p>
                            <p>मिति: <span class="underline-dotted custom-width">
                            </span></p>
                        </div>


                        <p class="mt-2">चलानी नं: <span class="underline-dotted custom-width">

                            </span></p>
                        <h3 class="text-center my-3"><b>संधियारको नाममा जारी भएको सूचना
                            </b></h3>
                        <p class="mb-3">
                            यस {{config('applicationDetail.office_type')}} वडा नं. <span class="underline-dotted">
                                {{$mapApply->landDetail->ward_no??''}}
                            </span> टोल <span class="underline-dotted"> {{$mapApply->landDetail->tole??''}}
                            </span> मा अवस्थित साविक <span class="underline-dotted">
                                   {{$mapApply->landDetail->former_ward_no??''}}
                            </span>किता नं. <span class="underline-dotted">
 {{$mapApply->landDetail->plot_no??''}}
                            </span> क्षेत्रफल <span class="underline-dotted">
 {{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}
                            </span> मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted">
 {{$mapApply->houseOwner->name??''}}
                            </span>ले यस नक्सा बमोजिमको भवन निर्माण गर्न निवेदन पेश गरेकोमा संधियारको नाममा यो सुचना
                            प्रकाशित गरिएको छ | निवेदन साथ पेश हुन आएको प्रमाण र नक्साको आधारमा निर्माण स्वीकृति दिंदा
                            तपाइको जग्गा लगायत सार्वजनिक स्थलको हानी निक्सानी हुन्छ, हुदैन, सन्धी सर्पन हानी नोक्सानी
                            हुने भए यो सुचना प्रकाशित भएको १५ दिनभित्र सबुत प्रमाण सहित उप-महानगरपालिकामा उजुर गर्न
                            सुचित गरिन्छ |
                            म्याद नाघी आएको उजुरी उपर कुनै किसिमको कारवाही नहुने व्यहोरा जानकारी गराईन्छ |
                        </p>
                        <h4>१. निर्माणका निमित्त प्रस्तावित जग्गा चारकिल्ला विवरण:</h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col" rowspan="2">दिशा</th>
                                <th scope="col" rowspan="2">आफ्नो जग्गा लम्बाई</th>
                                <th colspan="3" class="text-center">संधियार</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td></td>
                                <td>(फिट/मिटर)</td>
                                <td>कि.नं.</td>
                                <td>लेन्डस्केपको प्रकार</td>
                                <td>नाम</td>
                            </tr>
                            <tr>
                                <th scope="row">उतर</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">द्क्षिण</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">पुर्व</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">पश्चिम</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <p class="house_measurment mt-2">
                            घरको नाप: लम्बाई: <span
                                class="underline-dotted"> {{$mapApply->length??''}}</span> चौडाई: <span
                                class="underline-dotted"> {{$mapApply->breadth??''}} </span> उचाई: <span
                                class="underline-dotted">{{$mapApply->height??''}}
                            </span> तल्ला संख्या: <span class="underline-dotted">{{$mapApply->current_storey??''}}
                            </span></p>
                        <p class="mt-3"> बोधार्थ: १. <span class="underline-dotted custom-width"></span>नं. वडा
                            वडाध्यक्ष/वडा प्रतिनिधि : कुनै प्रतिक्रिया भए जनाईदिनुहुन अनुरोध छ |</p>
                        <div class="d-flex justify-content-end mt-5"><span class="underline-dotted custom-width"></span>
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


