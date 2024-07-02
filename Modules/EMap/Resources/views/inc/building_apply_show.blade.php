<div class="font-black" id="print">
    <p>
        {{config('applicationDetail.to_office.to')}}<br>
        {{config('app.office_name')}}<br>
        {{config('app.office')}}<br>
        {{config('app.address')}}
    </p>
    <p class="text-center"><b>बिषय: भबन निर्माणको लागि नक्सापास सम्बन्धमा ।</b></p>

    <p>
        मैले/हामीले देहायमा लेखिए बमोजिम भवन निर्माण कार्य गर्ने भएकोले उक्त निर्माण कार्यको बिबरण
        तपसिलमा खुलाई आफ्नो हक भोगको निस्साको नक्कल, कित्ता नापी नक्साको नक्कल र घरको नक्सा लगायत
        आवस्यक कागजात सहित निवेदन पेश गरेको छु/छौं । उक्त नक्सापास गरी निर्माण कार्य गर्न स्वीकृति
        पाउन अनुरोध छ। निर्माण कार्यको इजाजत प्राप्त
        भएपछी {{config('app.local_body')}} द्वारा स्वीकृत मापदण्ड तथा राष्ट्रिय भवन
        संहिता भित्र रही निर्माण कार्य गर्नेछु/छौं। यस दरखास्त फाराममा लेखिएको व्यहोरा ठीक साँचो छ,
        झुठ्ठा ठहरे कानून बमोजिम सहुँला बुझाउँला।
    </p>
    <div id="building-app">
        <edit-building-applications :building-documentation="{{json_encode($buildingDocumentation)}}"></edit-building-applications>
    </div>
</div>
