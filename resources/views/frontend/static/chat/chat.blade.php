@extends('frontend.layouts.master')
@section('content')
    <div id="frame" class="rounded border mt-5">
        <div class="container pt-3 d-flex justify-content-around">
            <a id="toggle">
                <i class="fa fa-bars"></i>
            </a>
            <p>नागरिक सहायता</p>
            <a href=""><i class="fa fa-x"></i></a>
        </div>
        <div class="chat rounded">
            <ul class="sender">
                <li class="d-flex py-2">
                    <img src="{{asset('assets/frontend/image/avatar.png')}}" alt="">
                    <p>yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\</p>
                </li>
            </ul>
            <ul class="receiver">
                <li class="d-flex py-2">
                    <p>yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\ yयो सनेदेस्ज हो मैले पथको\</p>
                    <img src="{{asset('assets/frontend/image/avatar.png')}}" alt="">
                </li>
            </ul>
        </div>
        <form action="">
            <div class="message">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="संदेश यहा लेखानुहोस |"
                           aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2"><a href=""><i
                                class="fa fa-paper-plane"></i></a></span>
                </div>
            </div>
        </form>
    </div>

@endsection
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/chat.css')}}">
@endpush
