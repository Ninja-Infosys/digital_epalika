@extends('admin.layouts.master')
@section('content')
    <div class="">
        <div class="page-title d-flex justify-content-between">
            <h5>किसानका लागि फारम</h5>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="">फारमको विवरण</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">किसानको फारम</li>
                </ol>
            </nav>
        </div>
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h6>किसानको फारम</h6>
            </div>
            <form action="{{route('admin.roaster.training.update',$training)}}" method="post">
                <div class="card-body">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-3 col-sm-4 form-group">
                            <label for="name">तालिमको नाम * </label>
                            <input id="name" type="text" name="name" placeholder="तालिमको नाम"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{old('name',$training->name)}}">
                            @error('name')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="col-md-2 col-sm-4 form-group">
                            <label for="fiscal_year_id">आर्थिक बर्ष * </label>
                            <select id="fiscal_year_id" name="fiscal_year_id"
                                    class="form-control @error('fiscal_year_id') is-invalid @enderror">
                                <option value="">छान्नुहोस्</option>
                                @foreach($fiscalYears as $fiscalYear)
                                    <option
                                        value="{{$fiscalYear->id}}" {{$training->fiscal_year_id == old('fiscal_year_id',$fiscalYear->id) ? 'selected': ''}}>{{$fiscalYear->title}}</option>
                                @endforeach
                            </select>
                            @error('fiscal_year_id')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-md-2 col-sm-4">
                            <label for="open_date">फारम खुल्ने मिति * </label><br>
                            <input id="open_date" type="datetime-local" name="open_date" placeholder="फारम खुल्ने मिति"
                                   class="form-control @error('open_date') is-invalid @enderror"
                                   value="{{old('open_date',$training->open_date)}}">
                            @error('open_date')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>


                        <div class="col-md-2 col-sm-4">
                            <label for="closed_date">फारम बन्द हुने मिति * </label><br>
                            <input id="closed_date" type="datetime-local" name="closed_date"
                                   placeholder="फारम बन्द हुने मिति"
                                   class="form-control @error('closed_date') is-invalid @enderror"
                                   value="{{old('closed_date',$training->closed_date)}}">
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
                                        value="{{$trainer->id}}" {{in_array($trainer->id, old('trainers',$training->trainers->pluck('id')->toArray())) ? 'selected': ''}}>{{$trainer->name}}</option>
                                @endforeach
                            </select>
                            @error('trainers')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
