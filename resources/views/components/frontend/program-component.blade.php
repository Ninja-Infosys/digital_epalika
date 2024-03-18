<div class="owl-carousel">
    @foreach ($programs as $program)
        <img src="{{ $program->image ?? ''}}" alt="{{ $program->title }}" class="program-img">
    @endforeach
</div>
