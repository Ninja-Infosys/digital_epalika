@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{route('admin.grant.dashboard')}}">
                                <i class="fa fa-home"></i> गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active">कृषक थप</li>
                    </ol>
                </div>
                <h4 class="page-title"> कृषकहरु</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="header-title">कृषक सम्पादन</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.grant.farmer.update',$farmer)}}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <fieldset>
                            <legend><h4 class="text-info">कृषक विवरण</h4></legend>
                            <h6 class="py-2">नोट: कृपया कृषकको विवरण भर्दा ध्यान दिएर भर्नु होला । </h6>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="first_name" class="form-label">पहिलो नाम *</label>
                                    <input
                                        type="text"
                                        name="first_name"
                                        value="{{old('first_name', $farmer->first_name)}}"
                                        class="form-control @error('first_name') is-invalid @enderror"
                                        id="first_name"
                                        placeholder="पहिलो नाम "
                                    />
                                    @error('first_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="middle_name" class="form-label">बीचको नाम</label>
                                    <input
                                        type="text"
                                        name="middle_name"
                                        value="{{old('middle_name', $farmer->middle_name)}}"
                                        class="form-control @error('middle_name') is-invalid @enderror"
                                        id="middle_name"
                                        placeholder="बीचको नाम"
                                    />
                                    @error('middle_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="last_name" class="form-label">थर *</label>
                                    <input
                                        type="text"
                                        name="last_name"
                                        value="{{old('last_name', $farmer->last_name)}}"
                                        class="form-control @error('last_name') is-invalid @enderror"
                                        id="last_name"
                                        placeholder="थर"
                                    />
                                    @error('last_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="photo" class="form-label">फोटो</label>
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
                                <div class="col-md-4 mb-2">
                                    <label for="phone_no" class="form-label">सम्पर्क नं. *</label>
                                    <input
                                        type="text"
                                        name="phone_no"
                                        value="{{old('phone_no', $farmer->phone_no)}}"
                                        class="form-control @error('phone_no') is-invalid @enderror"
                                        id="phone_no"
                                        placeholder="सम्पर्क नं."
                                    />
                                    @error('phone_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="gender" class="form-label">लिंग *</label>
                                    <select id="gender" name="gender" class="form-control">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach(\App\Enums\Gender::cases() as $gender)
                                            <option
                                                {{$gender->value==old('gender', $farmer->gender->value) ? 'selected' : ''}}
                                                value="{{$gender->value}}">{{$gender->label()}}</option>
                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="marital_status" class="form-label">बैबाहिक अवस्था *</label>
                                    <select id="marital_status" name="marital_status" class="form-control">
                                        <option value="">-- छान्नुहोस् --</option>
                                        @foreach(\App\Enums\MaritalStatusEnum::cases() as $marital_status)
                                            <option
                                                value="{{$marital_status->value}}" {{$marital_status->value==old('marital_status',$farmer->marital_status->value) ? 'selected' : ''}}>
                                                {{$marital_status->label()}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('marital_status')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="father_name" class="form-label">बुवाको नाम थर *</label>
                                    <input
                                        type="text"
                                        name="father_name"
                                        value="{{old('father_name', $farmer->father_name)}}"
                                        class="form-control @error('father_name') is-invalid @enderror"
                                        id="phone_no"
                                        placeholder="बुवाको नाम थर"
                                    />
                                    @error('father_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="grandfather_name" class="form-label">बाजे/ससुराको नाम थर *</label>
                                    <input
                                        type="text"
                                        name="grandfather_name"
                                        value="{{old('grandfather_name', $farmer->grandfather_name)}}"
                                        class="form-control @error('grandfather_name') is-invalid @enderror"
                                        id="grandfather_name"
                                        placeholder="बाजे/ससुराको नाम थर "
                                    />
                                    @error('grandfather_name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="citizenship_no" class="form-label">नागरिकता नं. *</label>
                                    <input
                                        type="text"
                                        name="citizenship_no"
                                        value="{{old('citizenship_no', $farmer->citizenship_no)}}"
                                        class="form-control @error('citizenship_no') is-invalid @enderror"
                                        id="citizenship_no"
                                        placeholder="नागरिकता नं."
                                    />
                                    @error('citizenship_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="farmer_id_card_no" class="form-label">कृषक परिचयपत्र नं</label>
                                    <input
                                        type="text"
                                        name="farmer_id_card_no"
                                        value="{{old('farmer_id_card_no', $farmer->farmer_id_card_no)}}"
                                        class="form-control @error('farmer_id_card_no') is-invalid @enderror"
                                        id="farmer_id_card_no"
                                        placeholder="कृषक परिचयपत्र नं."
                                    />
                                    @error('farmer_id_card_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="national_id_card_no" class="form-label">
                                        राष्ट्रिय परिचयपत्र नम्बर</label>
                                    <input
                                        type="text"
                                        name="national_id_card_no"
                                        value="{{old('national_id_card_no', $farmer->national_id_card_no)}}"
                                        class="form-control @error('national_id_card_no') is-invalid @enderror"
                                        id="national_id_card_no"
                                        placeholder="राष्ट्रिय परिचयपत्र नम्बर"
                                    />
                                    @error('national_id_card_no')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="my-2">
                            <legend><h4 class="text-info">स्थायी ठेगाना *</h4></legend>
                            <h6 class="py-2">नोट: कृपया क्रमशः प्रदेश, जिल्ला, गा.पा./न.पा., वार्ड नं., गाउँ र टोल छनौट
                                गर्नुहोस् । </h6>
                            <div class="row">
                                @livewire('address', [
                                'province_id' => $farmer->province_id,
                                'district_id' => $farmer->district_id,
                                'local_body_id' => $farmer->local_body_id,
                                'ward_no' => $farmer->ward_no
                                ])
                                <div class="col-md-6 mb-2">
                                    <label for="village" class="form-label">
                                        गाउँ</label>
                                    <input
                                        type="text"
                                        name="village"
                                        value="{{old('village', $farmer->village)}}"
                                        class="form-control @error('village') is-invalid @enderror"
                                        id="village"
                                        placeholder="गाउँ"
                                    />
                                    @error('village')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-2">
                                    <label for="tole" class="form-label">
                                        टोल</label>
                                    <input
                                        type="text"
                                        name="tole"
                                        value="{{old('tole', $farmer->tole)}}"
                                        class="form-control @error('tole') is-invalid @enderror"
                                        id="tole"
                                        placeholder="टोल"
                                    />
                                    @error('tole')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend><h4 class="text-info">संलग्नता ? *</h4></legend>
                            <h6 class="py-2"> नोट: कुनै समूह, सहकारी वा उद्यममा संलग्न भएमा ।</h6>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <label for="cooperatives" class="form-label">
                                        सहकारी</label>
                                    <select name="cooperatives[]" multiple data-toggle="select2"
                                            id="cooperatives" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach($cooperatives as $cooperative)
                                            <option
                                                value="{{$cooperative->id}}" {{in_array($cooperative->id,$farmer->cooperatives->pluck('id')->toArray()) ? 'selected' : ''}}>
                                                {{$cooperative->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('cooperatives')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('cooperatives.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="groups" class="form-label">
                                        समूह</label>
                                    <select name="groups[]" multiple data-toggle="select2"
                                            id="groups" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach($groups as $group)
                                            <option value="{{$group->id}}" {{in_array($group->id,$farmer->groups->pluck('id')->toArray()) ? 'selected' : ''}}>
                                                {{$group->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('groups')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('groups.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-2">
                                    <label for="enterprises" class="form-label">
                                        उद्यम</label>
                                    <select name="enterprises[]" multiple data-toggle="select2"
                                            id="enterprises" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach($enterprises as $enterprise)
                                            <option value="{{$enterprise->id}}" {{in_array($enterprise->id,$farmer->enterprises->pluck('id')->toArray()) ? 'selected' : ''}}>
                                                {{$enterprise->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('enterprises')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                    @error('enterprises.*')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary mt-2">
                            Save
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


