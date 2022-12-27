@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.judicialCommittee.dashboard') }}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>

                        <li class="breadcrumb-item active">दर्ता भएका उजुरी</li>
                    </ol>
                </div>
                <h4 class="page-title">दर्ता भएका उजुरी</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">दर्ता भएका उजुरी</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>दर्ता नं.</th>
                                    <th>निवेदकको पुरा नाम</th>
                                    <th>प्रतिवादीको पुरा नाम</th>
                                    <th>मिति</th>
                                    <th>विषय</th>
                                    <th>मुद्दा प्रकृति</th>
                                    <th>तारिख पर्चा</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($complaintApplications as $complaintApplication)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $complaintApplication->registration_no }}</td>
                                        <td>{{ $complaintApplication->complainant_name }}</td>
                                        <td>{{ $complaintApplication->defendant_name }}</td>
                                        <td>{{ $complaintApplication->date }}</td>
                                        <td>{{ $complaintApplication->subject }}</td>
                                        <td>
                                            {{ $complaintApplication->lawsuitNature->title ?? '' }}
                                        </td>
                                        <td>
                                            @can('dateSheet_access')
                                                <a href="{{ route('admin.judicialCommittee.complaintApplication.dateSheet.index', $complaintApplication) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="fa fa-calendar-alt"> तारिख पर्चा </i>
                                                </a>
                                            @endcan
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
