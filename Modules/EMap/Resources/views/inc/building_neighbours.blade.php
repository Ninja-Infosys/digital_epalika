
    @foreach($neighbours as $neighbour)
    <p>
        {{$neighbour->direction->label()}}मा
        {{get_nepali_number($neighbour->neighbour_name)}}-{{get_nepali_number($neighbour->plot_no)}},
    </p>
    @endforeach
