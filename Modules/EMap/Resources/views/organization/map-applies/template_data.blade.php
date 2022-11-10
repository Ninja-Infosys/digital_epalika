@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0"> सम्पादन</h3>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('organization.admin.storeTemplateData',[$mapApply,$noticeTypeEnum])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="data">डाटा *</label>
                            <textarea name="data" id="data" cols="30" rows="10"
                                      class="form-control ckEditor @error('data') is-invalid @enderror">{{old('data',($mapApply->applyMapNotices->first()?->data ?? $mapApply->getSpecificTemplateData($noticeTypeEnum) ?? ''))}}</textarea>
                            @error('data')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="files">फ़ाइल</label>
                            <input type="file" class="form-control" id="files"
                                   name="files[]" multiple>
                            @error('files')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            @error('files*')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-4 d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary    ">
                                Save
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    @push('style')
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/editor.css')}}">
        <link rel="stylesheet" href="{{asset('assets/backend/editor/ckEditor/css/neo.css')}}">
    @endpush
    @push('scripts')
        <script src="{{asset('assets/backend/editor/ckEditor/js/ckeditor.js')}}"></script>
        <script src="{{asset('assets/backend/editor/ckEditor/js/editor.js')}}"></script>
    @endpush

@endsection
