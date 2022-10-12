$("#printButton").on('click', function (event) {
    event.preventDefault();
    const elementId = $(this).attr('printElementId')
    let data = document.getElementById(elementId).innerHTML;
    let _token = $('meta[name="csrf-token"]').attr('content');
    if (data) {
        $.ajax({
            url: $(this).attr('requestRoute'),
            type: "POST",
            data: {
                data: data,
                _token: _token
            },
            success: function (response) {
                const w = window.open("", "", "width,height");
                w.document.write(response);
                w.document.close();
                w.focus();
            },
            error: function (error) {
                console.log(error);

            }
        });
    }
});
