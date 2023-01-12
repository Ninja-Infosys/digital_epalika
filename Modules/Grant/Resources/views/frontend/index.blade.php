@extends('frontend.layouts.master')
@section('content')
    <section class="latest-news">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-5">
                    <div class="breadcrumb d-flex">
                        <div class="breadcrumb-item">
                            <a class="whitespace-nowrap text-primary-500" href="{{route('welcome')}}">ई-पालिका</a>
                            <i class="fa fa-angle-double-right text-light"></i>
                            <a class="ml-1 text-primary-500">अनुदान</a>
                        </div>
                    </div>
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
                                    <a href="#" class="btn btn-light"><span>सूचनाहरु</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 p-2">
                            <div class="card bg-danger text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">नयाँ दर्ता</h5>
                                    <i class="fa fa-address-card fs-5"></i>
                                    <p>नयाँ अनुदानको लागि दर्ता गर्नुहोस् ।</p>
                                    <a href="{{route('grant.applicationRegistration')}}" class="btn btn-light"><span>नयाँ दर्ता गर्नुहोस्</span>
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
@endsection

