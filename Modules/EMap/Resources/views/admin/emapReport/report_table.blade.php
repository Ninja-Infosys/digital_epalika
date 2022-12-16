<div class="table-responsive">
    @if(!empty($mapApplies))
        <table class="table table-bordered text-center table-sm mb-0 table-striped table-hover">
            <thead>
            <tr>
                <th>क्र. स.</th>
                <th>निर्माण कार्यको किसिम</th>
                <th>प्रयोजन</th>
                <th>भवन ऐन अनुसार वर्गीकरण</th>
                <th>नक्सा</th>
                <th> हाल निर्माण गर्ने तल्ला संख्या</th>
                <th> भविष्यमा निर्माण गर्ने तल्ला संख्या</th>
            </tr>
            </thead>
            <tbody>
            @forelse($mapApplies as $mapApply)
                <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$mapApply->construction_type->label() ?? ''}}</td>
                    <td>{{$mapApply->usage->label() ?? ''}}</td>
                    <td>{{$mapApply->building_category->label() ?? ''}}</td>
                    <td>{{$mapApply->application_type->label()}}</td>
                    <td>{{$mapApply->current_storey ?? ''}}</td>
                    <td>{{$mapApply->future_storey ??  ''}}</td>
                </tr>
            @empty
                <tr>
                    <td class="text-center" colspan="13">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    @endif

</div>
