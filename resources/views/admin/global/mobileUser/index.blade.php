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
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.global.dashboard') }}">सेटिङ</a>
                        </li>
                        <li class="breadcrumb-item active">सेवाग्राहीहरु</li>
                    </ol>
                </div>
                <h4 class="page-title">सेवाग्राहीहरुको विवरण </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header search-card">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title"> सेवाग्राहीहरु</h4>

                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="table-responsive">
                        <table class="table table-sm table-custom">
                            <thead>
                                <tr>
                                    <th>क्र.स</th>
                                    <th>नाम </th>
                                    <th>ईमेल</th>
                                    <th>फोन नं </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mobileUsers as $mobileUser)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $mobileUser->name }}</td>
                                        <td>{{ $mobileUser->email }}</td>
                                        <td>{{ $mobileUser->phone }}</td>


                                    </tr>
                                    <tr class="empty">
                                        <td></td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="4">सेवाग्राहीमा कुनै डाटा
                                            उपलब्ध छैन !!!</td>
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

