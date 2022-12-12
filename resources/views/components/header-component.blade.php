{{-- <div class="text-center main-heading">
    @foreach ($headers as $header)
        <span
            style="color: {{$header->font_color??'red'}}; font-size: {{$header->font_size??1}}rem; font-weight: {{$header->font??'normal'}};">
            {{$header->title??''}}
        </span>
        @if (!$loop->last)
            <br>
        @endif
    @endforeach
</div> --}}
<div class="d-flex justify-content-between mb-2">
    <div class="main-heading ">
        @foreach ($headers as $header)
            <span
                style="color: {{$header->font_color??'red'}}; font-size: {{$header->font_size??1}}rem; font-weight: {{$header->font??'normal'}};">
            {{$header->title??''}}
        </span>
            @if (!$loop->last)
                <br>
            @endif
        @endforeach
    </div>
    <div>
        <h6>
            <b>
                <i class="fa fa-calendar"></i>
                <x-convert-to-unicode number="{{$year}}" id="today_year"/>
                {{$month}}
                <x-convert-to-unicode number="{{$day}}" id="today_day"/>
            </b><br>
            {{-- <p class=" mt-2 text-underline">English | नेपाली</p> --}}
        </h6>
        <h6>
            <i class="fa fa-clock"></i>
            <span id="clock-container">

            </span><br>
            {{-- <p class=" mt-2 text-underline">English | नेपाली</p> --}}
        </h6>
        <div class="icon mt-4">
            <p style="font-size: 18px;color:black; padding: 0 5px"><i
                    class="fa-solid fa-phone"></i> {{$officeSetting->phone??''}}<br>
                <i
                    class="fa-solid fa-envelope"></i> {{$officeSetting->email??''}}</p>
            <p style="font-size: 18px;color:black"></p>
        </div>

    </div>
</div>
@push('styles')
    <style>
        #clock-container {
            font-size: 40px;
            font-family: sans-serif;
            color: #333;
        }

    </style>
@endpush
@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
    @endpush
@endonce
@push('scripts')
    <script>
        function makeDigitalClock() {
// get current time
            var currentTime = new Date();

// extract hours, minutes, and seconds from the current time
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

// convert hours to 12-hour format and add AM or PM
            var ampm = "विहानको";
            if (hours > 12) {
                hours = hours - 12;
                ampm = "अपराह्नको";
            } else if (hours === 0) {
                hours = 12;
            }

// add leading zeros to minutes and seconds if necessary
            if (minutes < 10) {
                minutes = "0" + minutes;
            }
            if (seconds < 10) {
                seconds = "0" + seconds;
            }

// create digital clock HTML
// add the digital clock to the page
            document.getElementById("clock-container").innerHTML = ampm + " " + NepaliFunctions.ConvertToUnicode(hours) + ":" + NepaliFunctions.ConvertToUnicode(minutes) + ":" + NepaliFunctions.ConvertToUnicode(seconds);


        }

        // call the makeDigitalClock function every second
        setInterval(makeDigitalClock, 1000);
    </script>
@endpush
