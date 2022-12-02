<div class="mt-2">
    <div class="vertical-scroll shadow">
        <div class="move">
            @foreach($notices as $notice)
                <h6 class="bg-primary p-2 text-white mt-2">{{$notice->title}} [{{$notice->date}}]</h6>
                @foreach($notice->files as $file)
                    @if(in_array($file->extension,['jpg','jpeg','png']))
                        <img src="{{$file->file_url}}" alt="">
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
