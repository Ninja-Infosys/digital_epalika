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
                    <div class="">
                        @includeIf('inc.filter_form')
                        <table class="table table-sm mb-0 mt-3 table-bordered">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>दर्ता नं.</th>
                                    <th>निवेदकको पुरा नाम</th>
                                    <th>प्रतिवादीको पुरा नाम</th>
                                    <th>मिति</th>
                                    <th>विषय</th>
                                    <th>मुद्दा प्रकृति</th>
                                    <th class="text-center">#</th>
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
                                        <td width="180" class="text-center">
                                            <div class="dropdown">
                                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton{{ $loop->iteration }}" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    -- छान्नुहोस् -- <i class="fa fa-angle-down"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton{{ $loop->iteration }}">
                                                    @can('judicialReceiptBill_access')
                                                        <a href="{{ route('admin.judicialCommittee.complaintApplication.judicialReceiptBill.index', $complaintApplication) }}" class="dropdown-item">
                                                            <i class="fa fa-cash-register"> निस्सा सनाखत  </i>
                                                        </a>
                                                    @endcan
                                                    @can('dateSheet_access')
                                                        <a href="{{ route('admin.judicialCommittee.complaintApplication.dateSheet.index', $complaintApplication) }}" class="dropdown-item">
                                                            <i class="fa fa-calendar-alt"> तारिख पर्चा </i>
                                                        </a>
                                                    @endcan
                                                    @can('defendantIssuedDeadline_access')
                                                        <a href="{{ route('admin.judicialCommittee.complaintApplication.defendantIssuedDeadline.index', $complaintApplication) }}" class="dropdown-item">
                                                            <i class="fa fa-calendar-alt"> प्रतिवादी म्याद जारी  </i>
                                                        </a>
                                                    @endcan
                                                    @can('dateCompensation_access')
                                                        <a href="{{ route('admin.judicialCommittee.complaintApplication.dateCompensation.index', $complaintApplication) }}" class="dropdown-item">
                                                            <i class="fa fa-calendar-alt"> तारिख भरपाई </i>
                                                        </a>
                                                    @endcan
                                                    @can('writtenAnswer_access')
                                                        <a href="{{ route('admin.judicialCommittee.complaintApplication.writtenAnswer.index', $complaintApplication) }}" class="dropdown-item">
                                                            <i class="fa fa-calendar-alt"> लिखित जवाफ </i>
                                                        </a>
                                                    @endcan
                                                </div>
                                            </div>

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
                    <div class="mt-2">
                        {{ $complaintApplications->onEachSide(config('app.pagination_count'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
