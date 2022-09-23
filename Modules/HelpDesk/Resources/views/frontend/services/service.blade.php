@extends('helpdesk::layouts.master')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-7">
          <div class="card border-info p-2">
            <div class="text-center text-decoration-underline">
              <h6 class="fw-bold">प्रशासन शाखाक सेवाहरु</h6>
            </div>
            <div class="card-body">
              <ol>
                <li><a [routerLink]="['/notice-board/detail', 1]">नाता प्रमाणित </a></li>
                <li><a [routerLink]="['/notice-board/detail', 2]">घर बाटो प्रमिणित</a></li>
                <li><a [routerLink]="['/notice-board/detail', 3]">बिबाहिक प्रमिणित</a></li>
                <li><a [routerLink]="['/notice-board/detail', 4]">नागरिता शिफारिस</a></li>
              </ol>
              <a class="btn btn-primary" [routerLink]="['/notice-board']">
                <mat-icon svgIcon="icon_solid:backspace"></mat-icon>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/digitalBoard/css/index.css')}}">

    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
@endpush
@endsection
