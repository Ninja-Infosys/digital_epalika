@extends('frontend.layouts.master')
@section('content')
    <section class="inner-section mt-lg-5 ">
        <div class="container">
            <div class="row d-flex mt-5 ">
                <div class="breadcrumb d-flex">
                    <div class="breadcrumb-item">
                        <a class="whitespace-nowrap text-primary-500" href="{{route('grievanceHandling.grievance')}}">गुनासो</a>
                        <i class="fa fa-angle-double-right ml-lg-1 text-light"></i><a class="ml-1 text-primary-500">नीति सुची</a>
                    </div>
                </div>
                <h4 class="text-center">नीतिहरु</h4>
                <p class="text-center">तल दिएको नीति फर्म पुरा पढनुहोस् र आफुले चाहेको नीति डाउनलोड गर्नुहोस्। </p>
                <div class="bg-card shadow rounded overflow-hidden">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="fs-5">
                            <th scope="col">क्र.स.</th>
                            <th scope="col">नीतिको शीर्षक</th>
                            <th scope="col">प्रकाशित मिति</th>
                            <th scope="col">फाईल</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">१</th>
                            <td>विपन्‍न बस्तीमा मुख्यमन्त्री कार्यक्रम सञ्‍चालन मापदण्ड, २०७८</td>
                            <td>२०७९/०२/११</td>
                            <td>
                                <div class="d-flex justify-content-around">
                                    <button class="btn btn-sm btn-primary bg-primary text-white" href=""><i class="fa fa-eye"></i></button>
                                    <button class="btn btn-sm btn-primary bg-primary text-white" href=""><i class="fa fa-download"></i></button>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
