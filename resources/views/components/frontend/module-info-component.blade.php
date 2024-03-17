<style>
    .new-digital-board .card-top {
        position: relative;
        min-height: 80vh;
        background: #0b4086;
        padding: 45px;
        border-radius: 15px;
    }

    a {
        color: white;
    }

    a:hover {
        color: white;

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

    .btn-danger,
    .nav-link.active {
        color: #fff !important;
        border-radius: 20px;
        box-shadow: 0px 0px 10px rgb(3 169 244 / 24%);
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

            @auth('mobile-user')
                <x-frontend.mobile-user-authentication-component />
            @else
                <x-frontend.mobile-user-login-component />
            @endauth
        </div>
        <div class="col-md-7 m-auto">
            <div class="row modules">
                @if (Route::has('ebps'))
                    <div class="col-md-3">
                        <div class="info-card module-card" style="background: linear-gradient(180deg, #124f9f 0.01%, #071f3e 100%) ! important;">
                            <a href="{{ route('ebps') }}">
                                <div class="pt-4 text-center" >
                                    <img src="{{ asset('assets/frontend/image/new-icons/map.png') }}" width="35"
                                        height="35">
                                    <h6 class="p-2 text-white">घर-नक्सा</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
