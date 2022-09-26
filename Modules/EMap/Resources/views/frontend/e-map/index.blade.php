@extends('frontend.layouts.master')
@section('content')
    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <h4>हालसालै प्रकसित भयका सूचनाहरु</h4>
                    <p>तल दिएको सूचना पढनुहोस् र आफुले चाहेको सूचना डाउनलोड गर्नुहोस्। </p>
                    <div class="shadow">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>सूचना शीर्षक</th>
                                <th>प्रकाशित मिति</th>
                                <th>फाईल</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>१</th>
                                <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                                <td>२०७९/०२/११</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href=""><i class="fa fa-eye"></i></a>
                                        <a href=""><i class="fa fa-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>2</th>
                                <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                                <td>२०७९/०२/११</td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a href=""><i class="fa fa-eye"></i></a>
                                        <a href=""><i class="fa fa-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="card bg-primary text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">सूचना</h5>
                                    <i class="fa fa-file-invoice fs-5"></i>
                                    <p>नयाँ सूचनाहरु हेर्नुहोस ।</p>
                                    <a href="{{url('notice')}}" class="btn btn-light"><span>सूचनाहरु</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card bg-success text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">इ-नक्सा लग इन</h5>
                                    <i class="fa fa-gears fs-5"></i>
                                    <p>नयाँ इ-नक्साको लागि दर्ता गर्नुहोस् ।</p>
                                    <a href="{{route('organization.login.form')}}" class="btn btn-light"
                                       ><span>नयाँ दर्ता गर्नुहोस्</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card bg-danger text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">डाउनलोड</h5>
                                    <i class="fa fa-download fs-5"></i>
                                    <p>नक्सा समन्धी कागजा ।</p>
                                    <a href="{{url('downloads')}}" class="btn btn-light"><span>डाउनलोडहरु</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card bg-info text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">संस्था दर्ता</h5>
                                    <i class="fa fa-address-card fs-5"></i>
                                    <p>तपाइँको आवेदन कुन चरणमा छ?</p>
                                    <a href="{{route('organization.register.form')}}" class="btn btn-light"><span>नयाँ दर्ता गर्नुहोस्</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="{{asset('assets/frontend/css/e-map/index.css')}}">
    @endpush
@endsection
