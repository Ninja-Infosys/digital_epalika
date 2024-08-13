<table style="border-collapse: collapse;border: 1px solid;width: 100%;">
    <thead>
    <tr>
        <th>तल्ला</th>
        <th>निर्माण कार्य सम्पन्न मिति</th>
        <th >क्षेत्रफल</th>
        <th>जम्मा क्षेत्रफल </th>
        <th>उचाई </th>
        <th>कोठा संख्या </th>
    </tr>
    </thead>
    <tbody>
    @foreach($storeyDetails as $storeyDetail)
        <tr>
            <td>{{$storeyDetail?->mapFee?->storey}}</td>
            <td></td>
            <td>{{$storeyDetail->area_of_proposed_construction}}</td>
            <td>{{$storeyDetail->total_area}}</td>
            <td>{{$storeyDetail->height}}</td>
            <td>{{$storeyDetail->room}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
