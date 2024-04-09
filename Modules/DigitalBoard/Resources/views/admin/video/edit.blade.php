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
                            <a href="{{ route('admin.digitalBoard.video.index') }}">डिजिटल बोर्ड</a>
                        </li>
                        <li class="breadcrumb-item active">भिडियो सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">भिडियो</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">भिडियो सम्पादन गर्नुहोस्</h4>
                        <a href="{{ route('admin.digitalBoard.video.index') }}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.digitalBoard.video.update', $video) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">भिडियो शिर्षक </label>
                                <input type="text" name="title" value="{{ old('title', $video->title) }}"
                                    class="form-control @error('title') is-invalid @enderror" id="title"
                                    placeholder="Video Title" required />
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="video" class="form-label">भिडियो (यूट्यूब लिंक) * </label>
                                <input type="text" name="video" id="video"  value="{{old('video', $video->video)}}"
                                       class="form-control @error('video') is-invalid @enderror">
                                @error('video')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="ward" class="form-label">वडा</label>
                                <select class="form-control @error('ward') is-invalid @enderror" name="ward[]"
                                id="ward" {{ !empty(auth()->user()->ward_no) ? 'disabled' : '' }} multiple>
                                <option value=""> वडा छान्नुहोस्</option>
                                @foreach (officeSetting()->localbody->ward_no as $ward)
                                    <option value="{{ $ward }}"
                                        {{ in_array($ward, old('ward', $video->ward)) ? 'selected' : '' }}>
                                        {{ $ward }}
                                    </option>
                                @endforeach
                            </select>
                                @error('ward')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                @error('ward.*')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <input type="checkbox" name="is_displayed" value="1"
                                        class="form-check-input @error('is_displayed') is-invalid @enderror"
                                        id="is_displayed" @if (!empty(auth()->user()->ward_no)) disabled @else checked @endif />
                                    <label for="is_displayed" class="form-label">पालिकामा पनि देखाउनु होस्</label>

                                @error('is_displayed')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
