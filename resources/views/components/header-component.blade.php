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
        <h6><b>२० मंगलबार, २०७९</b><br>
            {{-- <p class=" mt-2 text-underline">English | नेपाली</p> --}}
        </h6>
        <div class="icon mt-4">
            <p style="font-size: 18px;color:black; padding: 0 5px"><i
                class="fa-solid fa-phone"></i>९८५८०२१६८२<br>
                <i
                class="fa-solid fa-envelope"></i>info@gmail.com</p>
                <p style="font-size: 18px;color:black"></p>
        </div>

    </div>
</div>
