@extends('frontend.layouts.master')
@section('content')
<div class="content-section">
    <div class="text-center text-decoration-underline m-4">
        <h5 class="fw-bold">तपशिल सेवा लिन सम्बन्धित ठाउँमा click गर्नुहोस्</h5>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card border-info p-2">
                <div class="text-center text-decoration-underline">
                    <h6 class="fw-bold">शाखाहरु</h6>
                </div>
                <mat-accordion>
                    <mat-expansion-panel class="mt-1">
                        <mat-expansion-panel-header>
                            <mat-panel-title>
                                <h6 class="fw-bold">प्रशासन शाखा</h6>
                            </mat-panel-title>
                        </mat-expansion-panel-header>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा १</p>
                                <div class="example-button-container">
                                    <a href="{{url('digitalBoard/service')}}" mat-mini-fab color="primary" [routerLink]="['services']">
                                        <mat-icon>double_arrow</mat-icon>
                                    </a>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा २</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ३</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ४</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </mat-expansion-panel>
                    <mat-expansion-panel class="mt-1">
                        <mat-expansion-panel-header>
                            <mat-panel-title>
                                <h6 class="fw-bold">जिन्सी शाखा</h6>
                            </mat-panel-title>
                        </mat-expansion-panel-header>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा १</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा २</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ३</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ४</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </mat-expansion-panel>
                    <mat-expansion-panel class="mt-1">
                        <mat-expansion-panel-header>
                            <mat-panel-title>
                                <h6 class="fw-bold">योजना शाखा</h6>
                            </mat-panel-title>
                        </mat-expansion-panel-header>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा १</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा २</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ३</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ४</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </mat-expansion-panel>
                    <mat-expansion-panel class="mt-1">
                        <mat-expansion-panel-header>
                            <mat-panel-title>
                                <h6 class="fw-bold">खुलकुद शाखा</h6>
                            </mat-panel-title>
                        </mat-expansion-panel-header>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा १</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा २</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ३</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <p class="fw-bold mt-3">प्रशासन उपशाखा ४</p>
                                <div class="example-button-container">
                                    <button mat-mini-fab color="primary">
                                        <mat-icon>double_arrow</mat-icon>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </mat-expansion-panel>
                </mat-accordion>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-info p-2">
                <div class="text-center text-decoration-underline">
                    <h6 class="fw-bold">सेवाहरु</h6>
                </div>
                <ol>
                    <li><a href="{{url('digitalBoard/details')}}">नाता प्रमाणित </a></li>
                    <li><a  href="{{url('digitalBoard/details')}}">घर बाटो प्रमिणित</a></li>
                    <li><a  href="{{url('digitalBoard/details')}}">बिबाहिक प्रमिणित</a></li>
                    <li><a  href="{{url('digitalBoard/details')}}">नागरिता शिफारिस</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/digitalBoard/css/index.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
@endpush
@endsection
