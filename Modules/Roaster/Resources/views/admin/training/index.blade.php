@extends('admin.layouts.master')
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.roaster.dashboard')}}">
                                    <i class="fa fa-home"></i> गृहपृष्ठ
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
        <div class="card mb-3">
            <div class="card-header text-dark d-flex justify-content-between">
                <h5>तालिम खोल्नुहोस</h5>
            </div>
            <form action="{{route('admin.roaster.training.store')}}" method="post">
                <div class="card-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12 form-group">
                            <label for="name">तालिमको नाम * </label>
                            <input id="name" type="text" name="name" placeholder="तालिमको नाम"
                                   class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 col-sm-12 form-group">
                            <label for="form_type">प्रशिक्षार्थीको प्रकार * </label>
                            <select id="form_type" name="form_type"
                                    class="form-control @error('form_type') is-invalid @enderror">
                                <option value="">प्रशिक्षार्थीको प्रकार छान्नुहोस्</option>
                                @foreach(\Modules\Roaster\Enums\TrainingTypeEnum::cases() as $key=>$trainingType)
                                    <option
                                        value="{{$trainingType->value}}" {{$trainingType == old('form_type') ? 'selected': ''}}>{{$trainingType->label()}}</option>
                                @endforeach
                            </select>
                            @error('form_type')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="open_date">फारम खुल्ने मिति * </label><br>
                            <input id="open_date" type="datetime-local" name="open_date" placeholder="फारम खुल्ने मिति"
                                   class="form-control @error('open_date') is-invalid @enderror"
                                   value="{{old('open_date')}}">
                            @error('open_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 col-sm-12">
                            <label for="closed_date">फारम बन्द हुने मिति * </label><br>
                            <input id="closed_date" type="datetime-local" name="closed_date"
                                   placeholder="फारम बन्द हुने मिति"
                                   class="form-control @error('closed_date') is-invalid @enderror"
                                   value="{{old('closed_date')}}">
                            @error('closed_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-3 col-sm-12 form-group">
                            <label for="trainers">प्रशिक्षक * </label>
                            <select id="form_type" name="trainers[]"
                                    class="form-control @error('trainers') is-invalid @enderror" multiple>
                                <option value="">प्रशिक्षक छान्नुहोस्</option>
                                @foreach($trainers as $trainer)
                                    <option
                                        value="{{$trainer->id}}" {{in_array($trainer->id, old('trainers',[])) ? 'selected': ''}}>{{$trainer->name}}</option>
                                @endforeach
                            </select>
                            @error('trainers')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">पेश गर्नुहोस्</button>
                </div>
            </form>
        </div>
        <div class="card">
            <div class="card-header text-dark d-flex justify-content-between">
                <h5>तालिमको विवरण</h5>

            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-fill navtab-bg">
                    <li class="nav-item">
                        <a href="#tab-all" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
                            सबै तालिमहरु
                        </a>
                    </li>
                    @foreach(\Modules\Roaster\Enums\TrainingTypeEnum::cases() as $key=>$typeTab)
                    <li class="nav-item">
                        <a href="#tab-{{$typeTab->value}}" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                            {{$typeTab->label()}}
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    <div class="tab-pane show active" id="tab-all">
                        <x-training-table-component :training-data="$trainings"/>
                    </div>
                    @foreach(\Modules\Roaster\Enums\TrainingTypeEnum::cases() as $key=>$typeData)
                    <div class="tab-pane" id="tab-{{$typeData->value}}">
                        <x-training-table-component :training-data="$trainings->where('form_type',$typeData)"/>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
