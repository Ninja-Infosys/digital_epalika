@extends('frontend.layouts.master')
@section('content')
    <main>
        <section>
            <x-frontend.scroll-news-component/>
        </section>
        <section class="notice mt-1">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-1">
                        <h2 class="heading text-white px-2 text-center">नागरिक वडापत्र</h2>
                        <x-frontend.citizen-charter-component/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="video-container">
                            <x-frontend.digital-board-video-component/>
                        </div>
                        <div class="">
                            <h2 class="sub-heading text-white px-2 mb-0">कार्यक्रमहरु</h2>
                            <x-frontend.program-component/>
                        </div>
                        <div class="">
                            <h2 class="jana text-center text-white px-2 mt-1 mb-0">जिम्मेवार पदाधिकारी/कर्मचारी</h2>
                            <x-frontend.employee-section-component/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
