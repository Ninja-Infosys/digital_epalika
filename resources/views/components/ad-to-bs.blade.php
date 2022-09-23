<div>
    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                let parsedDate = NepaliFunctions.ParseDate({{$adDate}});
                let englishDate = NepaliFunctions.BS2AD(parsedDate.parsedDate)
                let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                $("#{{$id}}").val(formattedDate)
                console.log({{$id}})
                console.log({{$adDate}})
            });
        </script>
    @endpush
</div>
