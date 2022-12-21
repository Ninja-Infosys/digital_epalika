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
                        <li class="breadcrumb-item active">सेटिङ</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्य विभाजन </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कार्य विभाजन </h4>
                        <a href="{{route('admin.taskManagement.taskDivision.create')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शाखाहरु अनुसार कार्यहरू </th>
                                <th>शीर्षक</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($taskDivisions as $taskDivision)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{\Illuminate\Support\Str::words($taskDivision->taskCategory->title??'',10)}}
                                </td>
                                <td>{{\Illuminate\Support\Str::words($taskDivision->title,10)}}</td>
                                <td>
                                    <a href="{{route('admin.taskManagement.taskDivision.edit',$taskDivision)}}"
                                       title="सम्पादन गर्नुहोस्"
                                       class="btn btn-xs btn-outline-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('admin.taskManagement.taskDivision.destroy',$taskDivision)}}"
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
                                    <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$taskDivisions->links()}}
                    </div>
                    <div class="mt-2">
                        {{ $taskDivisions->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
