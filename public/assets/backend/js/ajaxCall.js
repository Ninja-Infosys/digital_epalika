function createTable(data) {


    // Get the reference for the body
    const tableDiv = document.getElementById("report-table");

if (data.length > 0) {

    // creates a <table> element
    const tbl = document.createElement("table");
    tbl.className = "table table-hover table-striped table-bordered table-responsive";

    const header = document.createElement("tr");
    getHeaderArray(data[0]).forEach((element, index) => {
        const headerCell = document.createElement("th");
        const cellHeader = document.createTextNode(element);
        headerCell.appendChild(cellHeader);
        header.appendChild(headerCell);
    });
    tbl.appendChild(header);

    // console.log(row);

    // creating rows
    data.forEach((list, index) => {

        const row = document.createElement("tr");

        for (const property in list) {
            const cell = document.createElement("td");
            const cellText = document.createTextNode(list[property]);
            cell.appendChild(cellText);
            row.appendChild(cell);
        }


        // add the row to the end of the table body
        tbl.appendChild(row);
    });

    // put the <table> in the <body>
    tableDiv.appendChild(tbl);
    return tableDiv;

} else {
    const noData = document.createElement("h3");
    noData.className = "text-center";
    noData.innerHTML = "No Data Found";
    tableDiv.appendChild(noData);
    return tableDiv;
}

}

function getHeaderArray(array = []) {
    let keys = [];
    for (let key in array) {
        if (Array.isArray(array[key])) {
            keys = keys.concat(getArrayKeys(array[key]));
        } else {
            keys.push(key);
        }
    }

    return [...new Set(keys)];
}


// make ajax call from the form with report-filter-form id and data-url attribute for url in js
$(document).ready(function () {
    // x-csrf protection
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document.body).delegate('#report-filter-form', 'submit', function (e) {
        e.preventDefault()
        // get attribute data-bs-url from form and assign it to const variable url
        const url = $(this).attr('data-bs-url');
        $.ajax({
            type: "post",
            url: url,
            data: new FormData(this),
            processData: false,
            contentType: false,
            beforeSend: function () {
                $("#submitFormBtn").prop('disabled', true);
                $("#submitFormBtn").html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success: function (resp) {
                // console.log(resp);
                $("#submitFormBtn").prop('disabled', false);
                $("#collapseFilterForm").collapse('hide')
                $("#submitFormBtn").html("पेश गर्नुहोस्");
                console.log(createTable(resp.lists));
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('#submitFormBtn').prop('disabled', false)
                $("#submitFormBtn").html("पेश गर्नुहोस्");
                toastMessage('error', XMLHttpRequest.responseJSON.message)
            }
        });
    })

    function toastMessage(type, title) {
        swal.fire({
            title: title,
            toast: true,
            position: 'top-right',
            showConfirmButton: false,
            width: 450,
            timer: 3000,
            timerProgressBar: true,
            icon: type,
        });
    }
});
