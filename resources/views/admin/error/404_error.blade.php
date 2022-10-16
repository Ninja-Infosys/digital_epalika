@extends('admin.layouts.master')

@section('content')
    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-lg-6 col-xl-4 mb-4">
                <div class="error-text-box">
                    <svg viewBox="0 0 600 200">
                        <!-- Symbol-->
                        <symbol id="s-text">
                            <text text-anchor="middle" x="50%" y="50%" dy=".35em">404!</text>
                        </symbol>
                        <!-- Duplicate symbols-->
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                        <use class="text" xlink:href="#s-text"></use>
                    </svg>
                </div>
                <div class="text-center">
                    <h3 class="mt-0 mb-2">उफ्! पृष्ठ फेला परेन </h3>

                    <a href="{{route('admin.dashboard')}}" class="btn btn-success waves-effect waves-light">
                        ड्यासबोर्डमा फर्कनुहोस्
                    </a>
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->


    </div> <!-- container -->

@endsection
