<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($employees->chunk(3) as $empChunk)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="emp-section">
                    @foreach ($empChunk as $employee)
                        <div class="emp-card d-flex align-items-center p-1 rounded border">
                            <div class="flex-shrink-0">
                                <img src="{{ $employee->photo_url }}" class="rounded" alt="{{ $employee->name }}" width="100" height="120">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>{{ $employee->name }}</h5>
                                <h6 class="text-muted">{{ $employee->designation }}</h6>
                                <h6 class="text-muted"><i class="fa-solid fa-phone"></i> {{ $employee->phone }}</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
