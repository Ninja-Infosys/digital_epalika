@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.taskManagement.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">दैनिक कार्य</li>
                    </ol>
                </div>
                <h4 class="page-title">दैनिक कार्य</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दैनिक कार्य</h4>
                            <a href="{{route('admin.taskManagement.dailyTask.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>मिति</th>
                                <th>शाखा</th>
                                <th>मुख्य कार्य</th>
                                <th>कार्य</th>
                                <th>कैफियत</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($dailyTasks as $dailyTask)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$dailyTask->date}}</td>
                                    <td>
                                        {{\Illuminate\Support\Str::words($dailyTask->branch->branch_name??'',20)}}
                                    </td>
                                    <td>
                                        {{\Illuminate\Support\Str::words($dailyTask->taskCategory->title??'',20)}}
                                    </td>
                                    <td>
                                        {{\Illuminate\Support\Str::words($dailyTask->taskDivision->title ??'',20)}}
                                    </td>
                                    <td>{{$dailyTask->remarks}}</td>
                                    <td>
                                        <a href="{{route('admin.taskManagement.dailyTask.show',$dailyTask)}}"
                                           class="btn btn-xs btn-outline-info">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                        <a href="{{route('admin.taskManagement.dailyTask.edit',$dailyTask)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <form action="{{route('admin.taskManagement.dailyTask.destroy',$dailyTask)}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-xs btn-outline-danger show_confirm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
