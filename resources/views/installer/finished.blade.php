@extends('installer.layouts.master')

@section('title', 'समाप्त भयो')
@section('section')
    <p class="paragraph" style="text-align: center;">{{ session('message')['message'] ?? '' }}</p>
    <div class="buttons">
        <a href="{{ url('/') }}" class="button">बाहिर निस्कन यहाँ क्लिक गर्नुहोस्</a>
    </div>
@stop
