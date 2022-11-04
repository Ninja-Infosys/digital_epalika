@extends('frontend.layouts.master')
@section('content')
    <section class="container-fluid mt-4">
        @switch($trainingType)
            @case('trainee')
                <div class="bg-light p-2 mt-3">
                    <div class="text-center">
                        <h5 class="fw-bold text-decoration-underline">चलिरहेका कृषकका लागि तालिमहरु</h5>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($trainings as $training)
                            <div class="col-md-4">
                                <div class="card shadow2">
                                    <div class="card-body">
                                        <h4 class="fw-bold">
                                            {{$training->name}}
                                        </h4>
                                        <p>
                                            <b>खुलेको मिति:</b> {{$training->open_date}} | <b>बन्द हुने
                                                मिति: </b> {{$training->closed_date}}
                                        </p>
                                        @foreach($training->trainers as $trainer)
                                            <div class="user">
                                                <img src="{{$trainer->photo_url}}" alt="user"/>
                                                <div class="user-info">
                                                    <h5>{{$trainer->name}}</h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <a href="{{route('traineeForm',$training)}}"
                                               class="btn btn-dark btn-effect">आवेदन
                                                दिनुहोस्
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @break
            @case('technical_trainee')
                <div class="bg-light p-2 mt-3">
                    <div class="text-center">
                        <h5 class="fw-bold text-decoration-underline">चलिरहेका सेवा कालिन तालिमहरु</h5>
                    </div>
                    <hr>
                    <div class="row">
                        @foreach($trainings as $training)
                            <div class="col-md-4">
                                <div class="card shadow2">
                                    <div class="card-body">
                                        <h4 class="fw-bold">
                                            {{$training->name}}
                                        </h4>
                                        <p>
                                            <b>खुलेको मिति:</b> {{$training->open_date}} | <b>बन्द हुने
                                                मिति: </b> {{$training->closed_date}}
                                        </p>
                                        @foreach($training->trainers as $trainer)
                                            <div class="user">
                                                <img src="{{$trainer->photo_url}}" alt="user"/>
                                                <div class="user-info">
                                                    <h5>{{$trainer->name}}</h5>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-center">
                                            <a href="{{route('technicalTraineeForm',$training)}}"
                                               class="btn btn-dark btn-effect">आवेदन दिनुहोस्
                                                <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @break
            @default
                <h5>कुनै पनि तालिम भेटिएन</h5>
        @endswitch
    </section>
@endsection
