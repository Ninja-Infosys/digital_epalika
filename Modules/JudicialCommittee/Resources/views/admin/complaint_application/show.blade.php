@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">निवेदन फारम</li>
                    </ol>
                </div>
                <h4 class="page-title">निवेदन फारम</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">उजुरी फारम विवरण</h4>
                        <div class="d-flex justify-content-between">
                            <a href="{{route('admin.judicialCommittee.complaintApplication.index')}}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="fa fa-list"></i> निवेदन फारम सूची
                            </a>
                            <a href="{{route('admin.judicialCommittee.complaintApplication.judicialReceiptBill.create',$complaintApplication)}}"
                               class="btn btn-sm btn-outline-primary mx-1">
                                @if(!$complaintApplication->judicialReceiptBill)
                                    <i class="fa fa-plus-circle"> भुक्तानी गर्नुहोस्</i>
                                @else
                                    <i class="fa fa-edit"> भुक्तानी सम्पादन गर्नुहोस्</i>
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>सबमिशन नं.</th>
                                <td>{{$complaintApplication->submission_no}}</td>
                            </tr>
                            <tr>
                                <th>दर्ता नं.</th>
                                <td>{{$complaintApplication->registration_no}}</td>
                            </tr>
                            <tr>
                                <th>निवेदकको पुरा नाम</th>
                                <td>{{$complaintApplication->complainant_name}}</td>
                            </tr>
                            <tr>
                                <th>प्रतिवादीको पुरा नाम</th>
                                <td>{{$complaintApplication->defendant_name}}</td>
                            </tr>
                            <tr>
                                <th>मिति</th>
                                <td>{{$complaintApplication->date}}</td>
                            </tr>
                            <tr>
                                <th>विषय</th>
                                <td>{{$complaintApplication->subject}}</td>
                            </tr>
                            <tr>
                                <th>मुद्दा प्रकृति</th>
                                <td>
                                    {{$complaintApplication->lawsuitNature->title??''}}
                                    ({{$complaintApplication->lawsuitNature->code??''}})
                                </td>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">सम्बन्धित सदस्यहरू</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स.</th>
                                <th>नाम</th>
                                <th>फोन</th>
                                <th>इमेल</th>
                                <th>पद</th>
                                <th>ठेगाना</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($complaintApplication->relatedMembers as $key=>$member)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$member->name}}</td>
                                    <td>{{$member->phone}}</td>
                                    <td>{{$member->email}}</td>
                                    <td>{{$member->designation}}</td>
                                    <td>{{$member->address}}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="6">
                                        विवरण थप्न प्लस बटन क्लिक गर्नुहोस्
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        @error('form.relatedMembers')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
