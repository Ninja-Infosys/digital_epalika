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

                        <li class="breadcrumb-item active">योजना स्तरहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">योजना स्तरहरू</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">योजना स्तर सूची</h4>
                        @can('planLevel_create')
                            <a href="{{route('admin.plan.planLevel.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>योजनाको स्तर</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($planLevels as $key=>$planLevel)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$planLevel->level_name}}</td>
                                    <td>
                                        @can('planLevel_edit')
                                            <a href="{{route('admin.plan.planLevel.edit',$planLevel)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('planLevel_delete')
                                            <form action="{{route('admin.plan.planLevel.destroy',$planLevel)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-xs btn-outline-danger show_confirm">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
                                            </form>
                                        @endcan
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
