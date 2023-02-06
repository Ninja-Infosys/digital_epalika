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
                    <h5 class="p-1 text-white">नागरिक वडापत्र</h5>
                </div>
            </a>
        </div>
        @if(Route::has('admin.circular.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.circular.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/circular.png')}}"
                             height="50" width="50">
                        <h5 class="p-1 text-white">दर्ता चलानी प्रणाली</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.listRegistrations.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.listRegistrations.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/listregistration.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">सुची दर्ता प्रणाली</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.helpDesk.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.helpDesk.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/helpdesk.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">हेल्प डेस्क</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.grievanceHandling.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.grievanceHandling.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/grievancehandling.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">ई-गुनासो</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.executiveMeeting.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.executiveMeeting.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/executivemeeting.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white" style="margin:0 0 0 -16px">ई-कार्यपालिका</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('emap.admin.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('emap.admin.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/emap.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">घर-नक्सा पास</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.businessRegistration.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.businessRegistration.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/businessregistration.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">व्यवसाय दर्ता</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.recommendation.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.recommendation.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/recommendation.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">शिफारिस प्रणाली</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.employee.dashboard'))
            <div class="col-md-3 border disable_menu">
                <a href="#">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/kramachari.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">कर्मचारी व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.taskManagement.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.taskManagement.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/taskmanagement.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">कार्य व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.roaster.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.roaster.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/roaster.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">तालिम व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.judicialCommittee.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.judicialCommittee.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/judicialcommittee.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">न्यायिक समिति</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.plan.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.plan.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/plan.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">योजना व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.grant.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.grant.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/anudan.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">अनुदान व्यवस्थापन</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('admin.revenue.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.revenue.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/revenue.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">राजस्व</h5>
                    </div>
                </a>
            </div>
        @endif
        @if(Route::has('identity.admin.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('identity.admin.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/identity.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">परिचयपत्र </h5>
                    </div>
                </a>
            </div>
        @endif

        @if(Route::has('admin.organizationRegistration.dashboard'))
            <div class="col-md-3 border">
                <a href="{{route('admin.organizationRegistration.dashboard')}}">
                    <div class="p-2 text-center">
                        <img src="{{asset('assets/backend/images/modules/businessregistration.png')}}"
                             height="50" width="50" alt="">
                        <h5 class="p-1 text-white">व्यवसाय दर्ता</h5>
                    </div>
                </a>
            </div>
        @endif
        </div>
    </div>
