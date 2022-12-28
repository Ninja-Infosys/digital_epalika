<div class="col-sm" style="text-align: end; margin-right: 10px">
    <button class="btn btn-sm btn-info"
        onclick="printJS({
        printable: 'printData',
        targetStyles: ['*'],
        ignoreElements:['ignore-header'],
        type: 'html'
        })">
        <i class="fa fa-print"></i> Print
    </button>
</div>
<div class="table-responsive" id="printData">
    <table class="table table-sm table-striped table-hover mt-2">
        <thead>
        <tr>
            <th>क्र.स</th>
            <th>समुहको परिचय पत्र.नं.</th>
            <th>समूह नाम</th>
            <th>दर्ता मिति</th>
            <th>दर्ता भएको कार्यालय</th>
        </tr>
        </thead>
        <tbody>
        @forelse($groups as $group)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$group->unique_id}}</td>
                <td>{{$group->name}}</td>
                <td>{{$group->registration_date}}</td>
                <td>{{$group->registered_office}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="10" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
