$(document).ready(function () {
    $('.cacheButton').on('click', function (e) {
        const cacheButton = $("#cacheBtn");
        e.preventDefault()
        $.ajax({
            method: "GET",
            url: $(this).attr("data"),
            beforeSend: function() {
                cacheButton.attr('disabled', true);
                cacheButton.html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success: function (response) {
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
                cacheButton.attr('disabled', false);
                cacheButton.html("<i class='fas fa-brush'></i>");
            }, error: function () {
                cacheButton.attr('disabled', false);
                cacheButton.html("<i class='fas fa-brush'></i>");
            }
        });
    })
    $('.ckEditor').each(function (){
        ClassicEditor.create(document.getElementById(this.id), {
            licenseKey: '',
        })
            .then(editor => {
                window.editor = editor;
            })
            .catch(error => {
                console.error(error);
            });
    })
})
function copyText(element) {
    navigator.clipboard.writeText(element);
}
