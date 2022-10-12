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
                        <li class="breadcrumb-item active">संगठन</li>
                    </ol>
                </div>
                <h4 class="page-title">नक्सा </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नक्सा सूची</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-sm mb-0 table-striped table-hover">
                            <thead>
                            <tr>
                                <th scope="col">क्र.सं.</th>
                                <th scope="col">आर्थिक वर्ष</th>
                                <th scope="col">दर्ता नं</th>
                                <th scope="col">युनिक आइडी</th>
                                <th scope="col">निर्माण कार्यको किसिम</th>
                                <th scope="col">#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($maps as $mapApply)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$mapApply->fiscalYear->title ?? ''}}</td>
                                    <td>{{$mapApply->registration_no ?? ''}}</td>
                                    <td>{{$mapApply->unique_id ?? ''}}</td>
                                    <td>{{$mapApply->construction_type->label() ?? ''}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="#"
                                               type="button" class="btn btn-info btn-sm text-white">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-primary btn-sm dropdown-toggle dropdown-toggle-split text-white"
                                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                <span class="visually-hidden">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu"
                                                 style="position: absolute; inset: 0 auto auto 0; margin: 0; transform: translate(76px, 40px);"
                                                 data-popper-placement="bottom-start">
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

