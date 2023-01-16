$(document).ready(function(){
    $("#staticBackdrop").modal("show");
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document.body).delegate('#pinData', 'submit',function(e){
        e.preventDefault();
        const pin = $("input[name=pin]").val();
        const submitButton = $("#submitBtn");
        const url = $(this).attr('data');
        $.ajax({
            url:url,
            method:'POST',
            data:{
                pin:pin,
            },
            beforeSend: function() {
                submitButton.attr('disabled', true);
                submitButton.html("<i class='fa fa-spinner fa-spin'></i> loading");
            },
            success:function(response){
                swal.fire({
                    title: response.message,
                    toast:true,
                    position:'top-right',
                    timer:3000,
                    showConfirmButton:false,
                    timerProgressBar:true,
                    width:400,
                    icon: 'success',
                });
                $('#staticBackdrop').modal('hide');

            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                submitButton.attr('disabled', false);
                submitButton.html("पेश गर्नुहोस्");
                $("#error_message").html(XMLHttpRequest.responseJSON.message);
            },
        });
    });
});
