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
                        <li class="breadcrumb-item"> निबेदन/प्रतिबेदनको स्थिति</li>
                        <li class="breadcrumb-item active"> निबेदन/प्रतिबेदनको स्थिति</li>
                    </ol>
                </div>
                <h4 class="page-title"> निबेदन/प्रतिबेदनको स्थिति </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> निबेदन/प्रतिबेदनको स्थिति सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-sm mb-0 table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">क्र.सं.</th>
                            <th scope="col">निबेदन/प्रतिबेदनको किसिम</th>
                            @foreach(\Modules\EMap\Enums\EMapFormFillerTypeEnum::cases() as $formFiller)
                            <th scope="col">{{$formFiller->label()??''}}</th>
                            @endforeach
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Modules\EMap\Enums\NoticeTypeEnum::cases() as $noticeTypeEnum)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$noticeTypeEnum->label() ?? ''}}</td>
                                @foreach(\Modules\EMap\Enums\EMapFormFillerTypeEnum::cases() as $formFillerData)
                                    <td>
                                        @if($noticeTypeEnum->type() === $formFillerData)
                                            @if($mapApply->applyMapNotices->pluck('file_type')->unique()->contains($noticeTypeEnum))
                                                <i class="fa fa-check"></i>
                                            @endif
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    <a href="{{route('emap.admin.map.mapApply.show', [$mapApply,'#'.\Illuminate\Support\Str::limit($noticeTypeEnum->value,10,'mmm')])}}"
                                       type="button" class="btn btn-info btn-sm text-white">
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
@endsection

