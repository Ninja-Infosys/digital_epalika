<table style="border-collapse: collapse;border: 1px solid;width: 100%;">
    <thead>
    <tr>
        <th style="width: 20%; border: 1px solid;">तल्ला</th>
        <th style="width: 30%; border: 1px solid;">साबिक निर्माण भरैसकेको क्षेत्रफल (वर्गफिट/वर्गमिटर)</th>
        <th style="width: 30%; border: 1px solid;">जग्गाको क्षेत्रफल </th>
        <th style="width: 20%; border: 1px solid;">कैफियत </th>
    </tr>
    </thead>
    <tbody>
    @foreach($buildingStoreyDetails as $buildingStoreyDetail)
        <tr>
            <td style="width: 20%; text-align: center; border: 1px solid;">{{$buildingStoreyDetail?->mapFee?->storey}}</td>
            <td style="width: 50%; text-align: center; border: 1px solid;">{{$buildingStoreyDetail->area_of_former_construction}}</td>
            <td style="width: 30%; text-align: center; border: 1px solid;">{{$buildingStoreyDetail->land_area}}</td>
            <td style="width: 20%; text-align: center; border: 1px solid;">{{$buildingStoreyDetail->remarks}}</td>
        </tr>
    @endforeach
    </tbody>
</table>



