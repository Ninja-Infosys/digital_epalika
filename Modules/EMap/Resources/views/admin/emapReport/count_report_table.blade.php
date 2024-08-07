<div class="table-responsive">
    @if(!empty($mapApplies))
        <table class="table table-bordered text-center table-sm mb-0 table-striped table-hover">
            <thead>
            <tr>
                <th>क्र. स.</th>
                <th>दर्ता भएका जम्मा नक्सा</th>
                <th>प्लिन्थ सम्म जम्मा इजाजत</th>
                <th>सुपरस्टरक्चर जम्मा इजाजत</th>
                <th>निर्माणकार्य सम्पन्न</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>{{ $generalCount }}</td>
                    <td>{{ $plinthStepCount }}</td>
                    <td>{{ $superStructureStepCount }}</td>
                    <td>{{$lastStepCount}}</td>
                </tr>
            </tbody>
        </table>
    @endif
</div>
