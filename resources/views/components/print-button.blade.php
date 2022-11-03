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
                modalMessage: 'तपाईंको कागजात छाप्नको लागि तयार हुँदैछ।',
                header: '<div class="row"><div class="col-md-2"><img height="100" width="110" src="{{asset('images/np.png')}}"></div>' +
                    '<div class="col-md-8 text-center"><span><span class="fw-bold">{{$setting->localBody->local_body??''}}</span><br>वार्ड न {{$setting->ward_no}} को कार्यालय (वडाबाट चलेको अवस्थामा)<br>{{$setting->name}} (कार्यालय रहेको स्थान {{$setting->district->district??''}} (जिल्ला) <br>{{$setting->province->province??''}},नेपाल</span></div><div class="col-md-2"></div>'+
                    '</div>',
                style: '.col-md-8 { width: 66.66666667%; }',
            })
        }
    </script>
</div>
