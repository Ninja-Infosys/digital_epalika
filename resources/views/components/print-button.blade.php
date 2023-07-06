<div>
    <button class="btn {{ $btnClass }}"
            onclick="printForm()">
        <i class="fa fa-print"> {{ $btnLabel }}</i>
    </button>
    <div class="d-none header-content">
        @if($headerRequired)
            {!! letterHead($headerType) !!}
        @endif
    </div>
    <script>
        function printForm() {
            printJS({
                printable: '{{$targetElement}}',
                type: 'html',
                documentTitle: '{{$title}}',
                showModal: true,
                header: $('.header-content').html(),
                targetStyles: ['*'],
                css: ['{{asset('assets/backend/css/bootstrap.min.css')}}','{{asset('assets/backend/css/app.min.css')}}'],
                scanStyles: false,
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'
            })
        }
    </script>
</div>
