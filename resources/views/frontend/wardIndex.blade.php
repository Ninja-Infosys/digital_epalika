@extends('frontend.layouts.master')
@section('content')
    <main>
        <section>
            <x-frontend.scroll-news-component :ward="$ward"/>
        </section>
        <section class="notice mt-1">
            <div class="row">
                <div class="col-md-8">
                    <div class="table-1">
                        <h2 class="heading px-2 text-center" style="color: white;">नागरिक वडापत्र</h2>
                        <x-frontend.citizen-charter-component :ward="$ward"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="video-container">
                            <x-frontend.digital-board-video-component  :ward="$ward"/>
                        </div>
                        <div class="">
                            <h2 class="sub-heading px-2 mb-0 text-center" style="color: white;">कार्यक्रमहरु</h2>
                            <x-frontend.program-component  :ward="$ward"/>
                        </div>
                        <div class="">
                            <h2 class="jana text-center px-2 mt-1 mb-0" style="color: white;">जिम्मेवार पदाधिकारी/कर्मचारी</h2>
                            <x-frontend.employee-section-component :ward="$ward"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
