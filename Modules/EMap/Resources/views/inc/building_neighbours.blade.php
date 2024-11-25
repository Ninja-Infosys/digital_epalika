
    @foreach($neighbours as $neighbour)
    <p>
        {{$neighbour->direction->label()}} तर्फको संधियार श्री {{get_nepali_number($neighbour->neighbour_name)}} दस्तखत .................,
    </p>
    @endforeach
