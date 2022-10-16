<div class="row">
    <div class="col-md-{{$show_english_date?'6':'12'}}">
        <label for="{{$name_ne}}">{{$label_ne}}</label>
        <input type="text" name="{{$name_ne}}" class="form-control @error($name_ne) is-invalid @enderror"
               id="{{$name_ne}}" value="{{old($name_ne, ($edit_date_ne ?? ''))}}">
        @error($name_ne)
        <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
    <div @class([
        'col-md-6'=>$show_english_date,
        'd-none'=>!$show_english_date,
])>

        <label for="{{$name_en}}">{{$label_en}}</label>

        <input type="date" name="{{$name_en}}"
               class="form-control @error($name_en) is-invalid @enderror"
               id="{{$name_en}}" value="{{old($name_en, ($edit_date_en ?? ''))}}">
        @error($name_en)
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
                $("#{{$name_ne}}").nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    onChange: function () {
                        let parsedDate = NepaliFunctions.ParseDate($("#{{$name_ne}}").val());
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        $("#{{$name_en}}").val(formattedDate)
                    }
                });

                $("#{{$name_en}}").change(function () {
                    let parsedDate = NepaliFunctions.ParseDate($("#{{$name_en}}").val());
                    let nepaliDate = NepaliFunctions.AD2BS(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(nepaliDate, "YYYY-MM-DD")
                    $("#{{$name_ne}}").val(formattedDate)
                })

                @if($get_today_date)
                let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                $('#{{$name_ne}}').val(todayBsDate)
                let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
                $('#{{$name_en}}').val(todayAdDate)
                @endif
            });
        </script>
    @endpush
</div>
