@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.executiveMeeting.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.executiveMeeting.meetingEvent.index',$event_for)}}">बैठक विवरण </a>
                        </li>
                        <li class="breadcrumb-item active"> नयाँ बैठक विवरण  थप्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">बैठक विवरण </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">नयाँ बैठक विवरण थप्नुहोस्</h4>
                        <a href="{{route('admin.executiveMeeting.meetingEvent.index',$event_for)}}"
                           class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> बैठक विवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.executiveMeeting.meetingEvent.store',$event_for)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="event_name" class="form-label">नाम *</label>
                                <input
                                    type="text"
                                    name="event_name"
                                    value="{{old('event_name')}}"
                                    class="form-control @error('event_name') is-invalid @enderror"
                                    id="event_name"
                                    placeholder="नाम"
                                />
                                @error('event_name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-2">
                                <x-date-input-component
                                    nameNe="start_date" labelNe="सुरू मिति *"
                                    nameEn="en_start_date" labelEn="Start Date"
                                    :getTodayDate="false"
                                />
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-date-input-component
                                    nameNe="end_date" labelNe="अन्तिम मिति"
                                    nameEn="en_end_date" labelEn="End Date"
                                    :getTodayDate="false"
                                />
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="recurrence" class="form-label">पुनरावृत्ति *</label>
                                <select
                                    name="recurrence"
                                    class="form-control @error('recurrence') is-invalid @enderror"
                                    data-toggle="select2"
                                    id="recurrence">
                                    <option value="" selected disabled>-- छान्नुहोस् ---</option>
                                    @foreach(\Modules\ExecutiveMeeting\Enums\RecurrenceTypeEnum::cases() as $recurrence)
                                        <option
                                            value="{{$recurrence->value}}"
                                            {{old('recurrence')===$recurrence->value ? 'selected' : ''}}>
                                            {{$recurrence->label()}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('recurrence')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <x-date-input-component
                                    nameNe="recurrence_end_date" labelNe="पुनरावृत्ति अन्तिम मिति"
                                    nameEn="en_recurrence_end_date" labelEn="Recurrence End Date"
                                    :getTodayDate="false"
                                />
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="description" class="form-label">विवरण *</label>
                                <textarea
                                    name="description"
                                    id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="विवरण"
                                    cols="30" rows="3">{{old('description')}}</textarea>
                                @error('description')
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
