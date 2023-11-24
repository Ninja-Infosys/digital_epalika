<div class="background" style="background-image: url('{{ officeSetting()->background_image_url ?? asset('images/bg.png') }}')">
    <div class="container-fluid d-lg-flex justify-content-between align-items-center">
        <div class="d-flex gap-2 align-items-center">
            <a href="{{ route('welcome') }}" class="main-logo">
                <img alt="nepal-government-logo" class="logo img-responsive center-block d-block mx-auto"
                    src="{{ asset('assets/frontend/image/logo.png') }}" />
            </a>
            <x-header-component  :ward="$ward ?? null"/>
        </div>
        <div class="d-flex align-items-center">
            <a href="{{route('digital-service')}}" class="me-3  text-white ">विधुतीय शुसासन सेवा</a>
            <a href="{{ route('welcome') }}" class="main-logo d-flex align-items-center">
                <img alt="nepal-flag" class="logo img-responsive center-block ms-2 "
                    src="{{ asset('assets/frontend/image/nepal_flag.gif') }}" />
            </a>

        </div>
    </div>
    <div class="bg-overlay"></div>
</div>
