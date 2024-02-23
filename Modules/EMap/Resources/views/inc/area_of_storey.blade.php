@foreach($storeyDetails->load('mapFee') as $storeyDetail)
<p>{{get_nepali_number($storeyDetail->mapFee->storey)}}:{{get_nepali_number($storeyDetail->area_of_proposed_construction)}}</p>
@endforeach
