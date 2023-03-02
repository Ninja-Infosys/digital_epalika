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
                    <div class="table-responsive mt-3">
                        <table class="table table-sm table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>क्र.स</th>
                                <th>फाइलको नाम</th>
                                <th>फाइलको प्रकार</th>
                                <th>फाइलको आकार</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($activity->activityLists as $activityList)
                                @foreach($activityList->files as $file)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$activityList->title}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
