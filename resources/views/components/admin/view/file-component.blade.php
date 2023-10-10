@props(['form-data-type', 'map-apply', 'form'])
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="header-title">
                    {{ $formDataType->model?->title }} विवरण
                </h4>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>क्र.स</th>
                            <th>फाइल</th>
                            <th>मिति</th>
                            <th class="w-25">स्थिति</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formDataType->appliedDocuments->load('appliedMapFiles') as $appliedDocument)
                            <tr>
                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                <td>
                                    @foreach ($appliedDocument->appliedMapFiles as $appliedMapFile)
                                        <a href="#"><i class="fa fa-eye"></i></a>
                                    @endforeach
                                </td>
                                <td>{{ $appliedDocument->created_at->toDateString() }}</td>
                                <td><div class="input-group">
                                        <select class="form-select form-select-sm" name="file_status" id="file_status"
                                            aria-label="FIle Status">
                                            <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                            <option value="Pending">प्रक्रियामा</option>
                                            <option value="Accept">स्वीकार</option>
                                            <option value="Reject">अस्वीकार</option>
                                        </select>
                                        <button class="btn btn-sm btn-outline-primary" type="submit">पेश गर्नुहोस्</button>
                                    </div>
                                    </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
