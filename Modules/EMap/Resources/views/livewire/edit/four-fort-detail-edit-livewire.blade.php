<form
    class="building-construction-application">
    @csrf

    <fieldset>
        <legend class="title">१. चार किल्लाको विवरण</legend>
        <div class="row">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table
                                class="table table-hover table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>विवरण</th>
                                    <th>पूर्व</th>
                                    <th>दक्षिण</th>
                                    <th>पश्चिम</th>
                                    <th>उत्तर</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($fourFortDetails as $key=>$fourFort)
                                    <tr>
                                        <td>
                                            <label
                                                for="fourFortDetail.detail">
                                                १.{{$loop->iteration}} {{\Modules\EMap\Enums\FourSideParticularEnum::tryFrom($fourFort['detail'])->label()}}
                                            </label>
                                            <input type="hidden"
                                                   id="fourFortDetails.{{$key}}.detail"
                                                   wire:model="fourFortDetails.{{$key}}.detail"
                                                   disabled
                                            >
                                            @error("fourFortDetails.$key.detail")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.east"
                                                   wire:model="fourFortDetails.{{$key}}.east"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("fourFortDetails.$key.east")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.south"
                                                   wire:model="fourFortDetails.{{$key}}.south"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("fourFortDetails.$key.south")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.west"
                                                   wire:model="fourFortDetails.{{$key}}.west"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("fourFortDetails.$key.west")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   id="fourFortDetails.{{$key}}.north"
                                                   wire:model="fourFortDetails.{{$key}}.north"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("fourFortDetails.$key.north")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            @if($dataToEdit === null)
                                                <div class="d-flex">
                                                    <button type="button" class="edit btn btn-primary"
                                                            wire:click.prevent="setDataForEdit({{$key}})"><i
                                                            class="fa fa-pen"></i>
                                                    </button>
                                                </div>
                                            @else

                                                @if($dataToEdit===$key)
                                                    <div class="d-flex">
                                                        <button type="button" class="edit btn btn-primary mx-1"
                                                                wire:click.prevent="saveFormData"><i
                                                                class="fa fa-save"></i></button>
                                                        <button type="button" class="edit btn btn-danger mx-1"
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
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</form>
