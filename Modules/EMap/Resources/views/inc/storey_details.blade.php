<table style="border-collapse: collapse;border: 1px solid;width: 100%;">
    <thead>
    <tr>
        <th>तल्ला</th>
        <th >प्रस्तावित निर्माणको क्षेत्रफल</th>
        <th>साविक निर्माणको क्षेत्रफल </th>
        <th>जम्मा क्षेत्रफल </th>
        <th>उचाई </th>
    </tr>
    </thead>
    <tbody>
    @foreach($storeyDetails as $storeyDetail)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$storeyDetail->area_of_proposed_construction}}</td>
            <td>{{$storeyDetail->area_of_former_construction}}</td>
            <td>{{$storeyDetail->total_area}}</td>
            <td>{{$storeyDetail->height}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
