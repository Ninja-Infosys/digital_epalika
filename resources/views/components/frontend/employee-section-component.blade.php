<section class="employee pt-2">
    <div id="carouselExampleSlidesOnly" class="carousel slide height" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                @foreach($employees->take(3) as $employee)
                    <div class="{{$loop->first ? 'd-flex justify-content-center' : 'd-flex justify-content-between'}} pb-3">
                        <div class="card-employee rounded d-flex">
                            <div class="avatar avatar-lg">
                                <img
                                    src="{{$employee->photo_url}}"
                                    alt="{{$employee->name}}">
                            </div>
                            <div class="textbox-01 px-2">
                                <h6>{{$employee->name}}</h6>
                                <p>{{$employee->designation}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @foreach($employees->skip(3)->chunk(4) as $empChunk)
                <div class="carousel-item">
                    @foreach($empChunk as $employee)
                        <div class="d-flex justify-content-between pb-3">
                            <div class="card-employee rounded d-flex">
                                <div class="avatar avatar-lg">
                                    <img
                                        src="{{$employee->photo_url}}"
                                        alt="{{$employee->name}}">
                                </div>
                                <div class="textbox-01 px-2">
                                    <h6>{{$employee->name}}</h6>
                                    <p>{{$employee->designation}}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</section>
