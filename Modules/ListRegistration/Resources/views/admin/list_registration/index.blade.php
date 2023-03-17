@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.listRegistrations.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
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
            @error('file')
            <div class="alert alert-danger">{{$message}}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">सेवाहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                            @can('listRegistration_create')
                                <a href="{{route('admin.listRegistrations.listRegistration.create')}}"
                                   class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                    <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>दर्ता नम्बर</th>
                                <th>मुख्य व्यक्तिको नाम</th>
                                <th>फोन नम्बर</th>
                                <th>निबेदन मिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($listRegistrations as $listRegistration)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$listRegistration->registration_no}}</td>
                                    <td>{{$listRegistration->main_person}}</td>
                                    <td>{{$listRegistration->mobile_no}}</td>
                                    <td>{{$listRegistration->date}}</td>
                                    <td>
                                        @can('listRegistration_access')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.listRegistrations.listRegistration.show', $listRegistration)}}"
                                               title="थप हेर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin'?'confirm_pin':'')}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('listRegistration_edit')
                                            <a data-bs-type="edit"
                                               href="{{route('admin.listRegistrations.listRegistration.edit',$listRegistration)}}"
                                               title="सम्पादन गर्नुहोस्"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin': ''}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan
                                        @can('listRegistration_edit')
                                            <a type="button" class="btn btn-xs btn-outline-info" data-bs-toggle="modal"
                                               data-bs-target="#staticBackdropListRegistration">
                                                <i class="fa fa-file"></i>
                                            </a>
                                        @endcan
                                        @include('listregistration::admin.list_registration.inc.file')

                                        @can('listRegistration_delete')
                                            <form
                                                action="{{route('admin.listRegistrations.listRegistration.destroy',$listRegistration)}}"
                                                method="post">
                                                @csrf
                                                @method('delete')
                                                <button data-bs-type="delete"
                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin'?'confirm_pin':'show_confirm')}}"
                                                        title="मेटाउनु होस्">
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
                    <div class="mt-2">
                        {{ $listRegistrations->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
