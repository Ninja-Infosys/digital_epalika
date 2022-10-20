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
                            <a href="#">डिजिटल ई-पालिका</a>
                        </li>
                    </ol>
                </div>
                <h4 class="page-title">प्राविधिक मद्दत</h4>
            </div>
        </div>
    </div>

@endsection
