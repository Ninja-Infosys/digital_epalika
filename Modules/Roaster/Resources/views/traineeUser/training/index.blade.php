@extends('roaster::traineeUser.layouts.master')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.roaster.dashboard')}}">
                           <img class="icon me-1" src="{{asset('assets/backend/images/home.svg')}}" alt="document-icon">
                    गृहपृष्ठ
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('admin.roaster.training.index')}}">तालिम</a>
                    </li>
                    <li class="breadcrumb-item">
                        तालिम विवरण
                    </li>
                </ol>
            </div>
            <h4 class="page-title">तालिम विवरण</h4>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header text-dark d-flex justify-content-between">
        <h5>तालिमको विवरण</h5>

    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>क्र.सं</th>
                    <th>तालिमको नाम</th>
                    <th>खोलिएको मिति</th>
                    <th>बन्द हुने मिति</th>
                    <th>फारमको स्थिति</th>
                    <th class="text-center"> कार्य</th>
                </tr>
                </thead>
                <tbody>
                @forelse($trainings as $training)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$training->name}}</td>
                        <td>{{$training->open_date}}</td>
                        <td>{{$training->closed_date}}</td>
                       <td></td>
                       <td></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Data not found !!!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
