@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा विवरण</h3>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">सब्मिसन आइडी</th>
                            <th scope="col">घर धनीको नाम</th>
                            <th scope="col">घर धनीको फोन नं.</th>
                            <th scope="col">निर्माण कार्यको किसिम</th>
                            <th scope="col">#</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($mapApplies as $mapApply)
                            <tr>
                                <td>{{$loop->iteration ?? ''}}</td>
                                <td>{{$mapApply->unique_id ?? ''}}</td>
                                <td>{{$mapApply->houseOwner->name??''}}</td>
                                <td>{{$mapApply->houseOwner->phone??''}}</td>
                                <td>{{$mapApply->construction_type->label()}}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{route('organization.admin.mapApply.show', $mapApply)}}">
                                        <i class="fa fa-pen"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{route('organization.admin.updateStatus', $mapApply)}}">
                                        <i class="fa {{$mapApply->sent_to_admin_at==null ? 'fa-check':'fa-times'}}"></i>
                                    </a>
                                    <a class="btn btn-sm btn-info" href="{{route('organization.admin.mapFormInfo', $mapApply)}}">
                                        <i class="fa fa-list"></i>
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
