<table style="border-collapse: collapse;border: 1px solid;width: 100%;">
    <thead>
    <tr>
        <th>क्र.सं.</th>
        <th>बाटो रहेको दिशा</th>
        <th>घर भएको / नभएको </th>
        <th>बाटोको प्रकार</th>
        <th>कैफियत</th>


    </tr>
    </thead>
    <tbody>
    @foreach($buildingDescriptions as $buildingDescription)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$buildingDescription->direction->label() ?? ''}}</td>
            <td>{{$buildingDescription->has_window ?? ''}}
            <td>{{$buildingDescription->has_road ?? ''}}</td>
            <td>{{$buildingDescription->remarks ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
