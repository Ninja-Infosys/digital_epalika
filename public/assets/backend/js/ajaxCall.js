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
        const second_header = document.createElement("tr");
        headerData.forEach(element => {
            const headerCell = document.createElement("th");
            if (element.children.length) {
                headerCell.colSpan = element.children.length
            }
            if (headerData.some(data => data.children.length) && !element.children.length) {
                headerCell.rowSpan = 2
            }
            const cellHeader = document.createTextNode(element.title);
            headerCell.appendChild(cellHeader);
            header.appendChild(headerCell);
            element.children.forEach(sub_element => {
                const sub_headerCell = document.createElement("th");
                const sub_cellHeader = document.createTextNode(sub_element);
                sub_headerCell.appendChild(sub_cellHeader);
                second_header.appendChild(sub_headerCell);
            })
        });
        thead.appendChild(header);
        tbl.appendChild(thead)

        thead.appendChild(second_header);
        tbl.appendChild(thead)

        const tbody = document.createElement("tbody");

        let convertedBodyData = bodyData.map(body => {
            let body_data = []
            let rowSpan = 0
            const arrayData = body.filter(sub => Array.isArray(sub))
            rowSpan = arrayData.reduce((max, arr) => {
                return Math.max(max, arr.length);
            }, 0);
            body.forEach((data) => {
                if (Array.isArray(data)) {
                    let dataArr = []
                    for (let i = 0; i < rowSpan; i++) {
                        let firstElements = arrayData.map(innerArr => innerArr[i] ?? []);
                        const colSpan = firstElements.reduce((max,arr)=>{
                            return Math.max(max,arr.length)
                        },0)
                        let elmArray=[]
                        firstElements.forEach(el=>{
                            let elArray=[]
                            for (let j=0;j<colSpan;j++){
                                elArray.push(el[j]??'')
                            }
                            elmArray.push(elArray)
                        })
                        console.log(firstElements,colSpan)
                        dataArr.push(elmArray)
                    }
                    let checkArrayExists = body_data.filter(b => Array.isArray(b) && b.length)

                    if (!checkArrayExists.length) {
                        body_data.push(dataArr)
                    }
                } else {
                    body_data.push(data)
                }
            })
            return body_data
        })
        console.log(convertedBodyData)

        convertedBodyData.forEach(data => {
            const row = document.createElement("tr");
            let rowSpan = 0
            const arrayData = data.filter(sub => Array.isArray(sub) && sub.length)
            rowSpan = arrayData.reduce((max, arr) => {
                return Math.max(max, arr.length);
            }, 0);

            data.forEach(sub_data => {
                if (Array.isArray(sub_data) && sub_data.length) {
                    sub_data[0].forEach(next_sub_data => {
                        if (Array.isArray(next_sub_data)) {
                            next_sub_data.forEach(el => {
                                appendCellData(row, el)
                            })
                        } else {
                            appendCellData(row, next_sub_data)
                        }
                    })
                    if (sub_data.slice(1).length) {
                        sub_data.slice(1).forEach(next_sub_data => {
                            const sub_row = document.createElement("tr");
                            if (Array.isArray(next_sub_data)) {
                                next_sub_data.forEach(el => {
                                    if (Array.isArray(el)) {
                                        el.forEach(sub_el => {
                                            appendCellData(sub_row, sub_el)
                                        })
                                    } else {
                                        appendCellData(sub_row, el)
                                    }
                                })
                            } else {
                                appendCellData(sub_row)
                            }
                            tbody.appendChild(sub_row)
                        })
                    }
                } else {
                    appendCellData(row, sub_data, rowSpan)
                    tbody.appendChild(row);
                }
            })
            //add the row to the end of the table body
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

function appendCellData(target_element, data = '', rowSpan = 0) {
    const cell = document.createElement("td");
    if (rowSpan > 0) {
        cell.rowSpan = rowSpan
    }
    const cellText = document.createTextNode(data);
    cell.appendChild(cellText);
    target_element.appendChild(cell);
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
            headerData.push({
                title: key,
                children: data[0][key] instanceof Array && data[0][key].length ? Object.keys(data[0][key][0]) : []
            })
        })
        data.forEach((value, index) => {
            let tempData = []
            headerData.forEach((head => {
                if (data[index][head.title] instanceof Array) {
                    let mainChildArray = []
                    data[index][head.title].forEach(sub_data => {
                        let childArray = []
                        Object.values(sub_data).forEach(sub_value => {
                            childArray.push(sub_value)
                        })
                        mainChildArray.push(childArray)
                    })
                    tempData.push(mainChildArray)
                } else {
                    tempData.push(data[index][head.title])
                }
            }))
            bodyData.push(tempData)
        })
        //console.log(headerData)
        console.log(bodyData)
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
