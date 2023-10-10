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
                            <th>स्थिति</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formDataType->appliedDocuments->load('appliedMapFiles') as $appliedDocument)
                            <tr>
                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                <td>
                                    @foreach ($appliedDocument->appliedMapFiles as $appliedMapFile)
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#view_file">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    @endforeach
                                </td>
                                <td>{{ $appliedDocument->created_at->toDateString() }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#status_model">
                                        स्थिति
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
