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
                            <a href="{{route('admin.units.measurementUnit.index')}}">मापन एकाइ</a>
                        </li>
                        <li class="breadcrumb-item active">मापन एकाइ</li>
                    </ol>
                </div>
                <h4 class="page-title">मापन एकाइ</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> मापन एकाइ विविधता सूची</h4>
                        @can('user_create')
                            <a href="{{route('admin.units.measurementUnit.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ मापन एकाइ विविधता थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>प्रकार</th>
                                <th>मापन एकाइ विविधता</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($types as $type)
                                <tr>
                                    <td rowspan="{{$type->measurement_unit_count}}">
                                        {{$type->title ?? ''}}
                                    </td>
                                    <td>
                                        {{$type->measurementUnit->first()->title ?? ''}}
                                    </td>

                                    <td>
                                        @can('MeasurementUnit_edit')
                                            <a href="{{route('admin.units.measurementUnit.edit',$type->measurementUnit->first())}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('MeasurementUnit_delete')
                                            <form
                                                action="{{route('admin.units.measurementUnit.destroy',$type->measurementUnit->first())}}"
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
                                @foreach($type->measurementUnit->skip(1) as $unit)
                                    <tr>
                                        <td>
                                            {{$unit->title ?? ''}}
                                        </td>

                                        <td>
                                            @can('MeasurementUnit_edit')
                                                <a href="{{route('admin.units.measurementUnit.edit',$unit)}}"
                                                   class="btn btn-xs btn-outline-primary">
                                                    <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                                </a>
                                            @endcan
                                            @can('MeasurementUnit_delete')
                                                <form
                                                    action="{{route('admin.units.measurementUnit.destroy',$unit)}}"
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
                                @endforeach

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
