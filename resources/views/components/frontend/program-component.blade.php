<div class="row">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($programs as $program)
                {{-- <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="emp-section">
                        <div class="emp-card p-1 rounded border">
                            <h5 class="text-white mb-0 sub-head px-1">{{ $program->title }}</h5>
                            <img src="{{ $program->image }}" class="rounded" alt=""  width="200" height="120">
                        </div>
                        <!-- <div class="bg-overlay"></div> -->
                    </div>
                </div> --}}

                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ $program->image }}" alt="..." height="120">
                    {{-- <div class="carousel-caption d-none d-md-block">
                      <h5>...</h5>
                      <p>...</p>
                    </div> --}}
                </div>
            @endforeach
        </div>
    </div>
</div>
