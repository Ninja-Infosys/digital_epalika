<div>
    <button class="btn btn-sm btn-outline-primary"
            onclick="printForm()">
        <i class="fa fa-print"> प्रिन्ट</i>
    </button>
    <script>
        function printForm() {
            printJS({
                printable: '{{$targetElement}}',
                type: 'html',
                documentTitle: '{{$title}}',
                showModal: true,
                targetStyles: ['*'],
                css: ['{{asset('assets/backend/css/bootstrap.min.css')}}','{{asset('assets/backend/css/app.min.css')}}'],
                scanStyles: false,
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'
            })
        }
    </script>
</div>
