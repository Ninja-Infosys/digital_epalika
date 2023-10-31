@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.dashboard')}}">
                               <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">सेटिङ</li>
                        <li class="breadcrumb-item active">हस्ताक्षर गर्ने व्यक्ति</li>
                    </ol>
                </div>
                <h4 class="page-title">हस्ताक्षर गर्ने व्यक्ति </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">हस्ताक्षर गर्ने व्यक्तिहरु</h4>
                        @can('employeeSignature_create')
                            <a href="{{route('identity.admin.setting.employeeSignature.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">नाम</th>
                            <th scope="col">पद</th>
                            <th scope="col">रातो हस्ताक्षर</th>
                            <th scope="col">कालो हस्ताक्षर</th>
                            <th scope="col">स्थिति</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($employeeSignatures as $employeeSignature)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$employeeSignature->name ?? ''}}</td>
                                <td>{{$employeeSignature->designation ?? ''}}</td>
                                <td>
                                    <img src="{{$employeeSignature->red_signature}}" alt="{{$employeeSignature->name}}"
                                         height="60">
                                </td>
                                <td>
                                    <img src="{{$employeeSignature->black_signature}}"
                                         alt="{{$employeeSignature->name}}" height="60">
                                </td>
                                <td>
                                    <form
                                        action="{{route('identity.admin.setting.employeeSignature.updateStatus',$employeeSignature)}}"
                                        method="post">
                                        @csrf
                                        @method('put')
                                        <button
                                            class="btn btn-xs btn-outline-{{$employeeSignature->status==1 ? 'primary':'danger'}}"
                                        >
                                            <i class="fa {{$employeeSignature->status==1 ? 'fa-check':'fa-times'}}"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @can('employeeSignature_edit')
                                        <a data-bs-type="edit" href="{{route('identity.admin.setting.employeeSignature.edit', $employeeSignature)}}"
                                           type="button" class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('employeeSignature_delete')
                                        <form
                                            action="{{route('identity.admin.setting.employeeSignature.destroy',$employeeSignature)}}"
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
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
                    {{ $employeeSignatures->onEachSide(config('app.pagination_count'))->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

