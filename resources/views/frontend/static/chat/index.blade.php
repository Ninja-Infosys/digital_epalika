@extends('frontend.layouts.master')
@section('content')
<div id="frame" class="rounded border mt-5">
    <div class="top-menu pt-3 d-flex justify-content-around">
        <a href="{{url('/popup')}}" id="toggle">
            <i class="fa fa-bars"></i>
        </a>
        <h5>नागरिक सहायता</h5>
        <a href=""><i class="fa fa-x"></i></a>
    </div>
    @yield('chat')
    <form action="">
        <div class="message">
            <div class="input-group">
                    <textarea type="text" class="form-control" placeholder="संदेश यहा लेखानुहोस |"
                              name="message" row="2"></textarea>
                <span class="input-group-text" id="basic-addon2"><a href=""><i
                            class="fa fa-paper-plane fs-5"></i></a></span>
            </div>
        </div>
    </form>
</div>
@endsection
