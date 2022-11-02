@extends('backend.layouts.master')
@section('content')
    <div class="">
        <div class="page-title d-flex justify-content-between">
            <h5>बिभागहरु</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">ड्यासबोर्ड</a></li>
                    <li class="breadcrumb-item active" aria-current="page">बिभागहरुको विवरण</li>
                </ol>
            </nav>
        </div>
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between">
                <h6>बिभागहरुको विवरण</h6>
            </div>
            <form action="{{route('admin.setting.department.store')}}" method="post">
                <div class="card-body">
                    @csrf
                    <div class="col-md-12 col-sm-12 form-group">
                        <label for="title">बिभाग * </label>
                        <input id="title" type="text" name="title" placeholder="बिभाग"
                               class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                        @error('title')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
        </div>

        <div class="card">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>क्र.सं</th>
                            <th>बिभाग</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($departments as $departments)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$departments->title}}</td>
                                <td class="d-flex justify-center">
                                    <a href="{{route('admin.settings.department.edit', $departments)}}" type="button"
                                       class="btn btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form action="{{route('admin.settings.department.destroy', $departments)}}"
                                          method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="show_confirm btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3">Data not found !!!</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
