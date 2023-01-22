@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.project.index')}}">
                                योजनाहरु
                            </a>
                        </li>
                        <li class="breadcrumb-item active">आयोजनासँग सम्बन्धित अन्य कागजातहरु </li>
                    </ol>
                </div>
                <h4 class="page-title">सम्बन्धित अन्य कागजातहरू</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="header-title">
                        ६. आयोजनासँग सम्बन्धित अन्य कागजातहरु
                    </h4>
                    <a href="{{route('admin.plan.project.uploadFilePage',$project)}}" class="btn btn-sm btn-outline-primary">
                        <i class="fa fa-plus-circle"> नयाँ थप्नुहोस्</i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>फाइल नाम </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($project->files as $file)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <a href="{{route('admin.file.download',$file)}}">
                                            <i class="fa fa-download"></i> {{$file->file_name}}
                                        </a>
                                    </td>
                                    <td>
                                        <form action="{{route('admin.file.destroy',$file)}}"
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
                                    <td colspan="3" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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
