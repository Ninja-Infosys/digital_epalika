@extends('admin.layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.businessRegistration.dashboard') }}">
                                <img class="icon me-1" src="{{ asset('assets/backend/images/home.svg') }}" alt="document-icon">
                                गृहपृष्ठ
                            </a>
                        </li>
                        <li class="breadcrumb-item active"> प्रतिवेदनहरु</li>
                    </ol>
                </div>
                <h4 class="page-title"> प्रतिवेदनहरु </h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title">फर्म दर्ता प्रतिवेदन</h4>
                        <div class="d-flex gap-1 justify-content-between">
                            <button class="btn btn-sm btn-outline-secondary waves-effect waves-light collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilterForm"
                                    aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-filter"> फिल्टर</i>
                            </button>
                            <x-html-to-excel file-name="फर्म रिपोर्ट" target-table="forum-report-table" />
                            <x-print-button target-element="forum-report-table" title="फर्म रिपोर्ट" :headerRequired="true" />
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="collapse show mb-2" id="collapseFilterForm">
                        <form id="report-filter-form"
                              data-bs-url="{{ route('admin.businessRegistration.forumReport.forum-report-data') }}">
                            <div class="row">
                                <div class="col-md-3 mb-2">
                                    <x-date-input-component nameNe="from_date" labelNe="मिति देखि" nameEn="en_from_date"
                                                            labelEn="From Date" :get-today-date="false" />
                                </div>
                                <div class="col-md-3">
                                    <x-date-input-component nameNe="to_date" labelNe="मिति सम्म" nameEn="en_to_date"
                                                            labelEn="To Date" :get-today-date="false" />
                                </div>
                                <div class="col-md-3">
                                    <label for="fiscal_year">आर्थिक बर्ष</label>
                                    <select name="fiscal_year[]" multiple data-toggle="select2" id="fiscal_year"
                                            class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($fiscalYears as $fiscalYear)
                                            <option value="{{ $fiscalYear->id }}">{{ $fiscalYear->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="name">फर्मको नाम</label>
                                    <select name="name[]" multiple data-toggle="select2" id="name"
                                        class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($forums as $forum)
                                            <option value="{{ $forum->name }}">{{ $forum->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="col-md-3">
                                    <label for="registration_no">दर्ता नं.</label>
                                    <select name="registration_no[]" multiple data-toggle="select2" id="registration_no"
                                        class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($forums as $forum)
                                            <option value="{{ $forum->registration_no }}">{{ $forum->registration_no }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="type">फर्मको प्रकार</label>
                                    <select name="type[]"  multiple data-toggle="select2"   id="type"   class="form-control">
                                        <option value="">---छान्नुहोस् ----</option>
                                        @foreach (\Modules\BusinessRegistration\Enums\ForumTypeEnum::cases() as $case)
                                            <option value="{{ $case->value ?? '' }}">{{ $case->label() ?? '' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <button type="submit" id="submitFormBtn" class="btn btn-primary mt-2">
                                पेश गर्नुहोस्
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <div id="forum-report-table"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function createTable(headerData, bodyData) {
                const tableDiv = document.getElementById("forum-report-table");
                tableDiv.innerHTML = "";

                const table = document.createElement("table");
                table.className = "table table-bordered table-striped table-condensed";

                const thead = document.createElement("thead");
                const tBody = document.createElement("tbody");

                const header = document.createElement("tr");
                const SnCell = document.createElement("th");
                SnCell.innerHTML = "क्र.सं.";
                header.appendChild(SnCell);
                headerData.forEach((element) => {
                    const headerCell = document.createElement("th");
                    headerCell.className = 'text-nowrap'
                    const cellHeader = document.createTextNode(element);
                    headerCell.appendChild(cellHeader);
                    header.appendChild(headerCell);
                });

                const headerLength = headerData.length;
                thead.appendChild(header);
                table.appendChild(thead);

                bodyData.forEach((element, key) => {

                    const row = document.createElement("tr");

                    const cell = document.createElement("td");

                    cell.innerHTML = key + 1;

                    row.appendChild(cell);
                    table.appendChild(row);
                    const childRow = document.createElement("tr");
                    // hidden
                    // if (Object.values(element).some(Array.isArray)) {
                    childRow.className = " tr-detail" + key;
                    childRow.id = "tr-detail" + key;
                    const SnTd = document.createElement("td");
                    childRow.appendChild(SnTd);

                    const DataTd = document.createElement("td");
                    DataTd.colSpan = headerLength;

                    const DivElement = document.createElement("div");
                    DivElement.className = "detail-content";

                    const UlElement = document.createElement("ul");
                    // }
                    Object.entries(element).forEach((value, index) => {
                        if (value[1] instanceof Array) {
                            const LiElement = document.createElement("li");

                            const EmptyDivElement = document.createElement("div");
                            EmptyDivElement.className = "detail";
                            LiElement.appendChild(EmptyDivElement);

                            const DetailMainDivElement = document.createElement("div");
                            DetailMainDivElement.className = "detail detail-main";

                            const FieldSetElement = document.createElement("fieldset");
                            const LegendElement = document.createElement("legend");
                            const SpanElement = document.createElement("span");
                            SpanElement.className = "bg-primary rounded px-1 text-white";
                            SpanElement.innerHTML = value[0];
                            LegendElement.appendChild(SpanElement);
                            FieldSetElement.appendChild(LegendElement);

                            const tableDataDiv = document.createElement("div");
                            tableDataDiv.innerHTML = "";
                            if (value[1].length > 0) {
                                const childTable = document.createElement("table");
                                childTable.className = "table table-bordered table-striped table-condensed";
                                const childThead = document.createElement("thead");
                                const childBody = document.createElement("tbody");
                                const childHeader = document.createElement("tr");
                                const childHeaderSnCell = document.createElement("th");
                                childHeaderSnCell.innerHTML = "क्र.सं";
                                childHeader.appendChild(childHeaderSnCell);
                                Object.keys(value[1][0]).forEach((element) => {
                                    const childHeaderCell = document.createElement("th");
                                    const cellHeader = document.createTextNode(element);
                                    childHeaderCell.appendChild(cellHeader);
                                    childHeader.appendChild(childHeaderCell);
                                });
                                childThead.appendChild(childHeader);
                                childTable.appendChild(childThead);

                                Object.values(value[1]).forEach((element, key) => {
                                    const childRow = document.createElement("tr");

                                    const childSnDataCell = document.createElement("td");
                                    childSnDataCell.innerHTML = key + 1;
                                    childRow.appendChild(childSnDataCell);
                                    Object.values(element).forEach((value, index) => {
                                        const childDataCell = document.createElement("td");
                                        const cellData = document.createTextNode(value);
                                        childDataCell.appendChild(cellData);
                                        childRow.appendChild(childDataCell);
                                    });
                                    childBody.appendChild(childRow);
                                    childTable.appendChild(childBody);
                                });

                                tableDataDiv.appendChild(childTable);
                            } else {
                                tableDataDiv.innerHTML = "No Data Found";
                            }
                            FieldSetElement.appendChild(tableDataDiv);
                            DetailMainDivElement.appendChild(FieldSetElement);
                            LiElement.appendChild(DetailMainDivElement);
                            UlElement.appendChild(LiElement);
                        } else {
                            const dataCell = document.createElement("td");
                            const cellData = document.createTextNode(value[1]);
                            dataCell.appendChild(cellData);
                            row.appendChild(dataCell);
                        }
                    });
                    tBody.appendChild(row);
                    // if (Object.values(element).some(Array.isArray)) {
                    DivElement.appendChild(UlElement);
                    DataTd.appendChild(DivElement);
                    childRow.appendChild(DataTd);
                    // }
                    tBody.appendChild(childRow);
                });
                table.appendChild(tBody);
                tableDiv.appendChild(table);
                return tableDiv;
            }

            function getHeader(data) {
                let headerData = [];
                Object.keys(data[0] ?? {}).forEach((key) => {
                    if (!Array.isArray(data[0][key])) {

                        headerData.push(key);
                    }
                });
                return headerData;
            }

            // make ajax call from the form with report-filter-form id and data-url attribute for url in js
            $(document).ready(function() {
                // x-csrf protection
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document.body).delegate('#report-filter-form', 'submit', function(e) {
                    e.preventDefault()
                    // get attribute data-bs-url from form and assign it to const variable url
                    const url = $(this).attr('data-bs-url');
                    const submitFormBtn = $("#submitFormBtn");
                    const collapseFilterForm = $("#collapseFilterForm");
                    $.ajax({
                        type: "post",
                        url: url,
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        beforeSend: function() {
                            submitFormBtn.prop('disabled', true);
                            submitFormBtn.html("<i class='fa fa-spinner fa-spin'></i>");
                        },
                        success: function(resp) {
                            submitFormBtn.prop('disabled', false);
                            collapseFilterForm.collapse('hide')
                            submitFormBtn.html("पेश गर्नुहोस्");
                            console.log(resp.data);
                            const headerData = getHeader(resp.data);
                            createTable(headerData, resp.data)
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            submitFormBtn.prop('disabled', false)
                            submitFormBtn.html("पेश गर्नुहोस्");
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
        </script>
    @endpush
@endsection
