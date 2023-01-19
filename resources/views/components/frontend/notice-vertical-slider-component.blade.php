 <div class="vertical-scroll">
        <div class="move">
            @foreach($notices as $notice)
                <h6 class="p-2 text-white mt-2" style="background-color: var(--mainColor)">{{$notice->title}} [{{$notice->date}}]</h6>
                @foreach($notice->files as $file)
                    @if(in_array($file->extension,['jpg','jpeg','png']))
                        <img src="{{$file->file_url}}" alt="">
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
