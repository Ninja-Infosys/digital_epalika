@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                               <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                            गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">अपाङ्गता परिचय पत्र</li>
                        <li class="breadcrumb-item active">पूर्ण विवरण</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपाङ्गता परिचय पत्र</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">अपाङ्गता परिचय पत्रहरु</h4>
                        <div class="d-flex flex-wrap align-items-center">
                            @includeIf('inc.filter_form')
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>फोटो</th>
                                <th>नाम</th>
                                <th>लिङ्ग</th>
                                <th>नागरिकता नं./जन्मदर्ता नं.</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($disabilityIdentityCards as $disabilityIdentityCard)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                        <img src="{{$disabilityIdentityCard->photo_url}}" height="60" alt="{{$disabilityIdentityCard->name}}">
                                    </td>
                                    <td>{{$disabilityIdentityCard->name}}</td>
                                    <td>{{$disabilityIdentityCard->gender->label()??''}}</td>
                                    <td>
                                        {{ $disabilityIdentityCard->citizenship_no? $disabilityIdentityCard->citizenship_no."(नागरिकता)" : $disabilityIdentityCard->birth_registration_no ."(जन्म दर्ता)" }}
                                    </td>
                                    <td>
                                        @if($disabilityIdentityCard->can_edit_delete)
                                            <a href="{{route('identity.admin.disabilityFullDetail.show',$disabilityIdentityCard)}}"
                                               class="btn btn-xs btn-outline-primary" title="विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a data-bs-type="edit" href="{{route('identity.admin.disabilityFullDetail.edit',$disabilityIdentityCard)}}"
                                               class="btn btn-xs btn-outline-primary {{get_setting('Pin')?'confirm_pin':''}}" title="सम्पादन गर्नुहोस्">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                            {{--                                            <a href="javascript:void(0)"  route_action="{{route('identity.admin.disabilityIdentityCard.print',$disabilityIdentityCard)}}" class="btn btn-xs btn-outline-warning printDetail">--}}
                                            {{--                                                <i class="fa fa-print"></i>--}}

                                            {{--                                            </a>--}}
                                        @endif

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2">
                        {{ $disabilityIdentityCards->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
