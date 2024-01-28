<style>
    .new-digital-board .card-top {
        position: relative;
        min-height: 80vh;
        background: #0b4086;
        padding: 45px;
        border-radius: 15px;
    }

    .new-digital-board .card-top .card {
        border: none;
        box-shadow: none;
    }

    .new-digital-board .card-top .nav-item {
        width: 50%;
    }

    .new-digital-board .card-top .nav-link {
        border-radius: 20px !important;
        color: #bbb;
        margin-right: 5px;
        text-align: center;
        font-size: 16px;
        font-weight: 600
    }

    .new-digital-board .card-top .nav-link:hover {
        background-color: #03A9F4 !important;
        border: 1px solid #03A9F4 !important;
        color: #fff !important;
    }

    .card-header-tabs {
        padding: 10px;
        background: #073168;
        border-radius: 80px;
        justify-content: center;
        align-items: center;
    }

    .new-digital-board .card-top .card .card-header {
        background: transparent;
        border: none;
    }

    .new-digital-board .card-top .card .form-control,
    .new-digital-board .card-top .card .input-group-text {
        line-height: 2.2rem;
        background-color: transparent;
        color: #fff;
    }

    .input-group-text svg {
        color: #fff
    }

    .btn-primary,
    .nav-link.active {
        background-color: #03A9F4 !important;
        border: 1px solid #03A9F4 !important;
        color: #fff !important;
        border-radius: 20px;
        box-shadow: 0px 0px 10px rgb(3 169 244 / 24%);
    }

    ::placeholder {
        color: #ddd !important;
        font-weight: 100 !important
    }

    /* .new-digital-board:before {
        position: absolute;
        background-color: red;
        height: 100vh;
        width: 250px;
        content: '';
    } */
</style>
<div class="new-digital-board">
    <div class="row">
        {{-- Login Panle --}}
        <div class="col-md-4 card-top">
            <div class="card bg-transparent">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs" id="loginTabs">
                        <li class="nav-item">
                            <a class="nav-link active" id="user-tab" data-bs-toggle="tab" href="#user">Login as
                                Customer</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mr-0" style="margin-right: 0 !important" id="organization-tab"
                                data-bs-toggle="tab" href="#organization">Login as
                                Organization</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="user">
                            <h5 class="card-title text-white my-4">User Login</h5>
                            <form>
                                <!-- User Login Form Fields -->
                                <div class="mb-3 input-group input-group-icon">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                        </svg>
                                    </span>
                                    <label for="userEmail" class="form-label visually-hidden">Email address</label>
                                    <input type="email" class="form-control" id="userEmail"
                                        placeholder="Enter email" />
                                </div>
                                <div class="mb-3 input-group input-group-icon">
                                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-lock"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                        </svg></span>
                                    <label for="userPassword" class="form-label visually-hidden">Password</label>
                                    <input type="password" class="form-control" id="userPassword"
                                        placeholder="Enter password" />
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 d-block w-100 py-2">Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="organization">
                            <h5 class="card-title text-white my-4">Organization Login</h5>
                            <form>
                                <!-- Organization Login Form Fields -->
                                <div class="mb-3 input-group input-group-icon">
                                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-envelope"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                                        </svg></span>
                                    <label for="orgEmail" class="form-label visually-hidden">Email address</label>
                                    <input type="email" class="form-control" id="orgEmail"
                                        placeholder="Enter email" />
                                </div>
                                <div class="mb-3 input-group input-group-icon">
                                    <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="16" height="16" fill="currentColor" class="bi bi-lock"
                                            viewBox="0 0 16 16">
                                            <path
                                                d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2M5 8h6a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V9a1 1 0 0 1 1-1" />
                                        </svg></span>
                                    <label for="orgPassword" class="form-label visually-hidden">Password</label>
                                    <input type="password" class="form-control" id="orgPassword"
                                        placeholder="Enter password" />
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 d-block w-100 py-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Login Panel --}}
        <div class="col-md-7 m-auto">
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
                                    <img src="{{ asset('assets/frontend/image/new-icons/salary.png') }}"
                                        width="35" height="35">
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
                                    <img src="{{ asset('assets/frontend/image/new-icons/salary.png') }}"
                                        width="35" height="35">
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
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">जिन्सी व्यवस्थापन प्रणाली </h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://sutra.fcgo.gov.np/">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">संचितकोष व्यवस्थापन प्रणाली </h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://public.donidcr.gov.np/">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">घटना दर्ता र सामाजिक सुरक्षा प्रणाली</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://ss.donidcr.gov.np/">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">सामाजिक सुरक्षा</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://mail.nepal.gov.np/">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">इमेल सेवा</h6>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://attendance.gov.np/">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">कार्यालयको हाजिरी</h6>
                            </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://sms.aakashsms.com/login">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">एस.एम.एस</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="info-card module-card">
                        <a href="https://apps.aakashtel.com/login">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/logo.png') }}" width="35"
                                    height="35">
                                <h6 class="p-2 text-dark">Voice एस.एम.एस</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-md-3">
                <div class="info-card module-card">
                    @auth('mobile-user')
                        <a href="{{ route('mobileUser') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/presentation.png') }}" width="35" height="35">
                                <h6 class="p-2 text-dark">{{ Auth::guard('mobile-user')->user()->name }}</h6>
                            </div>
                        </a>
                    @else
                        <a href="{{ route('mobileUser') }}">
                            <div class="pt-4 text-center">
                                <img src="{{ asset('assets/frontend/image/new-icons/presentation.png') }}" width="35" height="35">
                                <h6 class="p-2 text-dark">सेवाग्राही</h6>
                            </div>
                        </a>
                    @endauth
                </div>
            </div>

        </div>
    </div>
</div>
