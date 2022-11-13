
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card mb_30">
                        <div class="card-body p-3">
                            <div class="font-black" id="printData">
                                <div class="row mt-2">
                                    <div class="col-md-6">
                                        पत्र सं: <div class="underline-dotted custom-width"></div><br>
                                        चलानी नं: <div class="underline-dotted custom-width"></div>
                                    </div>
                                    <div class="col-md-6 text-end">मिति: <div class="underline-dotted custom-width"></div></div>
                                </div>
                                <p class="text-center my-3">
                                    <b>बिषय: {{\Modules\EMap\Enums\NoticeTypeEnum::REVISED_SUPERSTRUCTURE_PERMIT->label()}}
                                        ।</b></p>
                                <div class="res">श्री<span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span><br>
                                    <span class="underline-dotted custom-width"></span><span
                                        class="underline-dotted custom-width"></span></div>
                                <p class="my-3">
                                    &emsp;&emsp;&emsp;उपर्युक्त सम्बन्धमा तपाईले यस कार्यालयबाट मिति<span
                                        class="underline-dotted custom-width"></span> मा वडा नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>साविक
                                    <span
                                        class="underline-dotted">{{$mapApply->landDetail->former_ward_no}}</span>
                                    कि.नं.<span
                                        class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span>
                                    क्षेत्रफल<span
                                        class="underline-dotted">{{$mapApply->landDetail->unit_value??''}}  {{$mapApply->landDetail->unit->title??''}}</span>जग्गामा
                                    घर निर्माणको लागि प्लिन्थ/सुपरस्ट्रक्चरल स्वीकृति लिनु भएकोमा सो घर निर्माण गर्दा
                                    संशोधन गरी घरमा थपकोठा/तल थप/प्लिन्थ
                                    घटी/बढी/डिजाईन परिवर्तन/निर्माण परिवर्तन गरेकोमा संशोधित नक्सा पेश गरेकोमा उक्त
                                    नक्सा तत्कालिन नक्सा पासको मापदण्ड/आधारभूत निर्माण मापदण्ड, २०७२ अनुसार को निर्माण
                                    अनुसार
                                    हालको नक्सा प्रमाणित गरी नक्सा संशोधन प्रमाणपत्र दिईएको छ ।
                                </p>
                                <p class="letter">पुनश्रच : मापदण्डको हकमा मिति <span class="underline-dotted custom-width"></span> मा
                                    दिईएको इजाजत पत्रमा उल्लेख भए अनुसार लागू हुनेछ । </p>

                                <div class="d-flex justify-content-around mt-4">
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        निरीक्षण गरी पेश गर्ने</p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>सिफारिस
                                        गर्ने </p>
                                    <p class="text-center"><span class="underline-dotted custom-width"></span><br>
                                        स्वीकृत गर्ने</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

