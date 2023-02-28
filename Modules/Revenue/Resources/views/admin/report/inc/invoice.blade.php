@foreach($invoices as $invoice)
    <tr>
        <td>{{$loop->iteration}}</td>
        @foreach($invoice['wards'] as $ward_count)
            <td>{{$ward_count}}</td>
        @endforeach
        <td>{{$invoice['total']}}</td>
    </tr>

@endforeach
<tr>
    <td >जम्मा</td>
    @foreach(officeSetting()->localBody->ward_no as $ward_no)
        <th>{{$invoices->sum('wards.'.$loop->index)}}</th>
    @endforeach
    <td>{{$invoices->sum('total')}}</td>
</tr>
