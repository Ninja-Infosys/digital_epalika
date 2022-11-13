
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="row mt-2">
                                    <div class="col-md-6 text-end">मिति: <div class="underline-dotted custom-width"></div></div>
                                </div>
                                <h3 class="text-center mt-3"><b>टिप्पणी र आदेश</b></h3>
                                <p class="text-center my-3"><b>बिषय: सुपरस्ट्रक्चर इजाजत सम्बन्धमा
                                        ।</b></p>
                                <p>श्रीमान,</p>
                                <p class="mb-3">
                                    जग्गा धनी श्री<span
                                        class="underline-dotted">{{$mapApply->landOwner->name??''}}</span>
                                    को नाममा दर्ता रहेको यस {{config('applicationDetail.office_type')}} वडा नं. <span
                                        class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>
                                    टोल<span
                                        class="underline-dotted">{{$mapApply->landDetail->tole??''}}</span>
                                    मा अवस्थित साविक <span class="underline-dotted">{{$mapApply->landDetail->former_ward_no ??''}}</span>कित्ता नं. <span
                                        class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span> क्षेत्रफल <span
                                        class="underline-dotted">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                                    मा भवन निर्माण गर्ने घरधनी श्री <span class="underline-dotted">{{$mapApply->houseOwner->name??''}}</span>
                                    दर्ता नं.
                                    <span class="underline-dotted">{{$mapApply->registration_no}}</span> ले भवन निर्माण गर्न मिति<span
                                        class="underline-dotted custom-width"></span> मा प्लिन्थ ईजाजत लिनु भएको हुँदा
                                    सोहि सिलसिलामा यस {{config('applicationDetail.office_type')}} कार्यालयका प्रबिधिक श्री<span
                                        class="underline-dotted custom-width"></span> ले स्थलगत निरिक्षण गरी पेश गर्नु
                                    भएको प्रतिवेदन अनुसार स्वीकृत भवन योजना मापदण्ड र नेपाल राष्ट्रिय
                                    भवन संहिता २०६० को पालना भएको प्रतिवेदन प्राप्त हुन आएकोले सुपरस्ट्रक्चर ईजाजत दिनको
                                    लागि मनासिब देखि पेश गरेको छु ।
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

