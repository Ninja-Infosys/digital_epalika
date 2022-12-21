<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($employees->chunk(3) as $empChunk)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="employee" style="max-width: 700px; height:38rem;">
                    @foreach ($empChunk as $employee)
                        <div class="card mb-3 mt-4" style="max-width: 700px; height:26%; background-color: #0DCAF0;">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ $employee->photo_url }}" class="img-fluid rounded-start"
                                        alt="{{ $employee->name }}"
                                        style="object-fit: contain; height: 10rem; width: 87%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body mt-2">
                                        <h5 class="card-title" style="font-size: 22px; color:black">
                                            <b>{{ $employee->name }}</b>
                                        </h5>
                                        <p class="card-text" style="color: #0047AB; font-size: 18px">
                                            {{ $employee->designation }}</p>
                                        <p style="font-size: 18px;color:black"><i
                                                class="fa-solid fa-phone"></i>{{ $employee->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
