$('.show_confirm').click(function(event) {
    const form = $(this).closest("form");
    const name = $(this).data("name");
    event.preventDefault();

    Swal.fire({
        title: 'के तपाईँ निश्चित हुनुहुन्छ ?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'मेटाऊनु होस्',
        cancelButtonText: 'रदगर्नु होस्'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    })

});
