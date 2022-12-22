<span id="unicode{{$id}}"></span>
@once
    @push('scripts')
        <script src="{{asset('assets/backend/js/nepali.datepicker.v3.7.min.js')}}"></script>
    @endpush
@endonce
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#unicode{{$id}}").html(NepaliFunctions.ConvertToUnicode({{$number}}))
        });
    </script>
@endpush

