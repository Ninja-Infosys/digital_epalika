@extends('frontend.layouts.master')
@section('content')
    <main>
        <section class="news-section">
            <x-frontend.scroll-news-component />
        </section>
        <section class="notice mt-3">
            <div class="row">
                <div class="col-md-8">
                    <x-frontend.notice-vertical-slider-component />
                </div>
                <div class="col-md-4">
                    <x-frontend.employee-section-component />
                </div>
            </div>
        </section>
        <section class="help mt-3">
            <div class="row">
                <div class="col-md-8">
                    <x-frontend.digital-board-video-component />
                </div>
                <div class="col-md-4">
                    <x-frontend.notice-section-component />
                </div>
            </div>
        </section>
        <section class="modules mt-3">
            <x-frontend.module-info-component />
        </section>
    </main>
@endsection
