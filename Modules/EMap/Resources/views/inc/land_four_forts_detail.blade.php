<table style="border-collapse: collapse;border: 1px solid;width: 100%; margin-right:50px;">
    <thead>
    <tr>
        <th>दिशा</th>
        <th>छाडेको आफ्नो जग्गा </th>
        <th>संधियार</th>
        <th>कैफियत</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>पूर्व</td>
        <td>{{get_nepali_number($actualSetBack->east ?? '') ?? '..............'}}</td>
        <td>{{get_nepali_number($towards->east ?? '') ?? '..............'}}</td>
        <td></td>
    </tr>
    <tr>
        <td>पश्चिम</td>
        <td>{{get_nepali_number($actualSetBack->west ?? '') ?? '..............'}}</td>
        <td>{{get_nepali_number($towards->west ?? '') ?? '..............'}}</td>
        <td></td>
    </tr>
    <tr>
        <td>उत्तर</td>
        <td>{{get_nepali_number($actualSetBack->north ?? '') ?? '..............'}}</td>
        <td>{{get_nepali_number($towards->north ?? '') ?? '..............'}}</td>
        <td></td>
    </tr>
    <tr>
        <td>दक्षिण</td>
        <td>{{get_nepali_number($actualSetBack->south ?? '') ?? '..............'}}</td>
        <td>{{get_nepali_number($towards->south ?? '') ?? '..............'}}</td>
        <td></td>
    </tr>
    </tbody>
</table>
