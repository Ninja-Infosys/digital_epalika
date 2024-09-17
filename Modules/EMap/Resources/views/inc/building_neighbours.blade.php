
    @foreach($neighbours as $neighbour)
    <p>
        {{$neighbour->direction->label()}}मा बा.न.पा वडा नं {{get_nepali_number($neighbour->ward_no)}} बस्ने श्री {{get_nepali_number($neighbour->neighbour_name)}},
    </p>
    @endforeach
