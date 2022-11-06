@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.judicialCommittee.judicialMember.index')}}">
                                न्यायिक समिति विवरण
                            </a>
                        </li>
                        <li class="breadcrumb-item active">न्यायिक समिति विवरण सम्पादन गर्नुहोस्</li>
                    </ol>
                </div>
                <h4 class="page-title">न्यायिक समिति विवरण</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">न्यायिक समिति सम्पादन गर्नुहोस्</h4>
                        <a href="{{route('admin.judicialCommittee.judicialMember.index')}}" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-list"></i> न्यायिक समिति विवरण
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.judicialCommittee.judicialMember.update',$judicialMember)}}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('put')
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>व्यक्तिगत विवरण</strong>
                            </legend>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="name" class="form-label">नाम *</label>
                                    <input
                                        type="text"
                                        name="name"
                                        value="{{old('name',$judicialMember->name)}}"
                                        class="form-control @error('name') is-invalid @enderror"
                                        id="name"
                                        placeholder="नाम"
                                    />
                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="designation_id" class="form-label">पद *</label>
                                    <select
                                        name="designation_id"
                                        class="form-control @error('designation_id') is-invalid @enderror"
                                        id="designation_id" data-toggle="select2" data-width="100%">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach($designations as $designation)
                                            <option {{$designation->id==old('designation_id',$judicialMember->designation_id) ? 'selected' : ''}}
                                                    value="{{$designation->id}}">
                                                {{$designation->title}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('designation_id')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="phone" class="form-label">सम्पर्क नं. *</label>
                                    <input
                                        type="text"
                                        name="phone"
                                        value="{{old('phone',$judicialMember->phone)}}"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        id="phone"
                                        placeholder="सम्पर्क नं."
                                    />
                                    @error('phone')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="photo" class="form-label">फोटो</label>
                                    <span>
                                        <img src="{{$judicialMember->photo_url}}" height="40" alt="">
                                    </span>
                                    <input
                                        type="file"
                                        name="photo"
                                        class="form-control @error('photo') is-invalid @enderror"
                                        id="photo"
                                    />
                                    @error('photo')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="gender" class="form-label">लिङ्ग  *</label>
                                    <select
                                        name="gender"
                                        class="form-control @error('gender') is-invalid @enderror"
                                        id="gender" data-toggle="select2" data-width="100%">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach(\App\Enums\Gender::cases() as $gender)
                                            <option {{$gender->value==old('gender',$judicialMember->gender->value) ? 'selected' : ''}}
                                                    value="{{$gender->value}}">
                                                {{$gender->label()}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="blood_group" class="form-label">रक्त समूह</label>
                                    <select
                                        name="blood_group"
                                        class="form-control @error('blood_group') is-invalid @enderror"
                                        id="blood_group" data-toggle="select2" data-width="100%">
                                        <option value="">--- छान्नुहोस् ---</option>
                                        @foreach(config('defaults.blood_groups') as $blood_group)
                                            <option {{$blood_group==old('blood_group',$judicialMember->blood_group) ? 'selected' : ''}}
                                                    value="{{$blood_group}}">
                                                {{$blood_group}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('blood_group')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-8 mb-2">
                                    <x-date-input-component
                                        nameNe="dob" labelNe="जन्म मिति (बि.स.) *"
                                        nameEn="en_dob" labelEn="जन्म मिति (A.D.) *"
                                        :showEnglishDate="true"
                                        :getTodayDate="false"
                                        :editDateNe="$judicialMember->dob"
                                        :editDateEn="$judicialMember->en_dob ? $judicialMember->en_dob->toDateString() : ''"
                                    />
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="position" class="form-label">स्थान </label>
                                    <input
                                        type="number"
                                        name="position"
                                        value="{{old('position',$judicialMember->position)}}"
                                        class="form-control @error('position') is-invalid @enderror"
                                        id="position"
                                        placeholder="स्थान"
                                    />
                                    @error('position')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="father_name" class="form-label">बुवाको नाम *</label>
                                    <input
                                        type="text"
                                        name="father_name"
                                        value="{{old('father_name',$judicialMember->father_name)}}"
                                        class="form-control @error('father_name') is-invalid @enderror"
                                        id="father_name"
                                        placeholder="बुवाको नाम"
                                    />
                                    @error('father_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="mother_name" class="form-label">आमाको नाम *</label>
                                    <input
                                        type="text"
                                        name="mother_name"
                                        value="{{old('mother_name',$judicialMember->mother_name)}}"
                                        class="form-control @error('mother_name') is-invalid @enderror"
                                        id="mother_name"
                                        placeholder="आमाको नाम"
                                    />
                                    @error('mother_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grandfather_name" class="form-label">हजुरबुबाको नाम *</label>
                                    <input
                                        type="text"
                                        name="grandfather_name"
                                        value="{{old('grandfather_name',$judicialMember->grandfather_name)}}"
                                        class="form-control @error('grandfather_name') is-invalid @enderror"
                                        id="grandfather_name"
                                        placeholder="हजुरबुबाको नाम"
                                    />
                                    @error('grandfather_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="border p-2 mb-2">
                            <legend class="font-16 text-info">
                                <strong>ठेगाना</strong>
                            </legend>
                            @livewire('address',['address'=>$judicialMember->address])
                        </fieldset>

                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
