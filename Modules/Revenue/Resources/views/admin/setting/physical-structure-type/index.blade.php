@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.revenue.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">स्ट्रकचर</li>
                    </ol>
                </div>
                <h4 class="page-title">स्ट्रकचर</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">स्ट्रकचर सूची</h4>
                        @can('physicalStructureType_create')
                            <a href="{{route('admin.revenue.setting.physicalStructureType.create')}}"
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
                                <th>स्ट्रकचर</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($physicalStructureTypes as $physicalStructureType)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$physicalStructureType->title}}</td>
                                    <td>
                                        @can('physicalStructureType_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.revenue.setting.physicalStructureType.edit',[$physicalStructureType])}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('physicalStructureType_delete')
                                            <form
                                                action="{{route('admin.revenue.setting.physicalStructureType.destroy',[$physicalStructureType])}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}">
                                                    <i class="fa fa-trash"></i> मेटाउनु होस्
                                                </button>
                                            </form>
                                        @endcan
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
