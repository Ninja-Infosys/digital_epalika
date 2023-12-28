@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item ">नक्सा</li>
                        <li class="breadcrumb-item active">नक्सा दर्ता तथा दस्तुर</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्सा दर्ता तथा दस्तुर </h4>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h4 class="header-title mb-0"> नक्सा दर्ता तथा दस्तुर </h4>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-sm table-bordered">
                <thead>
                    <tr>
                        <th scope="col">मिति</th>
                        <th scope="col">रसिद नं</th>
                        <th scope="col">रकम</th>
                        <th scope="col">रकम बुझनेको नाम</th>
                        <th scope="col">कैफियत</th>
                        <th scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $mapApply->mapRegistration->nepali_date ?? '' }}</td>
                        <td>{{ $mapApply->mapRegistration->receipt_no ?? '' }}</td>
                        <td>रु. {{ $mapApply->mapRegistration->amount ?? 0 }}</td>
                        <td>{{ $mapApply->mapRegistration->recipient ?? '' }}</td>
                        <td>{{ $mapApply->mapRegistration->remarks ?? '' }}</td>
                        <td><a href="{{ route('emap.admin.mapApply.mapRegistration.create', $mapApply) }}" type="button"
                                class="btn btn-outline-info btn-sm {{ get_setting('Pin') ? 'confirm_pin' : '' }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
