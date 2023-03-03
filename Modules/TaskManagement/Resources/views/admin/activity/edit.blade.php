@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.taskManagement.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कार्यहरू</li>
                    </ol>
                </div>
                <h4 class="page-title">कार्य सम्पादन</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center justify-content-between">
                        <h4 class="header-title mb-0">कार्यहरू सम्पादन गर्नुहोस</h4>
                        <div class="d-flex flex-wrap align-items-center">

                            <a href="{{route('admin.taskManagement.activity.index')}}"
                               class="btn btn-sm btn-outline-primary waves-effect waves-light">
                                <i class="fa fa-list mx-1"></i>कार्यहरूको सुची</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('admin.taskManagement.activity.update', $activity)}}" method="post"
                          enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-4 mb-2">
                                <x-date-input-component
                                    label-ne="मिति *" name-ne="date"
                                    label-en="Date *" name-en="date_en"
                                    :get-today-date="false"
                                    :edit-date-ne="$activity->date"
                                    :edit-date-en="$activity->date_en?->toDateString()"
                                />
                            </div>
                            <div class="col-md-12 mb-2">
                                <div class="d-flex align-items-center justify-content-between mb-1">
                                    <label for="activities" class="form-label fw-bold">क्रियाकलाप <span
                                            class="text-danger">*</span></label>
                                    <button
                                        type="button"
                                        class="btn btn-xs btn-outline-info"
                                        data-target-element="activities"
                                        data-toggle="add-more">
                                        <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                                    </button>
                                </div>
                                <fieldset class="bg-soft-secondary">
                                    <div id="activities">
                                        @foreach($activity->activityLists as $key=>$activityList)
                                            <div class="main">
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-sm btn-outline-danger"
                                                            data-toggle="remove-parent" data-parent=".main"
                                                            data-target-element="activities">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                                <div class="row border-bottom mb-2">
                                                    <input type="hidden" name="activity_lists[{{$key}}][id]"
                                                           value="{{$activityList->id}}">
                                                    <div class="col-md-6 mb-2">
                                                        <label for="title" class="form-label">शिर्षक *</label>
                                                        <input
                                                            type="text"
                                                            name="activity_lists[{{$key}}][title]"
                                                            class="form-control"
                                                            id="title"
                                                            placeholder="शिर्षक"
                                                            value="{{$activityList->title}}"
                                                            required
                                                        />
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="documents" class="form-label">डकुमेन्ट </label>
                                                        <input
                                                            type="file"
                                                            name="activity_lists[{{$key}}][documents][]"
                                                            class="form-control"
                                                            id="Documents"
                                                            multiple/>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="description"
                                                               class="form-label">विवरण</label>
                                                        <textarea name="activity_lists[{{$key}}][description]"
                                                                  id="description" cols="30" rows="5"
                                                                  class="form-control ckEditor"
                                                                  placeholder="विवरण">{{$activityList->description}}</textarea>
                                                    </div>
                                                    <div class="col-md-6 mb-2">
                                                        <label for="remarks" class="form-label">कैफ़ियत</label>
                                                        <textarea name="activity_lists[{{$key}}][remarks]"
                                                                  id="remarks" cols="30" rows="5"
                                                                  class="form-control"
                                                                  placeholder="कैफ़ियत">{{$activityList->remarks}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="remarks" class="form-label">कैफ़ियत</label>
                                <textarea name="remarks"
                                          id="remarks" cols="30" rows="5"
                                          class="form-control @error('remarks') is-invalid @enderror"
                                          placeholder="कैफ़ियत">{{$activity->remarks}}</textarea>
                                @error('remarks')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4 class="header-title mb-0">कागजातहरु</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($activity->activityLists as $activityList)
                                    @forelse($activityList->files as $file)
                                        <div class="col-xl-4 col-lg-6">
                                            <div class="card shadow-none border">
                                                <div class="p-2">
                                                    <div class="row align-items-center">
                                                        <div class="col-2 pe-0">
                                                            <div class="avatar-sm">
                                                    <span class="avatar-title bg-light text-secondary rounded">
                                                        <i class="fa {{getFileIconClass($file->extension)}} font-18"></i>
                                                    </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-8">
                                                            <a href="javascript:void(0);"
                                                               class="text-muted fw-medium">{{$activityList->title}}.{{$file->extension}}</a>
                                                            <p class="mb-0 font-13">{{convert_to_highest_unit($file->file_size)}}</p>
                                                        </div>
                                                        <div class="col-2">
                                                            <form action="{{route('admin.file.destroy',$file)}}"
                                                                  method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button data-bs-type="delete"
                                                                        class="btn btn-xs btn-outline-danger {{get_setting('Pin')?'confirm_pin':'show_confirm'}}"
                                                                        title="मेटाउनु होस्">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div> <!-- end row -->
                                                </div> <!-- end .p-2-->
                                            </div> <!-- end col -->
                                        </div>
                                    @empty
                                        <p class="text-center">तालिकामा कुनै डाटा उपलब्ध छैन !!!</p>
                                    @endforelse
                                @endforeach
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
