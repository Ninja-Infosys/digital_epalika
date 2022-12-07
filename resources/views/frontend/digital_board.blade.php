@extends('frontend.layouts.master')
@section('content')
    <main class="container-fluid">
        <section class="news-section">
            <x-frontend.scroll-news-component />
        </section>
    </main>
    <div class="container" style="color: #E2DFDF">
        <section class="mid">
            <div class="row">
                <div class="col-md-8">
                    <x-frontend.notice-vertical-slider-component />
                </div>
                <div class="col-md-4">
                    <x-frontend.employee-section-component />
                </div>
            </div>
        </section>
        <section class="mid mb-4">
            <div class="row">
                <div class="col-md-8">
                    <x-frontend.digital-board-video-component />
                </div>
                <div class="col-md-4">
                    <x-frontend.notice-section-component />
                </div>
            </div>
        </section>
    </div>
    <div class="container" style="color: #E2DFDF">
        <section class="mid mb-4">
            <div class="row">
                <div class="col-md-12">
                    <x-frontend.module-info-component />
                </div>
            </div>
        </section>
    </div>
@endsection
