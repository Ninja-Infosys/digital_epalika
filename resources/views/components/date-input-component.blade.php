<div class="row">
    <div class="col-md-{{$showEnglishDate?'6':'12'}}">
        <label for="{{$nameNe}}">{{$labelNe}}</label>
        <input type="text" name="{{$nameNe}}"
               class="form-control @error($nameNe) is-invalid @enderror"
               placeholder="{{$labelNe}}"
               id="{{$nameNe}}" value="{{old($nameNe, ($editDateNe))}}">
        @error($nameNe)
        <span class="text-danger">{{$message}}</span>
        @enderror
        @error($nameEn)
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div @class([
        'col-md-6'=>$showEnglishDate,
        'd-none'=>!$showEnglishDate,
])>

        <label for="{{$nameEn}}">{{$labelEn}}</label>

        <input type="date" name="{{$nameEn}}"
               class="form-control @error($nameEn) is-invalid @enderror"
               placeholder="{{$labelEn}}"
               id="{{$nameEn}}" value="{{old($nameEn, ($editDateEn ?? ''))}}">
        @error($nameEn)
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#{{$nameNe}}").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let parsedDate = NepaliFunctions.ParseDate($("#{{$nameNe}}").val());
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        $("#{{$nameEn}}").val(formattedDate)
                    }
                });

                $("#{{$labelEn}}").change(function () {
                    let parsedDate = NepaliFunctions.ParseDate($("#{{$labelEn}}").val());
                    let nepaliDate = NepaliFunctions.AD2BS(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(nepaliDate, "YYYY-MM-DD")
                    $("#{{$nameNe}}").val(formattedDate)
                })

                @if($getTodayDate)
                let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                $('#{{$nameNe}}').val(todayBsDate)
                let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
                $('#{{$nameEn}}').val(todayAdDate)
                @endif
            });
        </script>
    @endpush
</div>
