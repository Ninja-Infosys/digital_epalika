@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">सरकारी असक्षमता प्रकार</li>
                        <li class="breadcrumb-item active">सरकारी असक्षमता प्रकार</li>
                    </ol>
                </div>
                <h4 class="page-title">सरकारी असक्षमता प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सरकारी असक्षमता प्रकार सूची</h4>
                        <a href="{{route('identity.admin.setting.governmentalDisabilityType.create')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus-circle"></i> नयाँ थप्नुहोस्
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-0 table-striped table-hover mt-3">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">शिर्षक</th>
                            <th scope="col">कोड रंग</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
{{--                        @forelse($disabilityTypes as $disabilityType)--}}
{{--                            <tr>--}}
{{--                                <td>{{$loop->iteration}}</td>--}}
{{--                                <td>{{$disabilityType->title ?? ''}}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('identity.admin.setting.disabilityType.edit', $disabilityType)}}"--}}
{{--                                       type="button" class="btn btn-xs btn-outline-primary">--}}
{{--                                        <i class="fa fa-edit"></i>--}}
{{--                                    </a>--}}
{{--                                    <form action="{{route('identity.admin.setting.disabilityType.destroy',$disabilityType)}}"--}}
{{--                                          method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button class="btn btn-xs btn-outline-danger show_confirm" title="मेटाउनु होस्">--}}
{{--                                            <i class="fa fa-trash"></i>--}}
{{--                                        </button>--}}
{{--                                    </form>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                        @endforelse--}}
                        </tbody>
                    </table>
                </div>
                <div class="mt-2">
{{--                    {{ $governmentalDisabilityType->onEachSide(config('app.pagination_count'))->links() }}--}}
                </div>
            </div>
        </div>
    </div>
@endsection

