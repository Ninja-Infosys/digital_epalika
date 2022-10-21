<section class="employee pt-2 pb-2">
    <div id="carouselExampleSlidesOnly" class="carousel slide height" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                    <div class="d-flex justify-content-center pb-3">
                        <div class="card-employee rounded">
                            <div class="card-employee-image">
                                <h5>{{$employees->first()->designation ?? ''}}</h5>
                                <img
                                    src="{{$employees->first()->photo_url ?? ''}}"
                                    alt="{{$employees->first()->name ?? ''}}">
                            </div>
                            <div class="textbox-01 px-2">
                                <h5>{{$employees->first()->name ?? ''}}</h5>
                                <p><i class="fa fa-phone px-1"></i>{{$employees->first()->phone ?? ''}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        @foreach($employees->skip(1)->take(2) as $otherEmployee)
                            <div class="col-md-6">
                                <div class="card-employee rounded">
                                    <div class="card-employee-image">
                                        <h5>{{$otherEmployee->designation}}</h5>
                                        <img
                                            src="{{$otherEmployee->photo_url}}"
                                            alt="{{$otherEmployee->name}}">
                                    </div>
                                    <div class="textbox-01 px-2">
                                        <h5>{{$otherEmployee->name}}</h5>
                                        <p><i class="fa fa-phone px-1"></i>{{$otherEmployee->phone}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
            @foreach($employees->skip(3)->chunk(4) as $empChunk)
                <div class="carousel-item">
                    <div class="row">
                        @foreach($empChunk as $employee)
                            <div class="col-md-6 mb-3">
                                <div class="card-employee rounded">
                                    <div class="card-employee-image">
                                        <h5>{{$employee->designation}}</h5>
                                        <img
                                            src="{{$employee->photo_url}}"
                                            alt="{{$employee->name}}">
                                    </div>
                                    <div class="textbox-01 px-2">
                                        <h5>{{$employee->name}}</h5>
                                        <p><i class="fa fa-phone px-1"></i>{{$employee->phone}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
