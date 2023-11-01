@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.plan.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">योजना {{$type=='planSubLevel' ? 'उपस्तरहरु':'स्तरहरू'}} </li>
                    </ol>
                </div>
                <h4 class="page-title">योजना {{$type=='planSubLevel' ? 'उपस्तरहरु':'स्तरहरू'}}</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">योजना {{$type=='planSubLevel' ? 'उपस्तरहरु':'स्तरहरू'}} सूची</h4>
                        @can('planLevel_create')
                            <a href="{{route('admin.plan.planLevel.create',$type)}}"
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
                                @if($type=='planSubLevel')
                                    <th>योजनाको उपस्तर</td>
                                @endif
                                <th>योजनाको स्तर</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($planLevels as $key=>$planLevel)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$planLevel->level_name}}</td>
                                    @if($type=='planSubLevel')
                                        <td>{{$planLevel->planLevel->level_name??''}}</td>
                                    @endif
                                    <td>
                                        <a data-bs-type="edit" href="{{route('admin.plan.planLevel.edit',[$type,$planLevel])}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                        <form action="{{route('admin.plan.planLevel.destroy',[$type,$planLevel])}}"
                                              method="post">
                                            @csrf
                                            @method('delete')
                                            <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
