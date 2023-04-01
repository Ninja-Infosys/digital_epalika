@extends('installer.layouts.master')

@section('title', 'स्वागत छ डिजिटल ई पालिकामा')
@section('section')
    <p class="paragraph" style="text-align: center;">सेटअप विजार्डमा स्वागत छ।</p>
    <div class="buttons">
        <a href="{{ route('installer.environment') }}" class="button">अर्को</a>
    </div>
@stop
