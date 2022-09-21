<div class="text-center">
    @foreach($headers as $header)
        <span
            style="color: {{$header->font_color??'red'}}; font-size: {{$header->font_size??1}}rem; font-weight: {{$header->font??'normal'}};">{{$header->title??''}}</span>
    @endforeach
</div>
