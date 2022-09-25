@extends('frontend.layouts.master')
@section('content')
<section class="view-notice">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card-01 justify-content px-5 pt-5 pb-5">
                    <h3>{{$notice->title}}</h3>
                    <small>- {{$notice->date->toDateString()??''}}</small>
                    <p>{!! $notice->description !!}</p>
                    <div class="col-lg-10">
                        <div class="row">
                            @foreach($notice->files as $file)
                                <div class="col-12 col-sm-6 col-md-4 mb-4">
                                    <a href="#">
                                        <img lazy="loaded" class="album-img pointer" alt="" src={{$file->file_url}}>
                                    </a>
                                </div>
                            @endforeach
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-notice/single-notice.css')}}">
@endpush
@endsection
