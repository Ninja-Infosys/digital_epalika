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
                            <th class="w-25">स्थिति</th>
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
                                <div class="input-group">
                                        <select class="form-select form-select-sm" name="form_status" id="form_status"
                                            aria-label="Form Status">
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
