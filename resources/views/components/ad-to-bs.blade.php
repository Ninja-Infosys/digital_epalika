<div>
    <span id="ad-to-bs{{$id}}"></span>
    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
        @endpush
    @endonce
    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function () {
                let parsedDate = NepaliFunctions.ParseDate('{{$adDate}}');
                let englishDate = NepaliFunctions.AD2BS(parsedDate.parsedDate)
                let formattedDate = NepaliFunctions.ConvertDateFormat(englishDate, "YYYY-MM-DD")
                $("#ad-to-bs{{$id}}").html(NepaliFunctions.ConvertToUnicode(formattedDate))
            });
        </script>
    @endpush
</div>
