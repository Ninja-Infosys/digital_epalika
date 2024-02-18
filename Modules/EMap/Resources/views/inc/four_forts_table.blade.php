<table style="border-collapse: collapse;border: 1px solid;width: 100%;">
    <thead>
    <tr>
        <th>विवरण</th>
        <th>पूर्व</th>
        <th>पश्चिम</th>
        <th>दक्षिण</th>
        <th>उत्तर</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fourForts as $fourFort)
    <tr>
        <td>{{$fourFort->detail->label()}}
        <td>{{get_nepali_number($fourFort->east)}}</td>
        <td>{{get_nepali_number($fourFort->west)}}</td>
        <td>{{get_nepali_number($fourFort->north)}}</td>
        <td>{{get_nepali_number($fourFort->south)}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
