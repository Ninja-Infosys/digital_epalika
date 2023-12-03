@extends('emap::organization.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('organization.admin.dashboard') }}">
                                <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}"
                                     alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$mapApply->unique_id}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$mapApply->unique_id}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0"></h4>

                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>स्थिति</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($forms as $form)
                                <tr>
                                    <td>{{ get_nepali_number($loop->iteration) }}</td>
                                    <td>{{ $form->title }}</td>
                                    <td>
                                        {{--                                        {{$mapApply->getCheckFormFilledAttribute($form->formDataTypes->pluck('original_type')->toArray())}}--}}
                                    </td>
                                    <td class="d-flex">

                                        @if ($form->need_from !== \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE)
                                            <a href="{{ route('organization.admin.formDetail', [$mapApply, $form]) }}"
                                               class="btn me-1 btn-xs btn-outline-primary {{$form->order == $order ? '' : 'disabled'}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endif

                                        <a href="{{ route('organization.admin.organization.view-detail', [$mapApply, $form]) }}"
                                           class="btn me-1 btn-xs btn-outline-primary">
                                            <i class="fa fa-eye"></i>
                                        </a>
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
