@extends('frontend.layouts.master')
@section('content')
<section class="help-section">
    <div class="container">
        <div class="d-flex mt-5">
            <div class="breadcrumb d-flex">
                <div>
                    <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                </div>
                <div class="d-flex ml-1 whitespace-nowrap">
                    <mat-icon
                        class="icon-size-5 text-secondary"
                        [svgIcon]="'icon_solid:chevron-right'"></mat-icon>
                    <a class="ml-1 text-primary-500">आवेदन ट्रयाक</a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 mt-3">
                <h4 class="fw-semibold heading-line">आवेदन ट्रयाक</h4>
                <p>तपाइँको आवेदन कुन चरणमा छ भन्ने थाहा पाउन तलको विवरण भर्नुहोस् ।</p>
                <div class="card-01 mt-3">
                    <form class="m-2">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">सम्पर्क नम्बर *</label>
                                    <input type="text" class="form-control" id="phone" placeholder="सम्पर्क नम्बर">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="applicant_no" class="form-label">आवेदक नम्बर *</label>
                                    <input type="text" class="form-control" id="applicant_no" placeholder="आवेदक नम्बर">
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
