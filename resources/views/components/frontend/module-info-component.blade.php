<div class="row">
    @if(Route::has('grievanceHandling.grievance'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('grievanceHandling.grievance')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/gunaso.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">गुनासो</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('judicialCommittee.complainRegistration'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('judicialCommittee.complainRegistration')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/gunaso.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">अनलाइन विवाद दर्ता</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('ebps'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('ebps')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/backend/images/modules/emap.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">घर-नक्सा</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('digitalBoard.helpdesk.helpdesk'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('digitalBoard.helpdesk.helpdesk')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/help-desk.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">हेल्प डेस्क</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('recommendation.index'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="#">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/sifarish.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">सिफारिस</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('businessRegistration.business'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('businessRegistration.business')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/backend/images/modules/businessregistration.png')}}" width="50"
                             height="50">
                        <h6 class="p-2 text-white">व्यवसाय दर्ता</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('grant.index'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('grant.index')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/anudan.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">अनुदान</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('payment.index'))
        <div class="col-md-3">
            <div class="info-card disable_menu">
                <a href="#">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/rajswa.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">राजस्व</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif
    @if(Route::has('roaster.index'))
        <div class="col-md-3">
            <div class="info-card">
                <a href="{{route('roaster.index')}}">
                    <div class="pt-4 text-center">
                        <img src="{{asset('assets/frontend/image/talim.png')}}" width="50" height="50">
                        <h6 class="p-2 text-white">तालिम</h6>
                    </div>
                </a>
            </div>
        </div>
    @endif

    <div class="col-md-3">
        <div class="info-card">
            <a href="https://pams.fcgo.gov.np/">
                <div class="pt-4 text-center">
                    <img src="{{asset('assets/frontend/image/logo.png')}}" width="50" height="50">
                    <h6 class="p-2 text-white">जिन्सी व्यवस्थापन प्रणाली </h6>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-card">
            <a href="https://sutra.fcgo.gov.np/">
                <div class="pt-4 text-center">
                    <img src="{{asset('assets/frontend/image/logo.png')}}" width="50" height="50">
                    <h6 class="p-2 text-white">संचितकोष व्यवस्थापन प्रणाली  </h6>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-card">
            <a href="https://public.donidcr.gov.np/">
                <div class="pt-4 text-center">
                    <img src="{{asset('assets/frontend/image/logo.png')}}" width="50" height="50">
                    <h6 class="p-2 text-white">घटना दर्ता र सामाजिक सुरक्षा प्रणाली</h6>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-card">
            <a href="https://ss.donidcr.gov.np/">
                <div class="pt-4 text-center">
                    <img src="{{asset('assets/frontend/image/logo.png')}}" width="50" height="50">
                    <h6 class="p-2 text-white">सामाजिक सुरक्षा</h6>
                </div>
            </a>
        </div>
    </div>

    <div class="col-md-3">
        <div class="info-card">
            <a href="https://mail.nepal.gov.np/">
                <div class="pt-4 text-center">
                    <img src="{{asset('assets/frontend/image/logo.png')}}" width="50" height="50">
                    <h6 class="p-2 text-white">इमेल सेवा</h6>
                </div>
            </a>
        </div>
    </div>


    <div class="col-md-3">
        <div class="info-card">
            <a href="https://attendance.gov.np/">
                <div class="pt-4 text-center">
                    <img src="{{asset('assets/frontend/image/logo.png')}}" width="50" height="50">
                    <h6 class="p-2 text-white">कार्यालयको हाजिरी</h6>
                </div>
            </a>
        </div>
    </div>
</div>
