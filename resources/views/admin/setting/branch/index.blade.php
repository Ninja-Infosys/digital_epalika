@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.setting.dashboard')}}">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">शाखा/उपशाखा</li>
                    </ol>
                </div>
                <h4 class="page-title">शाखा/उपशाखा</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">शाखा/उपशाखाहरु</h4>
                        @can('branch_create')
                            <a href="{{route('admin.generalSetting.branch.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शाखा नाम</th>
                                <th>मुख्य शाखा</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($branches as $key=>$branch)
                                <tr>
                                    <th>{{$loop->iteration}}</th>
                                    <th>{{$branch->branch_name}}</th>
                                    <td></td>
                                    <td>
                                        @can('branch_edit')
                                            <a data-bs-type="edit" href="{{route('admin.generalSetting.branch.edit',$branch)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('branch_delete')
                                            <form action="{{route('admin.generalSetting.branch.destroy',$branch)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                        title="मेटाउनु होस्">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                                @foreach($branch->branches as $subBranch)
                                    <tr>
                                        <td>
                                            {{$key+1}}.
                                            {{$loop->iteration}}
                                        </td>
                                        <td>{{$subBranch->branch_name}}</td>
                                        <td>{{$subBranch->branch->branch_name??''}}</td>
                                        <td>
                                            @can('branch_edit')
                                                <a data-bs-type="edit" href="{{route('admin.generalSetting.branch.edit',$subBranch)}}"
                                                   title="सम्पादन गर्नुहोस्"
                                                   class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            @endcan
                                            @can('branch_delete')
                                                <form action="{{route('admin.generalSetting.branch.destroy',$subBranch)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                            title="मेटाउनु होस्">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$branches->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
