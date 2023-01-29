<div class="d-flex gap-4">
    <div class="main-heading text-center">
        @foreach ($headers as $header)
            <div
                style="color: {{$header->font_color??'red'}}; font-size: {{$header->font_size??1}}rem; font-weight: {{$header->font??'normal'}};">
                {{$header->title??''}}
            </div>
        @endforeach
    </div>
    @if($hasClock)
        <div class="main-date d-none d-lg-block">
            <h6><i class="fa fa-calendar"></i>
                <x-convert-to-unicode number="{{$year}}" id="today_year"></x-convert-to-unicode>
                {{$month}}
                <x-convert-to-unicode number="{{$day}}" id="today_day"></x-convert-to-unicode>
            </h6>
            <h6><i class="fa fa-clock"></i> <span id="clock-container"></span></h6>
            <h6><i class="fa-solid fa-phone"></i> {{$officeSetting->phone??''}}</h6>
            <h6><i class="fa-solid fa-envelope"></i> {{$officeSetting->email??''}}</h6>
        </div>
    @endif
</div>
@once
    @push('scripts')
        @if($hasClock)
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        @endif
    @endpush
@endonce
@push('scripts')
    @if($hasClock)
        <script>
            function makeDigitalClock() {
                const currentTime = new Date();
                let hours = currentTime.getHours();
                let minutes = currentTime.getMinutes();
                let seconds = currentTime.getSeconds();
                let ampm = "विहानको";
                if (hours > 12) {
                    hours = hours - 12;
                    ampm = "अपराह्नको";
                } else if (hours === 0) {
                    hours = 12;
                }
                if (minutes < 10) {
                    minutes = "0" + minutes;
                }
                if (seconds < 10) {
                    seconds = "0" + seconds;
                }
                document.getElementById("clock-container").innerHTML = ampm + " " +
                    NepaliFunctions.ConvertToUnicode(hours) + ":" +
                    NepaliFunctions.ConvertToUnicode(minutes) + ":" +
                    NepaliFunctions.ConvertToUnicode(seconds);
            }

            setInterval(makeDigitalClock, 1000);
        </script>
    @endif

@endpush
