<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf

    <fieldset>

        <div class="row">

            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>१.११ तल्लाको क्षेत्रफल र उचाईको विवरण: </b>
                        <div class="table-responsive">
                            <table
                                class="table table-striped table-bordered">
                                <thead>
                                <tr class="text-center">
                                    <th>तल्ला</th>
                                    <th>प्रस्तावित निर्माणको क्षेत्रफल</th>
                                    <th>साविक निर्माणको क्षेत्रफल</th>
                                    <th>जम्मा क्षेत्रफल</th>
                                    <th>उचाई</th>
                                    <th>
                                        #
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($storeyDetails as $index=>$storeyDetail)
                                    <tr>
                                        <td>
                                            <select
                                                wire:model="storeyDetails.{{$index}}.map_fee_id" {{$dataToEdit !== $index ?'disabled':''}}>
                                                <option value="">छान्नुहोस्</option>
                                                @foreach($mapFees as $mapFee)
                                                    <option value="{{$mapFee->id}}">{{$mapFee->storey}}</option>
                                                @endforeach
                                            </select>
                                            @error("storeyDetails.".$index.".map_fee_id")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.area_of_proposed_construction"
                                                   wire:model="storeyDetails.{{$index}}.area_of_proposed_construction"
                                                {{$dataToEdit !== $index ?'disabled':''}}
                                            >
                                            @error("storeyDetails.".$index.".area_of_proposed_construction")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.area_of_former_construction"
                                                   wire:model="storeyDetails.{{$index}}.area_of_former_construction"
                                                {{$dataToEdit !== $index ?'disabled':''}}
                                            >
                                            @error("storeyDetails.".$index.".area_of_former_construction")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.total_area"
                                                   wire:model="storeyDetails.{{$index}}.total_area"
                                                {{$dataToEdit !== $index ?'disabled':''}}
                                            >
                                            @error("storeyDetails.".$index.".total_area")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="storeyDetails.{{$index}}.height"
                                                   wire:model="storeyDetails.{{$index}}.height"
                                                {{$dataToEdit !== $index ?'disabled':''}}
                                            >
                                            @error("storeyDetails.".$index.".height")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>

                                            @if($dataToEdit === null)
                                                <div class="d-flex">
                                                <button type="button" class="btn btn-sm btn-primary"
                                                        wire:click.prevent="setDataForEdit({{$index}})"><i
                                                        class="fa fa-pen"></i>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-danger"
                                                        wire:click.prevent="deleteData({{$index}})"><i
                                                        class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                            @else

                                                @if($dataToEdit===$index)
                                                    <div class="d-flex">
                                                        <button type="submit" class="btn btn-sm btn-primary    "><i
                                                                class="fa fa-save"></i></button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                            wire:click.prevent="setDataForEdit()"><i
                                                            class="fa fa-trash"></i>
                                                    </button>
                                                    </div>
                                                @endif

                                            @endif

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        @error("applyMap.storeyDetails")
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
