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
                            <a href="{{route('admin.digitalBoard.notice.index',$type)}}">{{$type==='Notice' ?'सूचना':'समाचार'}} </a>
                        </li>
                        <li class="breadcrumb-item active">नयाँ {{$type==='Notice' ?'सूचना':'समाचार'}}  थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">{{$type==='Notice' ?'सूचना':'समाचार'}}  </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">{{$type==='Notice' ?'सूचना':'समाचार'}}  थप्नुहोस्</h4>
                        <a href="{{route('admin.digitalBoard.notice.index',$type)}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> {{$type==='Notice' ?'सूचना':'समाचार'}} सूची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.digitalBoard.notice.store',$type)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong> विवरण </strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="title" class="form-label">शिर्षक *</label>
                                    <input
                                        type="text"
                                        name="title"
                                        value="{{old('title')}}"
                                        class="form-control @error('title') is-invalid @enderror"
                                        id="title"
                                        placeholder="शिर्षक "
                                    />
                                    @error('title')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="date" class="form-label">मिति *</label>
                                    <input
                                        type="text"
                                        name="date"
                                        value="{{old('date')}}"
                                        class="form-control nepali_date @error('date') is-invalid @enderror"
                                        id="date"
                                        placeholder=" मिति"
                                    />
                                    @error('date')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-2">
                                    <label for="description" class="form-label">बिवरण </label>
                                    <textarea name="description" id="description" placeholder="बिवरण"  class="form-control" cols="30" rows="5">{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-2">
                                    <label for="files" class="form-label">फाईल </label>
                                    <input
                                        type="file"
                                        name="files[]"
                                        class="form-control @error('files') is-invalid @enderror"
                                        id="files"

                                   multiple />
                                    @error('files')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('files.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".nepali_date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    ndpYear: true
                });
            });
        </script>
    @endpush
@endsection
