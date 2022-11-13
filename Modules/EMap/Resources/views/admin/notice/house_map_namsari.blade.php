
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
                        <p class="text-center"><b>विषय :- घरनक्सा नामसारी सम्बन्धमा |</b></p>
                        <span>श्रीमान,</span><br>
                        <span class="my-3">
                            यस {{config('applicationDetail.office_type')}} वडा नं.<span
                                class="underline-dotted">{{$mapApply->landDetail->ward_no??''}}</span>साविक<span
                                class="underline-dotted">{{$mapApply->landDetail->former_ward_no??''}}</span>
                            कि.नं.<span class="underline-dotted">{{$mapApply->landDetail->plot_no??''}}</span> ज.वि<span
                                class="underline-dotted custom-width"></span>
                            मा श्री<span class="underline-dotted">{{$mapApply->houseOwner->name??''}}</span> ले
                            मिति<span
                                class="underline-dotted custom-width"></span>
                            मा घर निर्माणको लागि लम्बाई <span
                                class="underline-dotted custom-width">{{$mapApply->length}}</span>
                            चौडाई<span class="underline-dotted custom-width">{{$mapApply->breadth}}</span>
                            उचाई<span class="underline-dotted custom-width">{{$mapApply->height}}</span> प्लिन्थ
                            क्षेत्रफल<span
                                class="underline-dotted custom-width">{{$mapApply->area_of_plinth}}</span>
                            रहेको घर नक्सा पास गरी लैजानु भएकोमा मिति<span
                                class="underline-dotted custom-width"></span> मा
                            जिल्ला {{config('applicationDetail.office_district')}}को मालपोत
                            कार्यालयको निर्णय
                            अनुसार रजिस्ट्रेसन/अंशवण्डा/नामसारी/कित्ता काट बाट श्री <span
                                class="underline-dotted custom-width">{{$mapApply->houseOwner->name??''}}</span> ले लिनु
                            भएको प्रमाण सहित घर
                            नक्सा नामसारीको लागि दरखास्त पर्न आएकोले यस कार्यालयबाट मिति<span
                                class="underline-dotted custom-width"></span> मा
                            श्री<span class="underline-dotted custom-width">{{$mapApply->landOwner->name??''}}</span> को
                            नाममा पास भै गएको घरनक्सा
                            श्री<span class="underline-dotted custom-width">{{$mapApply->houseOwner->name??''}}</span>
                            को नाममा आएको कागज प्रमाण बमोजिम हाल कायम रहन आएको कि.नं.<span
                                class="underline-dotted custom-width">{{$mapApply->landDetail->plot_no??''}}</span>
                            जग्गा क्षेत्रफल<span
                                class="underline-dotted custom-width">{{$mapApply->landDetail->unit_value??''}} {{$mapApply->landDetail->unit->title??''}}</span>
                            रहने गरी नक्सा
                            नामसारीको लागि मनासिब देखि पेश गरेको छु |
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

