{{-- @extends('frontend.layouts.master')
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
@endsection --}}

@extends('frontend.layouts.master')
@section('content')
    <main>
        <section>
            <x-frontend.scroll-news-component/>
        </section>
        <section class="notice mt-1">
            <div class="row">
                <div class="col-md-9">
                    <div class="table-1">
                        <h2 class="heading">नागरिक वडापत्र</h2>
                        <x-frontend.citizen-charter-component/>
                    </div>
                     {{-- <div class="table-2">
                        <h2 class="heading">करका दायराहरु</h2>
                        <x-frontend.revenue-component/>
                    </div>  --}}
                </div>
                <div class="col-md-3">
                    <div class="row">
                        <div class=" mb-2 video-container">
                            <x-frontend.digital-board-video-component/>
                        </div>
                        <div class="">
                            <h2 class="heading">सूचना र परिपत्र</h2>
                            <x-frontend.notice-vertical-slider-component/>
                        </div>
                        <div class="">
                            <h2 class="heading">जनप्रतिनिधि/कर्मचारी</h2>
                            <x-frontend.employee-section-component/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
