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
                            <a href="{{route('admin.grievanceHandling.grievanceDetail.index')}}">गुनासो बिबरण </a>
                        </li>
                        <li class="breadcrumb-item active">गुनासो बिबरण   </li>
                    </ol>
                </div>
                <h4 class="page-title">गुनासो बिबरण   </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">गुनासो बिबरण </h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>गुनासोको प्रकार </th>
                                <th> गुनासोको अवस्था</th>
                                <th> जम्मा</th>
                                <th> पुरा बिवरण</th>
                                <th> कैफियत</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($grievanceDetails as $grievanceDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$grievanceDetail->grievanceType->title??''}}</td>
                                    <td>{{$grievanceDetail->complaint_severity}}</td>
                                    <td></td>
                                    <td>
                                        <a href="{{route('admin.grievanceHandling.grievanceDetail.edit',$grievanceDetail)}}"
                                           class="btn btn-xs btn-outline-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                    <td></td>
                                    <td>
{{--                                        <a href="{{route('admin.grievanceHandling.setting.grievanceType.edit',$grievance_type)}}"--}}
{{--                                           class="btn btn-xs btn-outline-primary">--}}
{{--                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्--}}
{{--                                        </a>--}}
{{--                                        <form action="{{route('admin.grievanceHandling.setting.grievanceType.destroy',$grievance_type)}}"--}}
{{--                                              method="post">--}}
{{--                                            @csrf--}}
{{--                                            @method('delete')--}}
{{--                                            <button class="btn btn-xs btn-outline-danger show_confirm">--}}
{{--                                                <i class="fa fa-trash"></i> मेटाउनु होस्--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
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


