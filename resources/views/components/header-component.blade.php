<div class="text-center">
    @foreach($headers as $header)
        <p
            style="color: {{$header->font_color??'red'}}; font-size: {{$header->font_size??1}}rem; font-weight: {{$header->font??'normal'}};">{{$header->title??''}}</p>
    @endforeach
</div>
