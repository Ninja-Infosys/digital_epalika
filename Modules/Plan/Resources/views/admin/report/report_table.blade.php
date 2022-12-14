<div class="table-responsive">
    <table class="table table-sm table-striped table-hover">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>दर्ता नं.</th>
            <th>आयोजनाको नाम</th>
            <th> सुरु हुने मिति</th>
            <th>सम्पन्‍न हुने मिति</th>
            <th>वडा नं.</th>
            <th>विनियोजन रकम</th>
            <th>योजना उपक्षेत्र</th>
            <th>योजनाको स्तर</th>
            <th>बजेट स्रोत</th>
            <th>आयोजनाको अवस्था</th>
        </tr>
        </thead>
        <tbody>
        @forelse($projects as $project)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$project->registration_no}}</td>
                <td>{{$project->project_name}}</td>
                <td>{{$project->project_start_date}}</td>
                <td>{{$project->project_completion_date}}</td>
                <td>{{$project->ward_no}}</td>
                <td>{{$project->allocated_amount}}</td>
                <td>{{$project->planArea->area_name??''}}</td>
                <td>{{$project->planLevel->level_name??''}}</td>
                <td>{{$project->budgetSource->source_name??''}}</td>
                <td>{{$project->project_status->label()}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="11" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
