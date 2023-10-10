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
                            <th>डाटा</th>
                            <th>मिति</th>
                            <th>स्थिति</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formDataType->formStores as $formStore)
                            <tr>
                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                <td>
                                    @foreach ($formStore->data as $key => $data)
                                        {{ $key . ': ' . $data }} @if (!$loop->last)
                                            <br>
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{ get_nepali_number($formStore->created_at->toDateString()) }}</td>
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
