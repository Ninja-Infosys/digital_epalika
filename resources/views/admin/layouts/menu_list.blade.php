<div class="offcanvas-header">
        <a href="{{route('admin.dashboard')}}" class="offcanvas-title"
           id="offcanvasExampleLabel">
            <h4>डिजिटल ई-पालिका</h4>
        </a>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
    </div>

    <div class="offcanvas-body">
        <div class="row">
            <div class="col-md-3 border">
                <a href="{{route('admin.digitalBoard.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/digitalboard.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">नागरिक वडापत्र</h5>
                    </div>
                </a>
            </div>
            @if(Route::has('admin.circular.dashboard'))
                <div class="col-md-3 border">
                    <a href="{{route('admin.circular.dashboard')}}">
                        <div class="p-2 text-center">
                            <img src="{{asset('assets/backend/images/modules/circular.png')}}"
                                 height="50" width="50">
                            <h5 class="p-1">दर्ता चलानी प्रणाली</h5>
                        </div>
                    </a>
                </div>
            @endif
            <div class="col-md-3 border">
                <a href="{{route('admin.listRegistrations.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/listregistration.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">सुची दर्ता प्रणाली</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('admin.helpDesk.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/helpdesk.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">हेल्प डेस्क</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('admin.grievanceHandling.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/grievancehandling.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">ई-गुनासो</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('admin.executiveMeeting.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/executivemeeting.png')}}"
                             height="50" width="50">
                        <h5 class="p-1" style="margin:0 0 0 -16px">ई-कार्यपालिका</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('emap.admin.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/emap.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">घर-नक्सा पास</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('admin.businessRegistration.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/businessregistration.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">व्यवसाय दर्ता</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('admin.recommendation.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/sifarish-parnali.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">शिफारिस प्रणाली</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border disable_menu">
                <a href="#">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/kramachari.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">कर्मचारी व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border">
                <a href="{{route('admin.taskManagement.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/task.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">कार्य व्यवस्थापन</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 border">
                <a href="{{route('admin.roaster.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/roaster.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">तालिम व्यवस्थापन</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 border">
                <a href="{{route('admin.judicialCommittee.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/nyayik.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1">न्यायिक समिति</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 border">
                <a href="{{route('admin.plan.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/plan.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">योजना व्यवस्थापन</h5>
                    </div>
                </a>
            </div>

            <div class="col-md-3 border">
                <a href="{{route('admin.grant.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/anudan.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">अनुदान व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
            <div class="col-md-3 border disable_menu">
                <a href="#">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/rajashow.png')}}"
                             height="50" width="50">
                        <h5 class="p-1">राजस्व</h5>
                    </div>
                </a>
            </div>

        </div>
    </div>
