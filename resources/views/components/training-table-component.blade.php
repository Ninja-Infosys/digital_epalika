<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>क्र.सं</th>
            <th>तालिमको नाम</th>
            <th>खोलिएको मिति</th>
            <th>बन्द हुने मिति</th>
            <th>फारमको स्थिति</th>
            <th class="text-center"> कार्य</th>
        </tr>
        </thead>
        <tbody>
        @forelse($trainings as $training)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$training->name}}</td>
                <td>{{$training->open_date}}</td>
                <td>{{$training->closed_date}}</td>
                <td>

                    @can('training_access')
                    @if($training->form_status_according_to_date)
                        <a href="{{route('admin.roaster.training.set-form-status', $training)}}">
                            <i class="fa fa-2x fa-{{empty($training->closed_at) ? 'toggle-on text-success' : 'toggle-off text-danger'}}"></i>
                        </a>
                    @else
                        <i class="fa fa-2x fa-toggle-off text-secondary "></i>
                    @endif
                    @endcan
                </td>
                <td>
                    @can('training_access')
                    <a href="{{route('admin.roaster.training.show', $training)}}" class="btn btn-xs btn-outline-info"
                       data-toggle="tooltip" data-placement="top"
                       title="{{$training->training_trainees_count}} Trainees Detail">
                        <i class="fa fa-users"></i>
                    </a>
                    @endcan
                        @can('training_edit')
                    <a href="{{route('admin.roaster.training.edit', $training)}}"
                       type="button" class="btn btn-xs btn-outline-primary" data-toggle="tooltip" data-placement="top"
                       title="Edit">
                        <i class="fa fa-edit"></i>
                    </a>
                        @endcan
                        @can('training_access')
                    <a href="{{route('admin.roaster.training.report', $training)}}"
                       type="button" class="btn btn-xs btn-outline-success" data-toggle="tooltip" data-placement="top"
                       title="View Report">
                        <i class="fa fa-file"></i>
                    </a>

                        @endcan

                    <a href="javascript:void(0)"
                       class="btn btn-xs btn-outline-info printDetail"
                       data-toggle="tooltip"
                       title="Print Trainees Detail" route_action="{{route('admin.roaster.training.pdfExport', $training)}}" >
                        <i class="fa fa-print"></i>
                    </a>
                        @can('training_delete')
                    <form action="{{route('admin.roaster.training.destroy', $training)}}"
                          method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="show_confirm btn btn-xs btn-outline-danger"
                                data-toggle="tooltip" data-placement="top"
                                title="Delete">
                            <i class="fa fa-trash"></i>
                        </button>
                    </form>
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
</div>

