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
                            <a class="ml-1 text-primary-500">तालिम</a>
                        </div>
                    </div>
                    <h4>हालसालै चलिरहेका तालिमहरु</h4>
                    <div class="shadow">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>तालिमको नाम</th>
                                <th>खुलेको मिति</th>
                                <th>बन्द हुने मिति</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($trainings as $training)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$training->name}}</td>
                                <td>{{$training->open_date}}</td>
                                <td>{{$training->closed_date}}</td>
                                <td>
                                    @if($training->form_type === \Modules\Roaster\Enums\TrainingTypeEnum::TECHNICAL_TRAINEE)
                                    <div class="d-flex justify-content-between">
                                        <a href="{{route('roaster.technicalTraineeForm',$training)}}"><i class="fa fa-eye"></i></a>
                                    </div>
                                    @else
                                        <div class="d-flex justify-content-between">
                                            <a href="{{route('roaster.traineeForm',$training)}}"><i class="fa fa-eye"></i></a>
                                        </div>
                                    @endif

                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="row">
                        <div class="col-md-6 p-2">
                            <div class="card bg-primary text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">तालिम आवेदन</h5>
                                    <i class="fa fa-file-invoice fs-5"></i>
                                    <p>नयाँ आवेदन को लागि आवेदन दिनुहोस ।</p>
                                    <a href="{{route('roaster.individual-training-view','trainee')}}" class="btn btn-light"><span>तालिम आवेदन</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card bg-success text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">लग इन</h5>
                                    <i class="fa fa-key fs-5"></i>
                                    <p>तालिम लग इन </p>
                                    <a href="#" class="btn btn-light"
                                    ><span>लग इन गर्नुहोस्</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card bg-danger text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">प्रशिक्षक दर्ता फर्म</h5>
                                    <i class="fa fa-address-card fs-5"></i>
                                    <p>नयाँ प्रशिक्षकको लागि दर्ता गर्नुहोस् ।</p>
                                    <a href="{{route('roaster.trainer-form')}}" class="btn btn-light"><span>प्रशिक्षक दर्ता फर्म</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2">
                            <div class="card bg-info text-light text-center">
                                <div class="card-body">
                                    <h5 class="fw-semibold mt-2">हाम्रा प्रशिक्षकहरु</h5>
                                    <i class="fa fa-user"></i>
                                    <p>हाम्रा प्रशिक्षकहरु ।</p>
                                    <a href="#" class="btn btn-light"><span>हाम्रा प्रशिक्षकहरु</span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 p-2 mt-1">
                            <div class="card bg-info text-light">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-address-card fs-5 me-2"></i>
                                        <h5 class="fw-semibold mt-2">संस्था दर्ता</h5>
                                    </div>
                                    <h6>नयाँ तालिमको लागि दर्ता गर्नुहोस् ।</h6>
                                    <h6>(NEC नम्बर लिएकोले ।)</h6>
                                    <a href="{{route('roaster.trainee-register')}}" class="btn btn-light"><span> संस्था </span>
                                        <i class="fa fa-angle-double-right"></i>
                                    </a>
                                    {{-- <a href="{{route('organization.register.formPerson')}}" class="btn btn-light"><span> व्यक्ति</span>--}}
                                    {{-- <i class="fa fa-angle-double-right"></i>--}}
                                    {{-- </a>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
