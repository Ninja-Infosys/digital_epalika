@foreach($storeyDetails->load('mapFee') as $storeyDetail)
<p>{{get_nepali_number($storeyDetail->mapFee->storey)}}:{{get_nepali_number($storeyDetail->height)}}</p>
@endforeach
