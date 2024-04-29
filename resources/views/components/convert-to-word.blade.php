<span id="unicode{{$id}}"></span>
@push('scripts')
    @once
        @push('scripts')
            <script src="{{asset('assets/backend/js/plugins/datepicker.min.js')}}"></script>
        @endpush
    @endonce
    <script type="text/javascript">
        $(document).ready(function () {
            $("#unicode{{$id}}").html(NepaliFunctions.NumberToWordsUnicode({{$number}}))
        });
    </script>
@endpush

