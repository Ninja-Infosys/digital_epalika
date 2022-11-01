<div>
    <button class="btn btn-primary float-right" onclick="printJS({
                    printable: 'printData',
                    type: 'html',
                    documentTitle: '{{$title}}',
                    showModal: true,
                    css: '{{asset('assets/backend/css/print.css')}}',
                    honorMarginPadding : false,
                    modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।'})">
        <i class="fa fa-print"></i> Print
    </button>
</div>
