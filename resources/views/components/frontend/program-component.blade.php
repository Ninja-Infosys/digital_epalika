<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($programs as $program)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="flex-shrink-0">
                    <img src="{{ $program->image ?? ''}}" alt="{{ $program->title }}" class="program-img">
                    <span class="d-block text-black  text-center px-1">{{ $program->title }} </span>
                    {{-- <span class="d-block text-white sub-head  px-1"><i class="fa fa-envelope"></i> {{ $representative->email }} </span> --}}

                </div>
            </div>
        @endforeach
    </div>
</div>
