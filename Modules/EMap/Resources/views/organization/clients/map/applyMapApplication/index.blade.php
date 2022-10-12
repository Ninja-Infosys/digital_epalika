@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">सेवाग्राही थप्नुहोस</h3>
                        <a href="" class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> सेवाग्राही सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('organization.admin.clients.applyMapApplication.apply-mapApplication',[$client,$mapApply])}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="file">फाईल *</label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
                                   name="file">
                            @error('file')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-4 d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
