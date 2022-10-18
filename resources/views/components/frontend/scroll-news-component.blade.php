<div>
{{--    <section class="newsbar-section mt-2">--}}
{{--        <div class="container-fluid">--}}
            <div class="newsbar-container">
                <div class="flex-shrink-0 newsbar-title pr-lg-3">समाचार</div>
                <div class="d-block jctkr-wrapper jctkr-initialized">
                    <ul class="marquee-list">
                        <marquee onmouseover="stop()" onmouseout="start()">
                            @foreach($scrollNews as $news)
                                <li>
                                    <a href="#">
                                        {{Str::words($news->title,12)}}
                                        <span class="type">नयाँ</span>
                                    </a>
                                </li>
                            @endforeach
                        </marquee>
                    </ul>
                </div>
            </div>
{{--        </div>--}}
{{--    </section>--}}
</div>
