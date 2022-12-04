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
                            <a href=""> व्यवसाय प्रकृति अनुसार रिपोर्ट </a>
                        </li>
                        <li class="breadcrumb-item active"> व्यवसाय दर्ता रिपोर्ट</li>
                    </ol>
                </div>
                <h4 class="page-title"> व्यवसाय दर्ता रिपोर्ट </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">व्यवसाय दर्ता रिपोर्ट</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.businessRegistration.report.dateWise')}}">
                        <div class="row">
                            <div class="col-md-3 mb-2">
                                <label for="from_date">देखि</label>
                                <input
                                    type="text"
                                    name="from_date"
                                    value="{{old('from_date')}}"
                                    class="form-control nepali_date @error('from_date') is-invalid @enderror"
                                    id="from_date"
                                    placeholder="देखि "
                                />
                                @error('from_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-3 mb-2">
                                <label for="to_date">सम्म</label>
                                <input
                                    type="text"
                                    name="to_date"
                                    value="{{old('to_date')}}"
                                    class="form-control nepali_date @error('to_date') is-invalid @enderror"
                                    id="to_date"
                                    placeholder="सम्म "
                                />
                                @error('to_date')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> व्यवसाय दर्ता रिपोर्ट</h4>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fa fa-print"></i>
                            Print</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>नाम</th>
                                <th>दर्ता नं</th>
                                <th>दर्ता मिति.</th>
                                <th>व्यवसाय ठेगाना</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($businessDetails as $businessDetail)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$businessDetail->proprietorDetail->name??''}}</td>
                                    <td>{{$businessDetail->registration_no??''}}</td>
                                    <td>{{$businessDetail->registration_date_en}}</td>
                                    <td><span>{{$businessDetail->localBody->local_body??''}}
                                - {{$businessDetail->ward_no??''}} </span></td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="4">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                    $(".nepali_date").nepaliDatePicker({
                        ndpYear: true,
                        ndpMonth: true,
                    });
                });
            </script>
        @endpush
    @endonce
@endsection


