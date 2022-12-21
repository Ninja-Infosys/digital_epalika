<div class="mt-5">
    <video controls="controls" id="myVideo" autoplay>
    </video>
</div>

@push('scripts')
    <script>
        const videoSource = [];
        @foreach($videos as $video)
            videoSource[{{$loop->index}}] = "{{$video->video_url}}";
        @endforeach
        let i = 0; // define i
        const videoCount = videoSource.length;

        function videoPlay(videoNum) {
            document.getElementById("myVideo").setAttribute("src", videoSource[videoNum]);
            document.getElementById("myVideo").load();
            document.getElementById("myVideo").play();
        }

        videoPlay(i);
        document.getElementById('myVideo').addEventListener('ended', (event) => {
            myHandler();
        });

        function myHandler() {
            i++;
            if (i > (videoCount - 1)) {
                i = 0;
            }
            videoPlay(i);
        }
    </script>
@endpush
