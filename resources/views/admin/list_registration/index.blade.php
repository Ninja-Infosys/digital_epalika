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
                            <a href="{{route('admin.listRegistrations.listRegistration.index')}}">सुची दर्ता प्रणालि</a>
                        </li>
                        <li class="breadcrumb-item active">मौजुदा सुची दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">मौजुदा सुची दर्ता</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">मौजुदा सुची दर्ताहरु</h4>
                        @can('executiveCommittee_create')
                            <a href="{{route('admin.listRegistrations.listRegistration.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>मुख्य व्यक्तिको  नाम</th>
                                <th>फोन नम्बर </th>
                                <th>निबेदन मिति </th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($listRegistrations as $listRegistration)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$listRegistration->main_person}}</td>
                                    <td>{{$listRegistration->mobile_no}}</td>
                                    <td>{{$listRegistration->date ? $listRegistration->date->toDateString() : ''}}</td>

                                    <td>
                                        @can('executiveCommittee_edit')
                                            <a href="{{route('admin.listRegistrations.listRegistration.edit',$listRegistration)}}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i> सम्पादन गर्नुहोस्
                                            </a>
                                        @endcan
                                        @can('executiveCommittee_delete')
                                            <form action="{{route('admin.listRegistrations.listRegistration.destroy',$listRegistration)}}"
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
