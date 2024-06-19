

<div class="player">
    <div id="youtube" style="width: 100%; height: 100%;"></div>
    <div class="controls" style="text-align: center; margin: 0 auto;">
    </div>
</div>
@push('scripts')
    <script src="https://www.youtube.com/iframe_api"></script>
    <script>
        var videos = "{{ $videos }}".split(',');

        var YouTubePlayer = {
            current: 0,
            player: null,
            videos: videos,
            currentlyPlaying: function() {
                console.log('Current Track id', YouTubePlayer.videos[YouTubePlayer.current]);
                return YouTubePlayer.videos[YouTubePlayer.current];
            },
            playNext: function() {
                YouTubePlayer.increaseTrack();
                if (YouTubePlayer.player) {
                    YouTubePlayer.currentlyPlaying();
                    YouTubePlayer.player.loadVideoById(YouTubePlayer.videos[YouTubePlayer.current]);
                    YouTubePlayer.player.playVideo();
                } else {
                    alert('Please Wait! Player is loading');
                }
            },
            playPrevious: function() {
                YouTubePlayer.decreaseTrack();
                if (YouTubePlayer.player) {
                    YouTubePlayer.currentlyPlaying();
                    YouTubePlayer.player.loadVideoById(YouTubePlayer.videos[YouTubePlayer.current]);
                    YouTubePlayer.player.playVideo();
                } else {
                    alert('Please Wait! Player is loading');
                }
            },
            increaseTrack: function() {
                YouTubePlayer.current = (YouTubePlayer.current + 1) % YouTubePlayer.videos.length;
            },
            decreaseTrack: function() {
                YouTubePlayer.current = (YouTubePlayer.current - 1 + YouTubePlayer.videos.length) % YouTubePlayer.videos.length;
            },
            onReady: function(event) {
                event.target.loadVideoById(YouTubePlayer.videos[YouTubePlayer.current]);
                event.target.playVideo();
            },
            onStateChange: function(event) {
                if (event.data == YT.PlayerState.ENDED) {
                    YouTubePlayer.playNext();
                }
            }
        };

        function onYouTubeIframeAPIReady() {
            YouTubePlayer.player = new YT.Player('youtube', {
                height: '350',
                width: '425',
                events: {
                    'onReady': YouTubePlayer.onReady,
                    'onStateChange': YouTubePlayer.onStateChange
                },
                playerVars: {
                    autoplay: 1,
                    controls: 1,
                    mute: 1 // Start muted to allow autoplay
                }
            });
        }
    </script>
@endpush
