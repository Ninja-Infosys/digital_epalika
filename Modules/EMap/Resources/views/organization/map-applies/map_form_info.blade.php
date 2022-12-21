@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="main-title">
                        निबेदन/प्रतिबेदनको स्थिति
                    </h4>
                    <a class="btn btn-sm btn-primary" href="{{route('organization.admin.mapApply.index')}}">
                        <i class="fa fa-list"> नक्सा विवरण</i>
                    </a>
                </div>
                <div class="card-body p-3">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">क्र.स.</th>
                            <th scope="col">निबेदन/प्रतिबेदनको किसिम</th>
                            <th>स्थिति</th>
                            <th>घरधनिको निबेदन को स्थिति</th>
                            <th>#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach(\Modules\EMap\Enums\NoticeTypeEnum::cases() as $noticeTypeEnum)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$noticeTypeEnum->label()}}</td>
                                <td class="text-center">
                                    @if($mapApply->applyMapNotices->where('file_type',$noticeTypeEnum)->count() >0)
                                        <i class="fas fa-check"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($fileTypes->contains($noticeTypeEnum) && $noticeTypeEnum->type() === \Modules\EMap\Enums\EMapFormFillerTypeEnum::HOUSE_OWNER)
                                        <a href="{{route('organization.admin.updateStatusOrganization',[$mapApply,$noticeTypeEnum->value])}}" class="mx-2 btn {{$mapApply->applyMapNotices->where('file_type',$noticeTypeEnum)?->first()->is_sent ? 'btn-primary':'btn-danger'}} btn-sm">
                                          <i class="fa {{$mapApply->applyMapNotices->where('file_type',$noticeTypeEnum)?->first()->is_sent ? 'fa-check':'fa-times'}}"></i>
                                        </a>
                                    @endif

                                </td>
                                <td class="text-center">
                                    @if($noticeTypeEnum->type() === \Modules\EMap\Enums\EMapFormFillerTypeEnum::CONSULTANT)
                                        <a href="{{route('organization.admin.getTemplateData',[$mapApply,$noticeTypeEnum->value])}}"
                                           class="btn btn-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                            <span>फार्म भर्नुहोस्</span>
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
@endsection
