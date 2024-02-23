@foreach($storeyDetails as $storeyDetail)
<p>{{$storeyDetail->mapfee->storey}}:{{$storeyDetail->height}}</p>
@endforeach
