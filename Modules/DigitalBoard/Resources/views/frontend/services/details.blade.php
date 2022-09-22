@extends('frontend.layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card border-info p-2">
                <div class="text-center text-decoration-underline">
                    <h6 class="fw-bold">प्रशासन शाखाक सेवाहरु</h6>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">सेवाको नाम</th>
                            <th scope="col">आवश्यक कागजात</th>
                            <th scope="col">सिफारिस/प्रमिरित उपलब्ध गराउने प्रक्रिया</th>
                            <th scope="col">लाग्ने समय</th>
                            <th scope="col">जिम्मेवार अधिकारी</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jacob</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <img class="rounded mx-auto d-block" src="https://molmac.ninjademos.com/storage/office_setting/xP5tV0JD1a3OJBs40rmxWE0u3JR7oUUojJPW1be6.png" height="100" width="100" alt="...">
                                        <div class="card-body">
                                            <p>पद: test</p>
                                            <p>सम्पर्क नं.: test</p>
                                            <p>इमेल: test</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <img class="rounded mx-auto d-block" src="https://molmac.ninjademos.com/storage/office_setting/xP5tV0JD1a3OJBs40rmxWE0u3JR7oUUojJPW1be6.png" height="100" width="100" alt="...">
                                        <div class="card-body">
                                            <p>पद: test</p>
                                            <p>सम्पर्क नं.: test</p>
                                            <p>इमेल: test</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-evenly">
                        <div>
                            आवश्यक कागजातहरु सबै छन् ?
                        </div>
                        <div>
                            <a class="btn btn-primary mt-1" (click)="ifYes(yes)">
                                छन्
                            </a>
                            <a class="btn btn-danger mt-1 ms-2" [routerLink]="['/notice-board']">
                                छैनन्
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="modal-header editRowModal">
        <button type="button" class="close btn btn-light" aria-label="Close" (click)="modal.dismiss('Cross click')">
            <span aria-hidden="true"><i class="material-icons">close</i></span>
        </button>
    </div>
    <div class="modal-body">
        <form>
            <div class="form-group">
                <label for="phone">छन् भने</label>
                <input type="number" class="form-control" id="phone"  placeholder="सम्पर्क नं.">
                <small id="phone-info" class="form-text text-muted">
                    आफ्नो फोन नम्बर हल्नुहोस
                </small>
            </div>
        </form>
    </div>
@push('styles')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
@endpush
@endsection
