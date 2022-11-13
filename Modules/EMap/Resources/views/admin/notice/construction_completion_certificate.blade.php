
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-body p-3">
                    <div class="font-black" id="printData">
                        <div class="row mt-2">
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6 text-end">मिति: <div class="underline-dotted custom-width"></div></div>
                        </div>
                        <h3 class="text-center">
                            <b>टिप्पणी र आदेश </b>
                        </h3>
                        <p class="text-center"><b>बिषय: निर्माण कार्य सम्पन्न प्रमाण-पत्र सम्बन्धमा ।
                            </b></p>
                        <span>श्रीमान,</span><br>
                        <span>
                            यस {{config('applicationDetail.office_type')}} वडा नं.<span
                                class="underline-dotted">{{$mapApply->landOwner->ward_no??''}}</span> बस्ने
                            श्री/श्रीमती/सुश्री <span
                                class="underline-dotted">{{$mapApply->landOwner->name??''}}</span> को
                            नाममा दर्ता रहेय्को यस {{config('applicationDetail.office_short_name')}} वडा नं.<span
                                class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span> का साविक <span
                                class="underline-dotted">{{$mapApply->landDetail->former_ward_no??''}}</span>
                            कि.नं.<span class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span> को
                            क्षेत्रफल <span
                                class="underline-dotted">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>
                            मा<span class="underline-dotted">{{$mapApply->construction_type->label()}}</span> को लागि
                            मिति<span
                                class="underline-dotted"></span>
                            मा भवन निर्माण गर्न स्वीकृति पत्र लिई हाल निर्माण कार्य समाप्त गरी निर्माण कार्य
                            सम्पन्नको प्रमाण-पत्रको लागि निर्माण कार्यको सुपरिवेक्षणमा संलग्न
                            प्रबिधिक/कन्सलटेन्टले प्रविधिक प्रतिवेदन सहित निवेदन
                            दिनु भएको हुँदा यस कार्यालयका प्रबिधिकलेस्थलगत निरिक्ष, सुपरिवेक्षण गरी दिएको
                            प्रतिवेदन अनुसार नक्सा पास हुँदाको मापदण्ड अनुसार भवन निर्माण
                            भएको देखिएकोले निजलाई निर्माण सम्पन्न प्रमाण-पत्र दिन मनासिब देखि पेश गरेको छु ।
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
