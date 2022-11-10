<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
    <fieldset>
        <div class="d-flex justify-content-between my-2">
            <h4>३. जग्गा धनीको विवरण</h4>
            <div>
                <button class="btn btn-sm btn-primary rounded-pill waves-effect waves-light"
                        wire:click.prevent="setEditForm"><i
                        class="fa fa-pen"></i>सम्पादन
                </button>
            </div>
        </div>
        <div class="row">
            <div class="mb-3">
                <b class="form-label">३.१ जग्गा धनीको किसिम *</b> <br>
                <div class="row">
                    @foreach(\Modules\EMap\Enums\LandOwnerTypeEnum::cases() as $landOwnerType)
                        <div class="col-md-3">
                            <input type="radio"
                                   id="{{$landOwnerType->name}}"
                                   wire:model="landOwner.land_owner_type"
                                   value="{{$landOwnerType->value}}" {{$editForm ? '' : 'disabled'}}>
                            <label
                                for="{{$landOwnerType->name}}">{{$landOwnerType->label()}}</label>
                        </div>
                    @endforeach
                    @error('landOwner.land_owner_type')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <table
                            class="table table-hover table-responsive table-bordered">
                            <tbody>
                            <tr>
                                <td>
                                    <label for="name">१.१ नाम :</label>
                                    <input type="text"
                                           id="name"
                                           wire:model="landOwner.name"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="phone">१.२ फोन नं. :</label>
                                    <input type="text"
                                           id="phone"
                                           wire:model="landOwner.phone"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.phone')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="father_name">१.३ बुवाको नाम :</label>
                                    <input type="text"
                                           id="father_name"
                                           wire:model="landOwner.father_name"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.father_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="landOwner.grandfather_name">१.४ हजुरबुबाको नाम :</label>
                                    <input type="text"
                                           id="landOwner.grandfather_name"
                                           wire:model="landOwner.grandfather_name"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.grandfather_name')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="landOwner.citizenship_issue_district_id">१.५ नागरिकता लिएको जिल्ला
                                        :</label>
                                    <select wire:model="landOwner.citizenship_issue_district_id"
                                            {{$editForm ? '' : 'disabled'}}
                                            id="landOwner.citizenship_issue_district_id">
                                        <option value=""></option>
                                        @foreach($allDistricts as $district)
                                            <option value="{{$district->id}}">
                                                {{$district->district}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('landOwner.citizenship_issue_district_id')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="citizenship_no">१.६ नागरिकत नम्बर :</label>
                                    <input type="text"
                                           id="citizenship_no"
                                           wire:model="landOwner.citizenship_no"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.citizenship_no')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="citizenship_issue_date">१.७ नागरिकता लिएको मिति :
                                        :</label>
                                    <input type="text"
                                           id="citizenship_issue_date"
                                           wire:model="landOwner.citizenship_issue_date"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.citizenship_issue_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="landOwner.address">१.८ ठेगाना :</label>
                                    <input type="text"
                                           id="landOwner.address"
                                           wire:model="landOwner.address"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.address')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="landOwner.local_body">१.९ पालिका :</label>
                                    <input type="text"
                                           id="landOwner.local_body"
                                           wire:model="landOwner.local_body"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.local_body')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label for="landOwner.ward_no">१.१० वडा नं. :</label>
                                    <input type="number"
                                           id="landOwner.ward_no"
                                           wire:model="landOwner.ward_no"
                                        {{$editForm ? '' : 'disabled'}}
                                    >
                                    @error('landOwner.ward_no')
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

    @if($editForm)
        <div class="my-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    @endif
</form>
