function createTable(headerData, bodyData) {
    // Get the reference for the body
    const tableDiv = document.getElementById("report-table");

    // remove all data from tableDiv
    tableDiv.innerHTML = "";

    if (bodyData.length > 0) {

        // creates a <table> element
        const tbl = document.createElement("table");
        tbl.className = "table table-sm table-hover table-striped table-bordered table-responsive";

        const thead = document.createElement("thead");
        const header = document.createElement("tr");
        headerData.forEach(element => {
            const headerCell = document.createElement("th");
            const cellHeader = document.createTextNode(element);
            headerCell.appendChild(cellHeader);
            header.appendChild(headerCell);
        });
        thead.appendChild(header);
        tbl.appendChild(thead)

        const tbody = document.createElement("tbody");
        // creating rows
        bodyData.forEach(data => {
            const row = document.createElement("tr");
            data.forEach(element => {
                const cell = document.createElement("td");
                const cellText = document.createTextNode(element);
                cell.appendChild(cellText);
                row.appendChild(cell);
            });

            // add the row to the end of the table body
            tbody.appendChild(row);
            tbl.appendChild(tbody);
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
                $("#submitFormBtn").prop('disabled', false);
                $("#collapseFilterForm").collapse('hide')
                $("#submitFormBtn").html("पेश गर्नुहोस्");
                assignResponseData(resp.data)
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $('#submitFormBtn').prop('disabled', false)
                $("#submitFormBtn").html("पेश गर्नुहोस्");
                toastMessage('error', XMLHttpRequest.responseJSON.message)
            }
        });
    })

    function assignResponseData(data) {
        let headerData = [];
        let bodyData = [];
        Object.keys(data[0] ?? {}).forEach(key => {
            if (data[0][key] !== '' || null) {
                headerData.push(key)
            }
        })
        data.forEach((value, index) => {
            let tempData = []
            headerData.forEach((head => {
                tempData.push(data[index][head])
            }))
            bodyData.push(tempData)
        })
        createTable(headerData, bodyData)
    }

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
