@extends('admin.layouts.master')
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.roaster.dashboard')}}">
                                   <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.roaster.training.index')}}">तालिम</a>
                            </li>
                            <li class="breadcrumb-item">
                                तालिम विवरण
                            </li>
                        </ol>
                    </div>
                    <h4 class="page-title">तालिम विवरण</h4>
                </div>
            </div>
        </div>
        <div class="card mb-3 p-0">
            <div class="card-header text-dark d-flex justify-content-between">
                <h5>तालिम खोल्नुहोस</h5>
            </div>
            <form action="{{route('admin.roaster.training.store')}}" method="post">
                <div class="card-body px-0">
                    @csrf
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="name">तालिमको नाम * </label>
                            <input id="name" type="text" name="name" placeholder="तालिमको नाम"
                                   class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-4 mb-2">
                            <label for="open_date">फारम खुल्ने मिति * </label><br>
                            <input id="open_date" type="datetime-local" name="open_date" placeholder="फारम खुल्ने मिति"
                                   class="form-control @error('open_date') is-invalid @enderror"
                                   value="{{old('open_date')}}">
                            @error('open_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="closed_date">फारम बन्द हुने मिति * </label><br>
                            <input id="closed_date" type="datetime-local" name="closed_date"
                                   placeholder="फारम बन्द हुने मिति"
                                   class="form-control @error('closed_date') is-invalid @enderror"
                                   value="{{old('closed_date')}}">
                            @error('closed_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="trainee_open_date">प्रशिक्षार्थीको लागि खुल्ने मिति * </label><br>
                            <input id="trainee_open_date" type="datetime-local" name="trainee_open_date" placeholder="प्रशिक्षार्थीको लागि खुल्ने मिति"
                                   class="form-control @error('trainee_open_date') is-invalid @enderror"
                                   value="{{old('trainee_open_date')}}">
                            @error('trainee_open_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="trainee_closed_date">प्रशिक्षार्थीको लागि बन्द हुने मिति * </label><br>
                            <input id="trainee_closed_date" type="datetime-local" name="trainee_closed_date"
                                   placeholder="प्रशिक्षार्थीको लागि बन्द हुने मिति"
                                   class="form-control @error('trainee_closed_date') is-invalid @enderror"
                                   value="{{old('trainee_closed_date')}}">
                            @error('trainee_closed_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="organization_open_date">संस्था देखि खुल्ने मिति * </label><br>
                            <input id="organization_open_date" type="datetime-local" name="organization_open_date" placeholder="संस्था देखि खुल्ने मिति"
                                   class="form-control @error('organization_open_date') is-invalid @enderror"
                                   value="{{old('organization_open_date')}}">
                            @error('organization_open_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="organization_closed_date">संस्था देखि बन्द हुने मिति * </label><br>
                            <input id="organization_closed_date" type="datetime-local" name="organization_closed_date"
                                   placeholder="संस्था देखि बन्द हुने मिति"
                                   class="form-control @error('organization_closed_date') is-invalid @enderror"
                                   value="{{old('organization_closed_date')}}">
                            @error('organization_closed_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="trainers">प्रशिक्षक * </label>
                            <select id="form_type" name="trainers[]"
                                    class="form-control @error('trainers') is-invalid @enderror" data-toggle="select2" multiple>
                                <option value="" disabled>प्रशिक्षक छान्नुहोस्</option>
                                @foreach($trainers as $trainer)
                                    <option
                                        value="{{$trainer->id}}" {{in_array($trainer->id, old('trainers',[])) ? 'selected': ''}}>{{$trainer->name}}</option>
                                @endforeach
                            </select>
                            @error('trainers')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">पेश गर्नुहोस्</button>
                </div>
            </form>
        </div>
        <div class="card p-0">
            <div class="card-header text-dark d-flex justify-content-between">
                <h5>तालिमको विवरण</h5>

            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-sm table-custom">
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
                                <td class="d-flex gap-1">
                                    @can('training_access')
                                    <a data-bs-type="edit" href="{{route('admin.roaster.training.show', $training)}}" class="btn btn-xs btn-outline-info {{get_setting('Pin')?'confirm_pin':''}}"
                                       data-toggle="tooltip" data-placement="top"
                                       title="{{$training->training_trainees_count}} Trainees Detail">
                                        <i class="fa fa-users"></i>
                                    </a>
                                    @endcan
                                        @can('training_edit')
                                    <a data-bs-type="edit" href="{{route('admin.roaster.training.edit', $training)}}"
                                       type="button" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" data-toggle="tooltip" data-placement="top"
                                       title="Edit">
                                       <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
                                    </a>
                                        @endcan
                                        @can('training_access')
                                    <a data-bs-type="edit" href="{{route('admin.roaster.training.report', $training)}}"
                                       type="button" class="btn btn-xs btn-outline-success {{get_setting('Pin')?'confirm_pin':''}}" data-toggle="tooltip" data-placement="top"
                                       title="View Report">
                                        <i class="fa fa-file"></i>
                                    </a>

                                        @endcan
                                        @can('training_access')
                                    <a data-bs-type="edit" href="{{route('admin.roaster.training.excelReport', $training)}}"
                                       type="button" class="btn btn-xs btn-outline-success {{get_setting('Pin')?'confirm_pin':''}}" data-toggle="tooltip" data-placement="top"
                                       title="View Report">
                                        <i class="fa fa-file-excel"></i>
                                    </a>

                                        @endcan

                                    <a href="{{route('admin.roaster.training.pdfExport', $training)}}"
                                       class="btn btn-xs btn-outline-info"
                                       data-toggle="tooltip"
                                       title="Print Trainees Detail">
                                        <i class="fa fa-print"></i>
                                    </a>
                                        @can('training_delete')
                                    <form action="{{route('admin.roaster.training.destroy', $training)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button data-bs-type="delete" type="submit" class="show_confirm btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg>
                                        </button>
                                    </form>
                                        @endcan
                                </td>
                            </tr>
                            <tr class="empty">
                                <td></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Data not found !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>





            </div>
        </div>
@endsection
