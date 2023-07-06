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
                            <a href="">इ-नक्सा</a>
                        </li>
                        <li class="breadcrumb-item active"> पुरानो नक्सा </li>
                    </ol>
                </div>
                <h4 class="page-title"> पुरानो नक्सा  </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">पुरानो नक्सा सूची</h4>
                            <a href="{{route('emap.admin.oldMap.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>आर्थिक बर्ष</th>
                                <th>दर्ता नं</th>

                                <th>घरधनि नाम</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($oldMaps as $oldMap)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$oldMap->fiscalYear->title??''}}</td>
                                <td>{{$oldMap->registration_no}}</td>
                                <td>{{$oldMap->houseOwner->first()->name??''}}</td>
                                <td>
                                    @can('oldMap_edit')
                                        <a data-bs-type="edit" href="{{route('emap.admin.oldMap.edit',$oldMap)}}"
                                           class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                        </a>
                                    @endcan
                                    <form action="{{route('emap.admin.oldMap.destroy',$oldMap)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        @can('oldMap_delete')
                                            <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                <i class="fa fa-trash"></i> मेटाउनु होस्
                                            </button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
