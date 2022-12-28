<div class="table-responsive">
    @if($lists->isNotEmpty())
        <table class="table table-sm mb-0 table-striped table-hover">
            <thead>
            <tr>
                <th>क्र.स</th>
                @foreach(getArrayKeys($lists->first()?->toArray()) as $key)
                    <th>
                        {{empty(config('table_header.'.Str::lower(Request::segment(2)).'.'.$key))
                                ? $key
                                : config('table_header.'.Str::lower(Request::segment(2)).'.'.$key)
                        }}
                    </th>
                @endforeach

            </tr>
            </thead>
            <tbody>
            @forelse($lists as $list)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    @foreach($list->toArray() as $key=>$data)
                        @if(is_array($data))
                            @foreach($data as $d)
                                @if(!is_array($d))
                                    <td>
                                        {{$d}}
                                    </td>
                                @endif
                            @endforeach
                        @else
                            <td>{{$data}}</td>
                        @endif
                    @endforeach
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    @endif
</div>
@if($excelUrl)
    <a href="{{route('admin.file-url-download',['file_url' => $excelUrl])}}">ExcelData</a>
@endif
