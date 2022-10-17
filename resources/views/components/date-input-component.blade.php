<div class="row">
    <div class="col-md-{{$showEnglishDate?'6':'12'}}">
        <label for="{{$nameNe}}">{{$labelNe}}</label>
        <input type="text" name="{{$nameNe}}" class="form-control @error($nameNe) is-invalid @enderror"
               id="{{$nameNe}}" value="{{old($nameNe, ($edit_date_ne ?? ''))}}">
        @error($nameNe)
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div @class([
        'col-md-6'=>$showEnglishDate,
        'd-none'=>!$showEnglishDate,
])>

        <label for="{{$labelEn}}">{{$nameEn}}</label>

        <input type="date" name="{{$labelEn}}"
               class="form-control @error($labelEn) is-invalid @enderror"
               id="{{$labelEn}}" value="{{old($labelEn, ($edit_date_en ?? ''))}}">
        @error($labelEn)
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
                        $("#{{$labelEn}}").val(formattedDate)
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
                $('#{{$labelEn}}').val(todayAdDate)
                @endif
            });
        </script>
    @endpush
</div>
