@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('emap.admin.dashboard') }}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">{{$mapApply->unique_id}}</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$mapApply->houseOwner?->name}}</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">{{$mapApply->unique_id}}</h4>
                        @if(empty($mapApply->registration_no))
                            <span>
                            <a href="{{route('emap.admin.mapApply.register-map', $mapApply)}}" class="btn btn-success">
                                नक्सा दर्ता गर्नुहोस
                            </a>
                        </span>
                        @endif
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
{{--                                {{dd(in_array(auth()->id(),$form->group?->users?->pluck('id')?->toArray() ?? []))}}--}}
                                <tr>
                                    <td>{{ get_nepali_number($loop->iteration) }}</td>
                                    <td>{{ $form->title }}</td>
                                    <td>
                                        {{$form->need_from?->label()??''}}
                                        {{--                                        {{$mapApply->getCheckFormFilledAttribute($form->formDataTypes->pluck('original_type')->toArray())}}--}}
                                    </td>
                                    <td>
                                        @if ($form->need_from->value == \Modules\EMap\Enums\EMapFormFillerTypeEnum::OFFICE->value && in_array(auth()->id(),$form->group?->users?->pluck('id')?->toArray() ?? []))
                                            <a href="{{ route('emap.admin.mapApply.admin-step.fill-detail', [$mapApply, $form]) }}"
                                               class="btn btn-xs btn-outline-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('emap.admin.mapApply.admin-step.view-detail', [$mapApply, $form]) }}"
                                               class="btn btn-xs btn-outline-success">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endif
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
