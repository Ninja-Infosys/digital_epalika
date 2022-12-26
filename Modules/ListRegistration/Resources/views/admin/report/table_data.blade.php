<div class="table-responsive">
    @if(!empty($listRegistrations))
        <table class="table table-sm mb-0 table-striped table-hover">
            <thead>
            <tr>
                <th>क्र.स</th>
                @foreach(array_keys($listRegistrations->first()->toArray()) as $key)
                    <th>
                        {{empty(config('table_header.listregistration.'.$key))
                                ? $key
                                : config('table_header.listregistration.'.$key)
                        }}
                    </th>
                @endforeach

            </tr>
            </thead>
            <tbody>
            @forelse($listRegistrations as $listRegistration)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    @foreach($listRegistration->toArray() as $key=>$registration)
                        <td>{{$registration}}</td>
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        {{--    {{$listRegistrations->first()->keys()->all()}}--}}
    @endif
</div>
