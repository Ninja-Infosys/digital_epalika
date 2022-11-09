@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">कर चुक्ता सम्पादन</h3>
                        <a href="{{route('organization.admin.clients.client.index')}}" class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> कर चुक्ता सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('organization.admin.clients.taxClearance.update',$taxClearance)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-6">
                            <label class="form-label" for="year">बर्ष *</label>
                            <input type="text" class="form-control @error('year') is-invalid @enderror" id="year"
                                   name="year" value="{{old('year',$taxClearance->year)}}"
                                   placeholder="बर्ष">
                            @error('year')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-6">
                            <label class="form-label" for="document">फाईल</label>
                            <input type="file" class="form-control @error('document') is-invalid @enderror" id="document"
                                   name="document" >
                            @error('document')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-4 d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary    ">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
