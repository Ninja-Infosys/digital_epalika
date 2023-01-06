@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('identity.admin.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">अपांगताको प्रकार</li>
                    </ol>
                </div>
                <h4 class="page-title"> अपांगताको प्रकार</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ अपांगताको प्रकार थप्नुहोस्</h4>
                        <a href="{{route('identity.admin.setting.governmentalDisabilityType.index')}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> अपांगताको प्रकार सुची
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('identity.admin.setting.governmentalDisabilityType.update',$governmentalDisabilityType)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    value="{{old('title',$governmentalDisabilityType->title)}}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="शिर्षक"
                                />
                                @error('title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="title_en" class="form-label">शिर्षक (English) *</label>
                                <input
                                    type="text"
                                    name="title_en"
                                    value="{{old('title_en',$governmentalDisabilityType->title_en)}}"
                                    class="form-control @error('title_en') is-invalid @enderror"
                                    id="title_en"
                                    placeholder="शिर्षक (English)"
                                />
                                @error('title_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <div class="mb-3 xl:w-96">
                                    <label for="category">Category</label>
                                    <select name="category" id="category"
                                            class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none form-control"
                                            aria-label="Default select example">
                                        <option value="">Select Category</option>
                                        @foreach (\Modules\Identity\Enums\CategoryTypeEnum::cases() as $category)
                                            <option value="{{ $category->value }}" {{old('category',$category->value)== $governmentalDisabilityType->category->value ? 'selected':''}}>
                                                {{ $category->label() }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 mb-2">
                                <div class="mb-3 xl:w-96">
                                    <label for="color">Card Color</label>
                                    <select name="color" id="color"
                                            class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none form-control"
                                            aria-label="Default select example">
                                        <option value="">Select Category</option>
                                        @foreach ($cardColors as $cardColor)
                                            <option value="{{ $cardColor->color }}" {{old('color',$cardColor->color)==$governmentalDisabilityType->color ? 'selected':''}}>
                                                {{ $cardColor->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('color')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="position" class="form-label">स्थिति *</label>
                                <input
                                    type="number"
                                    name="position"
                                    value="{{old('position',$governmentalDisabilityType->position)}}"
                                    class="form-control @error('position') is-invalid @enderror"
                                    id="position"
                                    placeholder="स्थिति"
                                />
                                @error('title_en')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


