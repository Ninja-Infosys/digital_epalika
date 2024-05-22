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
                        <h4 class="header-title">उधोग दर्ता प्रतिवेदन</h4>
                        <div class="d-flex gap-1 justify-content-between">
                            <button class="btn btn-sm btn-outline-secondary waves-effect waves-light collapsed"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilterForm"
                                    aria-expanded="false" aria-controls="collapseExample">
                                <i class="fa fa-filter"> फिल्टर</i>
                            </button>
                            <x-html-to-excel file-name="संस्था रिपोर्ट" target-table="industry-report-table" />
                            <x-print-button target-element="industry-report-table" title="संस्था रिपोर्ट" :headerRequired="true" />
                        </div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <div class="collapse show mb-2" id="collapseFilterForm">
                        <form id="report-filter-form"
                              data-bs-url="{{ route('admin.businessRegistration.industryReport.report-data') }}">
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
                                    <label for="name">उधोगको नाम</label>
                                    <select name="name[]" multiple data-toggle="select2" id="name" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->name }}">{{ $industry->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <label for="type">उधोगको वर्ग</label>
                                    <select name="type[]" multiple data-toggle="select2" id="type" class="form-control">
                                        <option disabled>--- छान्नुहोस् ---</option>
                                        @foreach ($industryCategories as $industryCategory)
                                            <option value="{{ $industryCategory->id }}">{{ $industryCategory->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" id="submitFormBtn" class="btn btn-primary">
                                पेश गर्नुहोस्
                            </button>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <div id="industry-report-table"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            function createTable(headerData, bodyData) {
                const tableDiv = document.getElementById("industry-report-table");
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
                    headerCell.className = 'text-nowrap';
                    const cellHeader = document.createTextNode(element);
                    headerCell.appendChild(cellHeader);
                    header.appendChild(headerCell);
                });

                const headerLength = headerData.length;
                thead.appendChild(header);
                table.appendChild(thead);

                bodyData.forEach((element, key) => {
                    const row = document.createElement("tr");

                    const snCell = document.createElement("td");
                    snCell.innerHTML = key + 1;
                    row.appendChild(snCell);

                    const childRow = document.createElement("tr");
                    const DataTd = document.createElement("td");
                    DataTd.setAttribute("colspan", headerLength + 1);

                    const DivElement = document.createElement("div");
                    DivElement.setAttribute("class", "row");

                    const UlElement = document.createElement("ul");
                    UlElement.setAttribute("class", "report-data-wrapper");

                    Object.entries(element).forEach(([key, value]) => {
                        if (Array.isArray(value)) {
                            const LiElement = document.createElement("li");
                            const DetailMainDivElement = document.createElement("div");
                            DetailMainDivElement.setAttribute("class", "report-data");

                            const FieldSetElement = document.createElement("fieldset");
                            const LegendElement = document.createElement("legend");
                            LegendElement.innerHTML = key;
                            FieldSetElement.appendChild(LegendElement);

                            const tableDataDiv = document.createElement("div");

                            if (value.length > 0) {
                                const childTable = document.createElement("table");
                                childTable.setAttribute("class", "table table-bordered table-condensed mb-2");

                                const childTHead = document.createElement("thead");
                                const childTHeader = document.createElement("tr");

                                Object.keys(value[0]).forEach((childElement) => {
                                    const childHeaderCell = document.createElement("th");
                                    const childCellHeader = document.createTextNode(childElement);
                                    childHeaderCell.appendChild(childCellHeader);
                                    childTHeader.appendChild(childHeaderCell);
                                });

                                childTHead.appendChild(childTHeader);
                                childTable.appendChild(childTHead);

                                const childBody = document.createElement("tbody");

                                value.forEach((child) => {
                                    const childRow = document.createElement("tr");
                                    Object.values(child).forEach((childValue) => {
                                        const childDataCell = document.createElement("td");
                                        const cellData = document.createTextNode(childValue);
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
                            const cellData = document.createTextNode(value);
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

            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document.body).delegate('#report-filter-form', 'submit', function(e) {
                    e.preventDefault()
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
