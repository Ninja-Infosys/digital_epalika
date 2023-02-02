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
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.businessRegistration.businessRegistration.index')}}">व्यवसाय
                                दर्ता </a>
                        </li>
                        <li class="breadcrumb-item active">व्यवसाय दर्ता</li>
                    </ol>
                </div>
                <h4 class="page-title">व्यवसाय दर्ता </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय दर्ता सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        @includeIf('inc.filter_form')
                        <table class="table table-bordered table-sm mb-2 table-striped table-hover text-center mt-3">
                            <thead>
                            <tr>
                                <th rowspan="2">क्र.स</th>
                                <th rowspan="2">सबमिशन नं</th>
                                <th rowspan="2">दर्ता नं</th>
                                <th rowspan="2">दर्ता मिति</th>
                                <th colspan="4">व्यवसायी</th>
                                <th colspan="4">व्यवसाय</th>
                                <th rowspan="2">#</th>
                            </tr>
                            <tr>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>फोन</th>
                                <th>इमेल</th>
                                <th>नाम</th>
                                <th>ठेगाना</th>
                                <th>प्रकृति</th>
                                <th>पूँजी लगानी रु.:</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businessDetails as $businessDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$businessDetail->submission_no ?? ''}}</td>
                                    <td>{{$businessDetail->registration_no ?? ''}}</td>
                                    <td>{{$businessDetail->registration_date_ne ?? ''}}</td>
                                    <td>{{$businessDetail->partners->first()?->name ??''}}</td>
                                    <td>
                                        <span>{{$businessDetail->partners->first()?->localBody->local_body??''}}
                                - {{$businessDetail->partners->first()?->ward_no??''}} </span>
                                    </td>
                                    <td>{{$businessDetail->partners->first()?->phone ?? ''}}</td>
                                    <td>{{$businessDetail->partners->first()?->email ??  ''}}</td>
                                    <td>{{$businessDetail->name ?? ''}}</td>
                                    <td>
                                        <span>{{$businessDetail->localBody->local_body??''}}
                                - {{$businessDetail->ward_no??''}} </span>
                                    </td>
                                    <td>{{$businessDetail->businessNature->title ?? ''}}</td>
                                    <td>{{$businessDetail->investment ?? ''}}</td>
                                    <td>
                                        @can('businessRegistration_access')
                                            <a href="{{route('admin.businessRegistration.businessRegistration.show',$businessDetail)}}"
                                               class="btn btn-xs btn-outline-info" title="पुरा विवरण हेर्नुहोस">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endcan
                                        @can('businessRegistration_access')
                                            <a href="javascript:void(0)" title="प्रिन्ट गर्नुहोस"
                                               route_action="{{route('admin.businessRegistration.businessRegistration.print',$businessDetail)}}"
                                               class="btn btn-xs btn-outline-warning printDetail">
                                                <i class="fa fa-print"></i>
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="13">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{$businessDetails->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(".printDetail").on("click", function (e) {
                $.ajax({
                    method: "GET",
                    url: $(this).attr("route_action"),
                    success: function (resp) {
                        var print_area = window.open();
                        print_area.document.write(resp.view);
                        print_area.document.close();
                        print_area.focus();
                        print_area.print();
                        print_area.close();
                    }, error: function () {
                        alert("Something Went Wrong");
                    }
                });
            });
        </script>
    @endpush
@endsection

