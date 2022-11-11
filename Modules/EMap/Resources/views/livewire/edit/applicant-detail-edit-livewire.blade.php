<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf

    <fieldset>
        <div class="d-flex justify-content-between my-2">
            <h3>७. निवेदकको विवरण</h3>
            <div>
                <button class="btn btn-sm btn-primary rounded-pill waves-effect waves-light"
                        wire:click.prevent="setEditForm"><i
                        class="fa fa-pen px-2"></i>सम्पादन
                </button>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <b class="form-label">७.१ निवेदकको प्रकार : </b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\ApplicantTypeEnum::cases() as $applicantType)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$applicantType->name}}"
                                   wire:model="applicantDetail.applicant_type"
                                   {{$editForm ? '' : 'disabled'}}
                                   value="{{$applicantType->value}}">
                            <label
                                for="{{$applicantType->name}}">{{$applicantType->label()}}</label>
                        </div>
                    @endforeach
                    @error('applicantDetail.applicant_type')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <b class="form-label">७.२ घरधनी सँगको सम्बन्ध</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\RelationEnum::cases() as $relation)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$relation->name}}"
                                   wire:model="applicantDetail.relation_with_owner"
                                   {{$editForm ? '' : 'disabled'}}
                                   value="{{$relation->value}}">
                            <label
                                for="{{$relation->name}}">{{$relation->label()}}</label>
                        </div>
                    @endforeach
                    @error('applicantDetail.relation_with_owner')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>जग्गाधनी वा घरधनी भन्दा फरक भएमा</b>
                        <table
                            class="table table-hover table-responsive table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    <label for="applicantDetail.name">१.१ नाम :</label>
                                    <input type="text"
                                           id="applicantDetail.name"
                                           wire:model="applicantDetail.name"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('applicantDetail.name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="applicantDetail.phone">१.२ फोन नं. :</label>
                                    <input type="text"
                                           id="applicantDetail.phone"
                                           wire:model="applicantDetail.phone"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('applicantDetail.phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="applicantDetail.father_name">१.३ बुवाको नाम :</label>
                                    <input type="text"
                                           id="applicantDetail.father_name"
                                           wire:model="applicantDetail.father_name"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('applicantDetail.father_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="applicantDetail.citizenship_issue_district_id">
                                        १.४ नागरिकता लिएको
                                        जिल्ला :
                                    </label>
                                    <select wire:model="applicantDetail.citizenship_issue_district_id"
                                        {{$editForm ? '' : 'disabled'}}>
                                        <option value=""></option>
                                        @foreach($allDistricts as $district)
                                            <option value="{{$district->id}}">
                                                {{$district->district}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('applicantDetail.citizenship_issue_district_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="applicantDetail.citizenship_no">१.५ नागरिकत नम्बर :</label>
                                    <input type="text"
                                           id="applicantDetail.citizenship_no"
                                           wire:model="applicantDetail.citizenship_no"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('applicantDetail.citizenship_no')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="applicantDetail.citizenship_issue_date">
                                        १.६ नागरिकता लिएको मिति :
                                        :
                                    </label>
                                    <input type="text"
                                           id="applicantDetail.citizenship_issue_date"
                                           wire:model="applicantDetail.citizenship_issue_date"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('applicantDetail.citizenship_issue_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>

    </fieldset>
    <div class="d-flex justify-content-between ">
        <div>
            <div>
                <input type="text"
                       id="application_date"
                       wire:model="applicantDetail.application_date"
                    {{$editForm ? '' : 'disabled'}}
                >
            </div>
            <div class="px-5">
                <label
                    for="application_date"><b>निबेदनको मिति : </b></label>
            </div>

            @error('applicantDetail.application_date')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div>
            @if($signatureUrl || $signature)
                <div>
                    <img src="{{ $signature?->temporaryUrl() ??$signatureUrl ?? ''}}" alt="" width="100">
                </div>
            @endif


            <div>
                <input type="file"
                       id="applicant_signature"
                       wire:model="signature"
                    {{$editForm ? '' : 'disabled'}}
                >
            </div>
            <div class="px-5">
                <label
                    for="applicant_signature"><b>निवेदकको सहि: </b></label>
            </div>
            @error('signature')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    </div>

    @if($editForm)
        <div class="my-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    @endif
</form>
