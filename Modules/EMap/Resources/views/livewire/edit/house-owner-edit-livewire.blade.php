<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
    <fieldset>
        <div class="d-flex justify-content-between my-2">
            <h3>४. घर धनीको विवरण (जग्गाधनी भन्दा फरक भएमा)</h3>
            <div>
                <button class="btn btn-sm btn-primary rounded-pill waves-effect waves-light" wire:click.prevent="setEditForm"><i
                        class="fa fa-pen px-2"></i>सम्पादन
                </button>
            </div>
        </div>
        <div class="row">
            <div class="my-2">
                <div class="mb-3">
                    <div class="row">
                        <div class="col-md-12">
                            <table
                                class="table table-hover table-responsive table-bordered">
                                <tbody>
                                <tr>
                                    <td>
                                        <label for="houseOwner.name">१.१ नाम :</label>
                                        <input type="text"
                                               id="houseOwner.name"
                                               wire:model="houseOwner.name"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="houseOwner.phone">१.२ फोन नं. :</label>
                                        <input type="text"
                                               id="houseOwner.phone"
                                               wire:model="houseOwner.phone"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.phone')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="houseOwner.father_name">१.३ बुवाको नाम :</label>
                                        <input type="text"
                                               id="houseOwner.father_name"
                                               wire:model="houseOwner.father_name"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.father_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="houseOwner.grandfather_name">१.४ हजुरबुबाको नाम :</label>
                                        <input type="text"
                                               id="houseOwner.grandfather_name"
                                               wire:model="houseOwner.grandfather_name"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.grandfather_name')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="houseOwner.citizenship_issue_district_id">
                                            १.५ नागरिकता लिएको जिल्ला
                                            :
                                        </label>
                                        <select
                                            id="houseOwner.citizenship_issue_district_id"
                                             {{$editForm ? '' : 'disabled'}}
                                            wire:model="houseOwner.citizenship_issue_district_id">
                                            <option value=""></option>
                                            @foreach($allDistricts as $district)
                                                <option value="{{$district->id}}">
                                                    {{$district->district}}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('houseOwner.citizenship_issue_district_id')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="houseOwner.citizenship_no">
                                            १.६ नागरिकत नम्बर :
                                        </label>
                                        <input type="text"
                                               id="houseOwner.citizenship_no"
                                               wire:model="houseOwner.citizenship_no"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.citizenship_no')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="houseOwner.citizenship_issue_date">
                                            १.७ नागरिकता लिएको मिति :
                                        </label>
                                        <input type="text"
                                               id="houseOwner.citizenship_issue_date"
                                               wire:model="houseOwner.citizenship_issue_date"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.citizenship_issue_date')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label for="houseOwner.address">
                                            १.८ ठेगाना :
                                        </label>
                                        <input type="text"
                                               id="houseOwner.address"
                                               wire:model="houseOwner.address"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.address')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="houseOwner.local_body">१.९ पालिका :</label>
                                        <input type="text"
                                               id="houseOwner.local_body"
                                               wire:model="houseOwner.local_body"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.local_body')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label for="houseOwner.ward_no">१.१० वडा नं. :</label>
                                        <input type="number"
                                               id="houseOwner.ward_no"
                                               wire:model="houseOwner.ward_no"
                                                {{$editForm ? '' : 'disabled'}}
                                        >
                                        @error('houseOwner.ward_no')
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
        </div>
    </fieldset>

    @if($editForm)
        <div class="my-4 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    @endif
</form>
