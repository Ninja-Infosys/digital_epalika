 <div class="newsbar-container">
                <div class="flex-shrink-0 newsbar-title">समाचार</div>
                <div class="d-block jctkr-wrapper jctkr-initialized">
                    <div class="marquee-list">
                        <marquee onmouseover="stop()" onmouseout="start()">
                            @foreach($scrollNews as $news)
                                <span>
                                    <a href="#">
                                        {{Str::words($news->title,12)}} <small>({{$news->date}})</small>
                                        <span class="type">नयाँ</span>
                                    </a>
                                </span>
                            @endforeach
                        </marquee>
                    </div>
                </div>
            </div>
