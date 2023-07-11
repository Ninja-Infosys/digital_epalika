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
                        <li class="breadcrumb-item">प्रिन्ट परिचय पत्र</li>
                        <li class="breadcrumb-item active">प्रिन्ट परिचय पत्र</li>
                    </ol>
                </div>
                <h4 class="page-title"> प्रिन्ट परिचय पत्र </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
                        @foreach($governmentalDisabilityTypes as $key =>$data)
                            <li class="nav-item" role="presentation">
                                <a href="#home-b2{{$loop->iteration}}" data-bs-toggle="tab" aria-expanded="false"
                                   class="nav-link {{$loop->first ? 'active':''}}" aria-selected="true" role="tab">
                                    {{$key}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        @foreach($governmentalDisabilityTypes as $key =>$data)
                            <div class="tab-pane {{$loop->first ? 'active show':''}}" id="home-b2{{$loop->iteration}}"
                                 role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>क्र.स</th>
                                            <th> फोटो</th>
                                            <th>नाम</th>
                                            <th>लिङ्ग</th>
                                            <th>नागरिकता नं.</th>
                                            <th>#</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $disabilityType)
                                            @foreach($disabilityType['disabilityIdentityCards'] as $disabilityIdentityCard)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        <img src="{{$disabilityIdentityCard['photo_url']}}"
                                                             alt="{{$disabilityIdentityCard['name']}}" height="60">
                                                    </td>
                                                    <td>{{$disabilityIdentityCard['name']}}</td>
                                                    <td>{{$disabilityIdentityCard['gender']?->label() ??''}}</td>
                                                    <td>{{$disabilityIdentityCard['citizenship_no']}}</td>
                                                    <td>
                                                        <a href="{{route('identity.admin.disabilityIdentityCard.printCard',$disabilityIdentityCard['id'])}}">
                                                            <i class="fa fa-print"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>

@endsection
