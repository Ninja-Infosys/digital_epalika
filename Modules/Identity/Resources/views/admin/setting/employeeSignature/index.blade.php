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
                        <li class="breadcrumb-item">प्रसाशक</li>
                        <li class="breadcrumb-item active">प्रसाशक</li>
                    </ol>
                </div>
                <h4 class="page-title">प्रसाशक </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">प्रसाशाक सूची</h4>
                        @can('relationship_create')
                            <a href="{{route('identity.admin.setting.employeeSignature.create')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                            </a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-0 table-striped table-hover mt-3">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">नाम</th>
                            <th scope="col">पद</th>
                            <th scope="col">रातो हस्ताक्षर</th>
                            <th scope="col">कालो हस्ताक्षर</th>
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

                                    <a href="{{route('identity.admin.setting.employeeSignature.edit', $employeeSignature)}}"
                                       type="button" class="btn btn-xs btn-outline-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <form
                                        action="{{route('identity.admin.setting.employeeSignature.destroy',$employeeSignature)}}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-xs btn-outline-danger show_confirm"
                                                title="मेटाउनु होस्">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
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

