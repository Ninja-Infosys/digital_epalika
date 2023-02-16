<div>
    <form action="{{route('admin.taskManagement.activity.store')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-2">
                <label for="date" class="form-label">मिति<span class="text-danger">*</span></label>
                <input
                    type="text"
                    wire:model="activity.date"
                    class="form-control"
                    id="date"
                    placeholder="मिति"
                />
                @error('activity.date')
                <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="col-md-12">
                <fieldset>
                    <legend>क्रियाकलाप</legend>
                    <button type="button" wire:click.prevent="addActivity">Add</button>
                    @foreach($activity['activity_lists'] as $index=>$activityList)
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <label for="title" class="form-label">शिर्षक *</label>
                                <input
                                    type="text"
                                    name="title"
                                    wire:model="activity.activity_lists.{{$index}}.title"
                                    class="form-control @error('title') is-invalid @enderror"
                                    id="title"
                                    placeholder="शिर्षक"
                                />
                                @error('activity.activity_lists.'.$index.'.title')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="documents" class="form-label">डकुमेन्ट </label>
                                <input
                                    type="file"
                                    name="activity.activity_lists.{{$index}}.documents[]"
                                    wire:model="activity.activity_lists.{{$index}}.documents"
                                    class="form-control @error('activity.activity_lists.'.$index.'documents') is-invalid @enderror"
                                    id="Documents"
                                    multiple/>
                                @error('activity.activity_lists.'.$index.'documents')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                                @error('activity.activity_lists.'.$index.'documents.*')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="activity.activity_lists.{{$index}}.description"
                                       class="form-label">विवरण</label>
                                <textarea name="activity[activity_lists][{{$index}}][description]"
                                          id="activity.activity_lists.{{$index}}.description" cols="30" rows="5"
                                          class="form-control ckEditor @error('remarks') is-invalid @enderror"
                                          placeholder="विवरण"></textarea>
                                @error('remarks')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-2">
                                <label for="remarks" class="form-label">कैफ़ियत</label>
                                <textarea name="activity.[activity_lists][{{$index}}][remarks]"
                                          wire:model="activity.activity_lists.{{$index}}.remarks"
                                          id="remarks" cols="30" rows="5"
                                          class="form-control @error('activity.activity_lists.'.$index.'remarks') is-invalid @enderror"
                                          placeholder="कैफ़ियत"></textarea>
                                @error('activity.activity_lists.'.$index.'remarks')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="button" wire:click.prevent="removeActivity({{$index}})">Remove</button>
                    @endforeach
                </fieldset>

            </div>

            <div class="col-md-12 mb-2">
                <label for="remarks" class="form-label">कैफ़ियत</label>
                <textarea name="remarks"
                          id="remarks" cols="30" rows="5"
                          class="form-control summernote @error('remarks') is-invalid @enderror"
                          placeholder="कैफ़ियत">{{old('remarks')}}</textarea>
                @error('remarks')
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
