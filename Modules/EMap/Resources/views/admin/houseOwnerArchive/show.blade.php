@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">नयाँ घर धनीको विवरण</h4>
                <div class="mb-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('emap.admin.dashboard') }}">
                                <img class="icon me-1" src="http://127.0.0.1:8000/assets/backend/images/home.svg"
                                     alt="document-icon"> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('emap.admin.mapApply.admin-step.form-list',$mapApply) }}">
                                चरण
                            </a>

                        </li>
                        <li class="breadcrumb-item active">घर धनीको विवरण</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">नया घर धनीको विवरण</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>जग्गा धनीको नाम</th>
                                <th>फोन नं.</th>
                                <th>बुवाको नाम</th>
                                <th>हजुरबुबाको नाम</th>
                                <th>नागरिकता नम्बर</th>

                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>{{ $houseOwnerArchive->name??'' }}</td>
                                <td>{{ $houseOwnerArchive->phone??'' }}</td>
                                <td>{{ $houseOwnerArchive->father_name??''}}</td>
                                <td>{{ $houseOwnerArchive->grandfather_name ??''}}</td>
                                <td>{{ $houseOwnerArchive->citizenship_no ??''}}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>शिर्षक</th>
                                <th>फाईल</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($houseOwnerArchive->files as $file)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{ $file->file_name }}</td>
                                    <td>
                                        <iframe src="{{ $file->file_url }}" alt="{{$file->file_name}}"></iframe>
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
