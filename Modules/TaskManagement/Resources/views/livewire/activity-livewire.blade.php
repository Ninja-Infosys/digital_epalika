<div>
    <form wire:submit.prevent="save">
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="date" class="form-label">मिति <span class="text-danger">*</span></label>
                <input
                    type="text"
                    wire:model="formActivity.date"
                    class="form-control"
                    id="date"
                    placeholder="मिति"
                />
                @error('$formActivity.date')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-12 mb-2">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <label for="activities" class="form-label fw-bold">क्रियाकलाप <span class="text-danger">*</span></label>
                    <button
                        type="button"
                        class="btn btn-xs btn-outline-info"
                        data-toggle="add-more"
                        data-content='<div class="row justify-content-center border-bottom mb-2 activities-5">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    class="form-control"
                                    id="title"
                                    placeholder="शिर्षक"
                                />
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="documents" class="form-label">डकुमेन्ट </label>
                                <input
                                    type="file"
                                    name="documents[]"
                                    class="form-control"
                                    id="Documents"
                                    multiple/>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="description"
                                       class="form-label">विवरण</label>
                                <textarea name="description"
                                          id="description" cols="30" rows="5"
                                          class="form-control ckEditor"
                                          placeholder="विवरण"></textarea>
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="remarks" class="form-label">कैफ़ियत</label>
                                <textarea name="remarks"
                                          id="remarks" cols="30" rows="5"
                                          class="form-control"
                                          placeholder="कैफ़ियत"></textarea>
                            </div>
                            <button type="button" class="col-1 btn btn-sm btn-danger mb-1" data-toggle="remove-parent" data-parent=".row">
										<i class="fa fa-times"></i>
									</button>
                        </div>
                        ' data-target=".activities">
                        <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                    </button>
                </div>
                <fieldset>
                    <div class="activities"></div>
                </fieldset>
            </div>
            <div class="col-md-12 mb-2">
                <label for="formActivity.remarks" class="form-label">कैफ़ियत</label>
                <textarea name="formActivity.remarks"
                          id="formActivity.remarks" cols="30" rows="5"
                          class="form-control @error('formActivity.remarks') is-invalid @enderror"
                          placeholder="कैफ़ियत"></textarea>
                @error('formActivity.remarks')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form>

    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        {{--        <script src="{{asset('assets/backend/ckeditor/ckeditor.js')}}"></script>--}}
        {{--        <script src="{{asset('assets/backend/ckeditor/editor.js')}}"></script>--}}
        <script type="text/javascript">
            $(document).ready(function () {
                $("#date").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let inputFieldDate = $("#date").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        $("#en_date").val(formattedDate);

                        Livewire.emit('dateChanged', inputFieldDate, formattedDate);
                    }
                });

                {{--                @if(!$complaintApplication)--}}
                let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
                Livewire.emit('dateChanged', todayBsDate, todayAdDate);
                {{--                @endif--}}
            });
        </script>
    @endpush
</div>
