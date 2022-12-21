<form class="building-construction-application">
    @csrf

    <fieldset>
        <legend class="text-center"><b>निर्माण हुने भवन तथा मापदण्ड सम्बन्धि संक्षिप्त विवरण</b>
        </legend>
        <div class="row">
            <div class="mb-3">
                <div class="row">
                    <div class="col-md-12">
                        <b>मापदण्ड सम्बन्धि विवरण :</b>
                        <div class="table-responsive">
                            <table
                                class="table table-hover table-responsive table-bordered">
                                <thead>
                                <tr>
                                    <th>क्र.सं</th>
                                    <th>विवरण</th>
                                    <th>मापदण्ड अनुसार</th>
                                    <th>नक्सा अनुसार</th>
                                    <th>अनुपालन</th>
                                    <th>कैफियत</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($criteriaDetails as $key=>$criteriaDetail)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>
                                            <label
                                                for="name">
                                                {{\Modules\EMap\Enums\DetailsRegardingCriteriaEnum::tryFrom($criteriaDetail['detail'])->label()}}
                                            </label>
                                            <input type="hidden"
                                                   id="criteriaDetails.{{$key}}.detail"
                                                   wire:model="criteriaDetails.{{$key}}.detail"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("criteriaDetails.$key.detail")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   wire:model="criteriaDetails.{{$key}}.according_to_criteria"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("criteriaDetails.$key.according_to_criteria")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   wire:model="criteriaDetails.{{$key}}.according_to_map"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("criteriaDetails.$key.according_to_map")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="text"
                                                   wire:model="criteriaDetails.{{$key}}.compliance"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("criteriaDetails.$key.compliance")
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </td>

                                        <td>
                                            <input type="text"
                                                   wire:model="criteriaDetails.{{$key}}.remarks"
                                                {{$dataToEdit !== $key ?'disabled':''}}
                                            >
                                            @error("criteriaDetails.$key.remarks")
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
                                @error("criteriaDetails")
                                <p class="text-danger">{{$message}}</p>
                                @enderror

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </fieldset>
</form>
