<section class="employee pt-2">
    <div id="carouselExampleSlidesOnly" class="carousel slide height" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                    <div class="d-flex justify-content-center pb-3">
                        <div class="card-employee rounded d-flex">
                            <div class="avatar avatar-lg">
                                <img
                                    src="{{$employees->first()->photo_url ?? ''}}"
                                    alt="{{$employees->first()->name ?? ''}}">
                            </div>
                            <div class="textbox-01 px-2">
                                <h5>{{$employees->first()->name ?? ''}}</h5>
                                <p>{{$employees->first()->designation ?? ''}}</p>
                                <p>{{$employees->first()->phone ?? ''}}</p>
                                <p>{{$employees->first()->email ?? ''}}</p>

                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        @foreach($employees->skip(1)->take(2) as $otherEmployee)
                            <div class="col-md-6">
                                <div class="card-employee rounded d-flex">
                                    <div class="avatar avatar-lg">
                                        <img
                                            src="{{$otherEmployee->photo_url}}"
                                            alt="{{$otherEmployee->name}}">
                                    </div>
                                    <div class="textbox-01 px-2">
                                        <h5>{{$otherEmployee->name}}</h5>
                                        <p>{{$otherEmployee->designation}}</p>
                                        <p>{{$otherEmployee->phone}}</p>
                                        <p>{{$otherEmployee->email}}</p>
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
                                <div class="card-employee rounded d-flex">
                                    <div class="avatar avatar-lg">
                                        <img
                                            src="{{$employee->photo_url}}"
                                            alt="{{$employee->name}}">
                                    </div>
                                    <div class="textbox-01 px-2">
                                        <h5>{{$employee->name}}</h5>
                                        <p>{{$employee->designation}}</p>
                                        <p>{{$employee->phone}}</p>
                                        <p>{{$employee->email}}</p>
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
