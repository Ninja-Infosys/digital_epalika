@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.digitalBoard.employee.index')}}">डिजिटल बोर्ड</a>
                        </li>
                        <li class="breadcrumb-item active">कर्मचारी </li>
                    </ol>
                </div>
                <h4 class="page-title">कर्मचारीहरु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कर्मचारी सुची</h4>
                        @can('user_create')
                            <a href="{{route('admin.digitalBoard.employee.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ कर्मचारी थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 table-striped table-hover mt-3">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम </th>
                                <th>समुह </th>
                                <th>पद </th>
                                <th>मर्यादाक्रम</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->department}}</td>
                                    <td>{{$employee->designation}}</td>
                                    <td>{{$employee->position}}</td>
                                    <td>
                                        <a href="{{route('admin.digitalBoard.employee.updateEmployeeStatus',$employee)}}"
                                           class="btn btn-xs btn-outline-{{$employee->status==1 ?'primary':'danger'}}" title="स्थिति">
                                            <i class="fa  {{$employee->status==1 ?' fa-check':'fa-window-close'}}"></i>

                                        </a>
                                        <a href="{{route('admin.digitalBoard.employee.edit',$employee)}}"
                                           class="btn btn-xs btn-outline-primary" title="सम्पादन गर्नुहोस्">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.digitalBoard.employee.destroy',$employee)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $employees->onEachSide(config('app.pagination_count'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

