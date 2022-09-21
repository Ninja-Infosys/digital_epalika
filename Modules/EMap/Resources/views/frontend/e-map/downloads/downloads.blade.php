@extends('resources.views.frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container-fluid">
            <div class="row d-flex mt-5">
                <div class="col-md-10 mx-auto">
                    <div class="breadcrumb d-flex">
                        <div>
                            <a class="whitespace-nowrap text-primary-500" href="{{url('e-map')}}">ई-नक्सा</a>
                        </div>
                        <div class="d-flex ml-1 whitespace-nowrap">
                            <mat-icon
                                class="icon-size-5 text-secondary"
                                [svgIcon]="'icon_solid:chevron-right'"></mat-icon>
                            <a class="ml-1 text-primary-500">डाउनलोड</a>
                        </div>
                    </div>
                    <h4 class="fw-semibold heading-line">डाउनलोडहरु</h4>
                    <p>तल दिएको डाउनलोड पढनुहोस् र आफुले चाहेको डाउनलोड गर्नुहोस्। </p>
                    <div class="bg-card shadow rounded overflow-hidden">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">क्र.स.</th>
                                <th scope="col">डाउनलोड शीर्षक</th>
                                <th scope="col">प्रकाशित मिति</th>
                                <th scope="col">फाईल</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">१</th>
                                <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                                <td>२०७९/०२/११</td>
                                <td class="d-flex justify-content-around">
                                    <button class="btn btn-view btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:eye'"></mat-icon>
                                    </button>
                                    <button class="btn btn-download btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:download'"></mat-icon>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">२</th>
                                <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                                <td>२०७९/०२/११</td>
                                <td class="d-flex justify-content-around">
                                    <button class="btn btn-view btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:eye'"></mat-icon>
                                    </button>
                                    <button class="btn btn-download btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:download'"></mat-icon>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">३</th>
                                <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                                <td>२०७९/०२/११</td>
                                <td class="d-flex justify-content-around">
                                    <button class="btn btn-view btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:eye'"></mat-icon>
                                    </button>
                                    <button class="btn btn-download btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:download'"></mat-icon>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">४</th>
                                <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                                <td>२०७९/०२/११</td>
                                <td class="d-flex justify-content-around">
                                    <button class="btn btn-view btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:eye'"></mat-icon>
                                    </button>
                                    <button class="btn btn-download btn-light">
                                        <mat-icon [svgIcon]="'icon_solid:download'"></mat-icon>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/e-map/downloads.css')}}">
    @endpush
@endsection
