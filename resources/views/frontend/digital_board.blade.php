@extends('frontend.layouts.master')
@section('content')
    <main class="container-fluid">
        <section class="news-section">
            <x-frontend.scroll-news-component/>
        </section>
        <section class="mid">
            <div class="row">
                <div class="col-md-6">
                <x-frontend.notice-vertical-slider-component/>
                </div>
                <div class="col-md-6">
                   <x-frontend.employee-section-component/>
                </div>
            </div>
        </section>
        <section class="last">
            <div class="row">
                <div class="col-md-6">
                    info desk
                </div>
                <div class="col-md-6">
                    video desk
                </div>
            </div>
        </section>
    </main>
@endsection
