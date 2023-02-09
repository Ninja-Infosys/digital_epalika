<table class="table table-bordered">
    <thead>
    <tr>
        <th>प्रशिक्षार्थी आईडी</th>
        <th>फोटो</th>
        <th>पुरा नाम</th>
        <th>ठेगाना</th>
        <th>फोन</th>
        <th>इमेल</th>
        <th>छान्नुहोस्</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    @forelse($trainees as $trainee)
        <tr>
            <td>
                {{$trainee->reference_id ?? ''}}
            </td>
            <td>
                <img src="{{$trainee->photo_url ?? ''}}" height="60px;" alt="Image">
            </td>
            <td>{{$trainee->employee_name ?? ''}}</td>
            <td>{{$trainee->localBody->local_body ?? ''}}-{{$trainee->ward_no}}
                , {{$trainee->district->district ?? ''}} ,{{$trainee->province->province ?? ''}}</td>
            <td>{{$trainee->contact_no}}</td>
            <td>{{$trainee->email}}</td>
            <td>
                @can('technicalTrainee_access')
                <a href="{{route('admin.roaster.technicalTrainee.updateSelectTrainee', $trainee)}}"
                   class=" text-{{$trainee->select == 1 ? 'primary':'danger'}} btn-sm">
                   <i class="fa fa-2x fa-toggle-{{$trainee->select == 1 ? 'on':'off'}}"></i>
                </a>
                @endcan
            </td>
            <td class="d-flex justify-center">
                @can('technicalTrainee_edit')
                <a data-bs-type="edit" href="{{route('admin.roaster.technicalTrainee.edit', $trainee)}}" type="button"
                   class="btn btn-sm btn-primary {{get_setting('Pin')?'confirm_pin':''}}">
                    <i class="fa fa-edit"></i>
                </a>
                @endcan
                @can('technicalTrainee_access')
                <a data-bs-type="edit" href="{{route('admin.roaster.technicalTrainee.show',$trainee )}}" class="btn btn-info btn-sm {{get_setting('Pin')?'confirm_pin':''}}">
                    <i class="fa fa-eye"></i>
                </a>
                    @endcan
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">Data not found !!!</td>
        </tr>
    @endforelse

    </tbody>



</table>
