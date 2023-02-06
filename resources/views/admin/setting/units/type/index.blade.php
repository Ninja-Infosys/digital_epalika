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
                            <a href="{{route('admin.units.type.index')}}">मापन एकाइ प्रकार</a>
                        </li>
                        <li class="breadcrumb-item active">मापन एकाइ प्रकार</li>
                    </ol>
                </div>
                <h4 class="page-title">मापन एकाइ प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> मापन एकाइ प्रकारहरु</h4>
                        @can('unitType_create')
                            <a href="{{route('admin.units.type.create')}}"
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
                                <th>मापन एकाइ प्रकार</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($types as $type)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>
                                        {{$type->title}}
                                    </td>

                                    <td>
                                        @can('unitType_edit')
                                            <a data-bs-type="edit" href="{{route('admin.units.type.edit',$type)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('unitType_delete')
                                            <form action="{{route('admin.units.type.destroy',$type)}}"
                                                  method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete" class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endcan
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
