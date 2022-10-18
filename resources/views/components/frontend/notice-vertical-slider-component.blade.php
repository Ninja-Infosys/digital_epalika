<div class="mt-2">
    <div class="vertical-scroll">
        <div class="move">
            @foreach($notices as $notice)
            <h6 class="bg-info p-2 text-white mt-2">{{$notice->title}} [{{$notice->date}}]</h6>
            <img src="https://dummyimage.com/320x240/000/fff.gif&text=image 1" id="image1">
            @endforeach
        </div>
    </div>
</div>
