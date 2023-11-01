@props(['form-data-type', 'map-apply', 'form'])
<div class="row">
    @foreach ($formDataType->formStores as $formStore)
    <div class="col-md-6">
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
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>

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
                                    <td>{{ $formStore->status->label()??'' }}</td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#status_model{{ $formStore->id }}">
                                            <i class="fa fa-fa-pen-nib"></i>
                                        </button>

                                    </td>
                                </tr>

                                   <!-- reject model -->
                                   <div class="modal fade" id="status_model{{ $formStore->id }}" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="statusLabel">तपाईं यसलाई किन अस्वीकार गर्दै हुनुहुन्छ?</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                            <form method="POST" action="{{ route('emap.admin.mapApply.admin-step.updateFormStoreStatus',$formStore) }}">
                                                @csrf
                                                @method('put')
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">स्थिति</label>
                                                            <select class="form-select form-select-sm" name="status" id="status_" aria-label="status">
                                                                <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                                                @foreach (Modules\EMap\Enums\DocumentStatusEnum::cases() as $value)
                                                                <option value="{{ $value->value }}">{{ $value->label() }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="comment" class="form-label">टिप्पणी</label>
                                                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बन्द</button>
                                                            <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                                                        </div>
                                                    </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
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
                            @foreach ($formStore->formStoreStatuses as $formStoreStatus)
                            <tr>
                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                <td>  @foreach ($formStoreStatus->data as $key => $data)
                                    {{ $key . ': ' . $data }} @if (!$loop->last)
                                        <br>
                                    @endif
                                @endforeach</td>
                                <td>
                                    {{ get_nepali_number($formStoreStatus->created_at->toDateString()) }}
                                </td>
                                <td>
                                   {{ $formStoreStatus->status->label()??'' }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
