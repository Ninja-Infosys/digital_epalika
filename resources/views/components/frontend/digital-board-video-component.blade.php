
<div class="player">
    <div id="youtube" style="width: 100%;height: 100%"></div>
    <div class="controls" style="text-align: center;margin: 0 auto;">
    </div>
</div>
@push('scripts')
    <script src="{{asset('assets/frontend/js/youtube_api.js')}}"></script>
    <script>
        var array = "{{ $videos }}";
        var data = array.toString();
        var split = data.split(',');
        var count = split.length;

        var videos = [];
        for (var i = 0; i <= count - 1; i++) {
            videos.push(split[i]);
        }
        var YouTubePlayer = {
            current: 0,
            player: null,
            videos: videos,
            currentlyPlaying: function() {
                console.info('Current Track id', YouTubePlayer.videos[YouTubePlayer.current]);
                return YouTubePlayer.videos[YouTubePlayer.current];
            },
            playNext: function() {
                YouTubePlayer.increaseTrack()
                if (YouTubePlayer.player) {
                    YouTubePlayer.currentlyPlaying();
                    YouTubePlayer.player.loadVideoById(YouTubePlayer.videos[YouTubePlayer.current]);
                } else {
                    alert('Please Wait! Player is loading');
                }
            },
            playPrevious: function() {
                YouTubePlayer.decreaseTrack()
                if (YouTubePlayer.player) {
                    YouTubePlayer.currentlyPlaying();
                    YouTubePlayer.player.loadVideoById(YouTubePlayer.videos[YouTubePlayer.current]);
                } else {
                    alert('Please Wait! Player is loading');
                }

            },
            increaseTrack: function() {
                YouTubePlayer.current = YouTubePlayer.current + 1;
                if (YouTubePlayer.current >= YouTubePlayer.videos.length) {
                    YouTubePlayer.current = 0;
                }
            },
            decreaseTrack: function() {
                YouTubePlayer.current = Math.max(YouTubePlayer.current - 1, 0);
            },
            onReady: function(event) {
                event.target.loadVideoById(YouTubePlayer.videos[YouTubePlayer.current]);
            },
            onStateChange: function(event) {
                if (event.data == YT.PlayerState.ENDED) {
                    YouTubePlayer.playNext();
                }
            }
        }

        function onYouTubeIframeAPIReady() {
            YouTubePlayer.player = new YT.Player('youtube', {
                height: '350',
                width: '425',
                events: {
                    'onReady': YouTubePlayer.onReady,
                    'onStateChange': YouTubePlayer.onStateChange
                }
            });
        }
    </script>
@endpush
