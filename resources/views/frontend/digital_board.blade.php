@extends('frontend.layouts.master')
@section('content')
    <main class="container-fluid">
        <section class="news-section">
            <x-frontend.scroll-news-component/>
        </section>
</main>
<div class="container">
        <section class="mid">
            <div class="row">
                <div class="col-md-8">
                <x-frontend.notice-vertical-slider-component/>
                </div>
                <div class="col-md-4">
                   <x-frontend.employee-section-component/>
                </div>
            </div>
        </section>
        <section>
            <div class="row">
                <div class="col-md-8">
                    <x-frontend.digital-board-video-component/>
                </div>
                <div class="col-md-4">
                    <x-frontend.notice-section-component/>
                </div>
            </div>
        </section>
</div>
@endsection


<!-- <div class="col-md-6">
                    <x-frontend.module-info-component/>
                </div> -->