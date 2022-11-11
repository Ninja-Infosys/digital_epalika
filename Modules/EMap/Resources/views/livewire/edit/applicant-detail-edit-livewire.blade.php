<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf

    <fieldset>
        <legend>७. निवेदकको विवरण</legend>
        <div class="row">
            <div class="mb-3">
                <b class="form-label">७.१ निवेदकको प्रकार : </b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\ApplicantTypeEnum::cases() as $applicantType)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$applicantType->name}}"
                                   wire:model="applicantDetail.applicant_type"
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
                                    <select wire:model="applicantDetail.citizenship_issue_district_id">
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

            <div>
                <input type="file"
                       id="applicant_signature"
                       wire:model="applicantDetail.signature"
                >
            </div>
            <div class="px-5">
                <label
                    for="applicant_signature"><b>निवेदकको सहि: </b></label>
            </div>
            @error('applicantDetail.signature')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
</form>
