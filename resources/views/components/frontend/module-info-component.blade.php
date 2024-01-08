<div class="row">
    <div class="col-md-8 m-auto">
        <div class="row modules">
            @if (Route::has('grievanceHandling.grievance'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="{{ route('grievanceHandling.grievance') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/chat.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">गुनासो</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('ebps'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="{{ route('ebps') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/map.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">घर-नक्सा</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('digitalBoard.helpdesk.helpdesk'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="{{ route('digitalBoard.helpdesk.helpdesk') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/help.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">हेल्प डेस्क</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('recommendation.index'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="#">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/chat.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">सिफारिस</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('businessRegistration.business'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="{{ route('businessRegistration.business') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/flat.png') }}"
                                    style="object-fit: contain; height: 35px; width: 35px" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">व्यवसाय दर्ता</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('grant.index'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="{{ route('grant.index') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/salary.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">अनुदान</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('payment.index'))
                <div class="col-md-3">
                    <div class="info-card disable_menu">
                        <a href="#">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/salary.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">राजस्व</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
            @if (Route::has('roaster.index'))
                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="{{ route('roaster.index') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/presentation.png') }}"
                                    width="35" height="35">
                                <h6 class="p-2 text-dark">तालिम</h6>
                            </div>
                        </a>
                    </div>
                </div>
            @endif


            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://pams.fcgo.gov.np/">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">जिन्सी व्यवस्थापन प्रणाली </h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://sutra.fcgo.gov.np/">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">संचितकोष व्यवस्थापन प्रणाली </h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://public.donidcr.gov.np/">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">घटना दर्ता र सामाजिक सुरक्षा प्रणाली</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://ss.donidcr.gov.np/">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">सामाजिक सुरक्षा</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://mail.nepal.gov.np/">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">इमेल सेवा</h6>
                        </div>
                    </a>
                </div>
            </div>


            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://attendance.gov.np/">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">कार्यालयको हाजिरी</h6>
                        </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://sms.aakashsms.com/login">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">एस.एम.एस</h6>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="https://apps.aakashtel.com/login">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35" height="35">
                            <h6 class="p-2 text-dark">Voice एस.एम.एस</h6>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="info-card module-card">
                    <a href="{{ route('mobileUser.register.form') }}">
                        <div class="pt-4 text-center">
                            <img src="{{ asset('assets/frontend/image/new-icons/presentation.png') }}" width="35"
                                height="35">
                            <h6 class="p-2 text-dark">सेवाग्राही</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
