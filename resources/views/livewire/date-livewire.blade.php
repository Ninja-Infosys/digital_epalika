<div class="row">
    <div class="col-md-6">
        <label for="{{$name_ne}}">{{$label_ne}} {{$nepali_date}}</label>
        <input type="text" name="{{$name_ne}}" wire:model="nepali_date" class="form-control" id="{{$name_ne}}">
    </div>
    <div class="col-md-6">
        <label for="{{$name_en}}">{{$label_en}}{{$english_date}}</label>
        <input type="date" name="{{$name_en}}" class="form-control" id="{{$name_en}}" wire:model="english_date">
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
                        let inputFieldDate = $("#{{$name_ne}}").val();
                        let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                        let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                        let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                        $("#{{$name_en}}").val(formattedDate);

                        Livewire.emit('postAdded', inputFieldDate, formattedDate);
                    }
                });

                $("#{{$name_en}}").change(function () {
                    let inputFieldDate = $("#{{$name_en}}").val();
                    let parsedDate = NepaliFunctions.ParseDate(inputFieldDate);
                    let nepaliDate = NepaliFunctions.AD2BS(parsedDate.parsedDate)
                    let formattedDate = NepaliFunctions.ConvertDateFormat(nepaliDate, "YYYY-MM-DD")
                    $("#{{$name_ne}}").val(formattedDate);

                    Livewire.emit('postAdded', formattedDate, inputFieldDate);
                })


                let todayBsDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate(), "YYYY-MM-DD")
                let todayAdDate = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentAdDate(), "YYYY-MM-DD")
                Livewire.emit('postAdded', todayBsDate, todayAdDate);
            });
        </script>
    @endpush
</div>
