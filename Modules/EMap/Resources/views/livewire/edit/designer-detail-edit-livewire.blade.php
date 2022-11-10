<form wire:submit.prevent="saveFormData" method="post"
      class="building-construction-application">
    @csrf
    <fieldset>
        <legend>२. डिजाइनरको विवरण</legend>
        @foreach($designerDetails as $key=>$designerDetail)
            <div class="row">
                <label class="fs-6 fw-semibold pb-3"
                       for="designerDetails.{{$key}}.post">
                    १.{{$loop->iteration}} {{\Modules\EMap\Enums\PostsEnum::tryFrom($designerDetail['post'])->label()}}
                    @if($dataToEdit === null)
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-sm btn-primary"
                                    wire:click.prevent="setDataForEdit({{$key}})"><i
                                    class="fa fa-pen"></i>
                            </button>
                        </div>
                    @else

                        @if($dataToEdit===$key)
                            <div class="d-flex justify-content-end">
                                <button type="button" class="btn btn-sm btn-primary mx-1"
                                        wire:click.prevent="saveFormData"><i
                                        class="fa fa-save"></i></button>
                                <button type="button" class="btn btn-sm btn-danger mx-1"
                                        wire:click.prevent="setDataForEdit()"><i
                                        class="fa fa-times"></i>
                                </button>
                            </div>
                        @endif

                    @endif
                </label>
                <input type="hidden"
                       id="designerDetails.{{$key}}.post"
                       wire:model="designerDetails.{{$key}}.post"
                >
                @error("designerDetails.$key.post")
                <p class="text-danger">{{$message}}</p>
                @enderror
                <div class="table-responsive">
                    <table
                        class="table table-hover table-responsive table-bordered">
                        <tr>
                            <td><label for="designerDetails.{{$key}}.name">नाम</label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.name"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.name"
                                >
                                @error("designerDetails.$key.name")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td>
                                <label for="designerDetails.{{$key}}.father_name"> बुवाको नाम</label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.father_name"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.father_name"
                                >
                                @error("designerDetails.$key.father_name")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td>
                                <label for="designerDetails.{{$key}}.grandfather_name">
                                    हजुरबुबाको नाम
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.grandfather_name"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.grandfather_name"
                                >
                                @error("designerDetails.$key.grandfather_name")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="designerDetails.{{$key}}.phone">
                                    फोन
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.phone"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.phone"
                                >
                                @error("designerDetails.$key.phone")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td>
                                <label for="designerDetails.{{$key}}.address">
                                    ठेगाना
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.address"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.address"
                                >
                                @error("designerDetails.$key.address")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td>
                                <label for="designerDetails.{{$key}}.local_body">
                                    पालिका
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.local_body"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.local_body"
                                >
                                @error("designerDetails.$key.local_body")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="designerDetails.{{$key}}.ward_no">
                                    वडा नं.
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.ward_no"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.ward_no"
                                >
                                @error("designerDetails.$key.ward_no")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td>
                                <label for="designerDetails.{{$key}}.nec_council_no">
                                    NEC Council No.
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.nec_council_no"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.nec_council_no"
                                >
                                @error("designerDetails.$key.nec_council_no")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td>
                                <label for="designerDetails.{{$key}}.local_body_registration_no">
                                    पालिकाको दर्ता नं
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.local_body_registration_no"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.local_body_registration_no"
                                >
                                @error("designerDetails.$key.local_body_registration_no")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label for="designerDetails.{{$key}}.consulting_firm_name">
                                    कन्सल्टिंग फर्मबाट भए सो को नाम
                                </label>
                                <input type="text"
                                       class="form-control form-control-sm"
                                       id="designerDetails.{{$key}}.consulting_firm_name"
                                       {{$dataToEdit !== $key ?'disabled':''}}
                                       wire:model="designerDetails.{{$key}}.consulting_firm_name"
                                >
                                @error("designerDetails.$key.consulting_firm_name")
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </td>
                            <td colspan="2">

                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endforeach

    </fieldset>

</form>
