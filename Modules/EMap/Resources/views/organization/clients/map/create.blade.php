@extends('emap::organization.layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card mb_30">
                <div class="card-header p-3">
                    <div class="main-title d-flex justify-content-between">
                        <h3 class="mb-0">नक्सा दरखास्त फारम</h3>
                        <a href="{{route('organization.admin.clients.client.show', $client)}}"
                           class="btn btn-primary btn-sm">
                            <i class="fa fa-list"></i> सेवाग्राही
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{route('organization.admin.clients.mapApply.store', $client)}}" method="post"
                          class="building-construction-application">
                        @csrf
                        {!! $mapSetting->map_request_form_format ?? '' !!}
                        <fieldset>
                            <legend>१. प्रस्तावित भवनको विवरण</legend>
                            <div class="row">
                                <div class="mb-3">
                                    <b class="form-label">१.१ निर्माण कार्यको किसिम *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\TypeOfConstructionWork::cases() as $constructionType)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('construction_type') is-invalid @enderror "
                                                       id="{{$constructionType->name}}"
                                                       name="construction_type"
                                                       {{old('construction_type')== $constructionType->value?'checked':''}} value="{{$constructionType->value}}">
                                                <label
                                                    for="{{$constructionType->name}}">{{$constructionType->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('construction_type')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">१.२ प्रयोजन *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\BuildingUsage::cases() as $usages)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('usage') is-invalid @enderror "
                                                       id="{{$usages->name}}"
                                                       name="usage"
                                                       {{old('usage')== $usages->value?'checked':''}} value="{{$usages->value}}">
                                                <label
                                                    for="{{$usages->name}}">{{$usages->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('usage')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">१.३ भवन ऐन अनुसार वर्गीकरण *</b> <br>
                                    <div class="row">
                                        @foreach(\Modules\EMap\Enums\Categorization::cases() as $categorization)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('building_category') is-invalid @enderror "
                                                       id="{{$categorization->name}}"
                                                       name="building_category"
                                                       {{old('building_category')== $categorization->value?'checked':''}} value="{{$categorization->value}}">
                                                <label
                                                    for="{{$categorization->name}}">{{$categorization->label()}}</label>
                                            </div>
                                        @endforeach
                                        @error('building_category')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <b class="form-label">१.४ स्ट्रकचर टाईप *</b> <br>
                                    <div class="row">
                                        @foreach($structureTypes as $structureType)
                                            <div class="col-md-3">
                                                <input type="radio"
                                                       class="@error('structure_type_id') is-invalid @enderror "
                                                       id="structure-type-{{$loop->index}}"
                                                       name="structure_type_id"
                                                       {{old('structure_type_id')== $structureType->id?'checked':''}} value="{{$structureType->id}}">
                                                <label
                                                    for="structure-type-{{$loop->index}}">{{$structureType->title}}</label>
                                            </div>
                                        @endforeach
                                        <div class="col-md-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="radio"
                                                           class="@error('structure_type_id') is-invalid @enderror "
                                                           id="structure-type-other"
                                                           name="structure_type_id"
                                                           {{old('structure_type_id')== 'other'?'checked':''}} value="other">
                                                    <label
                                                        for="structure-type-other">अन्य</label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text"
                                                           class=" @error('structure_type') is-invalid @enderror "
                                                           id="structure-type"
                                                           name="structure_type"
                                                           placeholder="स्ट्रकचर टाईप हल्नुहोस"
                                                           value="{{old('structure_type')}}">
                                                </div>
                                            </div>


                                        </div>
                                        @error('structure_type_id')
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    @error('name')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                for="current_storey"><b>१.५ हाल निर्माण गर्ने तल्ला संख्या: </b></label>
                                            <input type="text"
                                                   class="@error('current_storey') is-invalid @enderror "
                                                   id="current_storey"
                                                   name="current_storey"
                                                   value="{{old('current_storey')}}"
                                                   placeholder="हाल निर्माण गर्ने तल्ला संख्या हल्नुहोस"
                                            >

                                            @error('current_storey')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                for="area_of_plinth"><b>१.६ प्लिन्थको क्षेत्रफल: </b></label>
                                            <input type="text"
                                                   class="@error('area_of_plinth') is-invalid @enderror "
                                                   id="area_of_plinth"
                                                   name="area_of_plinth"
                                                   value="{{old('area_of_plinth')}}"
                                                   placeholder="प्लिन्थको क्षेत्रफल"
                                            >

                                            @error('area_of_plinth')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="future_storey"><b>१.७ भविष्यमा निर्माण गर्ने तल्ला
                                                    संख्या: </b></label>
                                            <input type="text"
                                                   class="@error('future_storey') is-invalid @enderror "
                                                   id="future_storey"
                                                   name="future_storey"
                                                   value="{{old('future_storey')}}"
                                                   placeholder="भविष्यमा निर्माण गर्ने तल्ला संख्या हल्नुहोस"
                                            >
                                            @error('future_storey')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label
                                                for="length"><b>१.८ कुल भवनको लम्बाई: </b></label>
                                            <input type="text"
                                                   class="@error('length') is-invalid @enderror "
                                                   id="length"
                                                   name="length"
                                                   value="{{old('length')}}"
                                                   placeholder="कुल भवनको लम्बाई हल्नुहोस"
                                            >
                                            @error('length')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label
                                                for="breadth"><b>१.९ कुल भवनको चौडाई: </b></label>
                                            <input type="text"
                                                   class="@error('breadth') is-invalid @enderror "
                                                   id="breadth"
                                                   name="breadth"
                                                   value="{{old('breadth')}}"
                                                   placeholder="कुल भवनको चौडाई हल्नुहोस"
                                            >
                                            @error('breadth')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label
                                                for="height"><b>१.१० भवनको कुल उचाई जमिनको सतहबाट: </b></label>
                                            <input type="text"
                                                   class="@error('height') is-invalid @enderror "
                                                   id="height"
                                                   name="height"
                                                   value="{{old('height')}}"
                                                   placeholder="भवनको कुल उचाई जमिनको सतहबाट हल्नुहोस"
                                            >
                                            @error('height')
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <b>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण: </b>
                                            <table class="table table-striped table-hover table-responsive table-bordered">
                                                <thead>
                                                <tr class="text-center">
                                                    <th>तल्ला</th>
                                                    <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                                                    <th>साविक निर्माणको क्षेत्रफल</th>
                                                    <th>जम्मा क्षेत्रफल</th>
                                                    <th>उचाई</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </fieldset>
                        <div class="mt-4 d-flex justify-content-end">

                            <button type="submit" class="btn btn-primary    ">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @push('style')
        <style>
            .building-construction-application p {
                color: black;
            }

            .building-construction-application input[type="text"] {
                border-bottom: dotted 3px black;
                border-top: none;
                border-right: none;
                border-left: none;
                /*width: 60%;*/
            }


        </style>
    @endpush
@endsection
