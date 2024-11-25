<table style="border-collapse: collapse; border: 1px solid; width: 100%;">
    <thead>
    <tr>
        <th style="width: 15%; border: 1px solid;">दिशा</th>
        <th style="width: 15%; border: 1px solid;">छोडेको आफ्नो जग्गा फिटमा</th>
        <th style="width: 30%; border: 1px solid;" colspan="2">
            संधियार
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="width: 50%; border: 1px solid;">कि.नं.</th>
                    <th style="width: 50%; border: 1px solid;">नाम</th>
                </tr>
            </table>
        </th>
        <th style="width: 20%; border: 1px solid;">कैफियत</th>
    </tr>
    </thead>
    <tbody>
    @foreach($neighbours as $neighbour)
        <tr>
            <td style="width: 15%; text-align: center; border: 1px solid;">
                {{$neighbour->direction->label() ?? ''}}
            </td>
            <td style="width: 15%; text-align: center; border: 1px solid;"></td>
            <td style="width: 15%; text-align: center; border: 1px solid;">
                {{get_nepali_number($neighbour->plot_no ?? '')}}
            </td>
            <td style="width: 15%; text-align: center; border: 1px solid;">
                {{$neighbour->neighbour_name ?? ''}}
            </td>
            <td style="width: 20%; text-align: center; border: 1px solid;"></td>
        </tr>
    @endforeach
    </tbody>
</table>
