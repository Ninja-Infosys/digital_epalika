<div class="table-responsive mt-2">
    <table class="table table-sm table-bordered">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>मिति</th>
            <th>शाखा</th>
            <th>मुख्य कार्य</th>
            <th>कार्य</th>
            <th>कैफियत</th>
        </tr>
        </thead>
        <tbody>
        @forelse($dailyTasks as $task)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$task->date}}</td>
                <td>{{$task->branch->branch_name??''}}</td>
                <td>{{$task->taskCategory->title??''}}</td>
                <td>{{$task->taskDivision->title??''}}</td>
                <td>{{$task->remarks}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
