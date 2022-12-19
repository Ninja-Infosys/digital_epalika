@foreach($value as $data)
    @if(in_array($data->type,['image/jpeg','image/jpg', 'image/png', 'image/gif'])) @endif
    <img src="{{$data->url}}" alt="{{$data->name}}" width="200">
@endforeach
