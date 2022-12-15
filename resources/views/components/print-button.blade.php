<div>
    <button class="btn btn-success float-right"
            onclick="printForm()">
        <i class="fa fa-print"></i> Print
    </button>
    <script>
        function printForm() {
            printJS({
                printable: 'printData',
                type: 'html',
                documentTitle: '{{$title}}',
                showModal: true,
                css: '{{asset('assets/backend/css/print.css')}}',
                honorMarginPadding: false,
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'
            })
        }
    </script>
</div>
