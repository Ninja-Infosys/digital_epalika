@props(['form-data-type', 'map-apply', 'form'])
<div class="row">
    @foreach ($mapApply->formStores?->where('form_data_id', $formDataType->id)?->where('form_id', $form->id) as $formStore)
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
                                    @if(!empty($formStore->document))
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                data-bs-target="#view_data{{ $formStore->id }}">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    @endif
                                    <!-- view file model pass url dynamically in the model-->
                                    <div class="modal fade" id="view_data{{ $formStore->id }}" tabindex="-1"
                                         aria-labelledby="fileLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <iframe src="{{$formStore->document_url}}" style="height: 100%;width: 100%;"></iframe>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">बन्द
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                                <td>{{$formStore->created_at->toDateString() }}</td>
                                <td>{{ $formStore->status->label()??'' }}</td>
                                <td>

                                    @if($formStore->status ==  Modules\EMap\Enums\DocumentStatusEnum::PENDING || $formStore->status ==  Modules\EMap\Enums\DocumentStatusEnum::REVIEW)
                                        @if(auth()->user()->role->type === 'Super' || $checkAuthorization)
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#status_model{{ $formStore->id }}">
                                                <i class="fa fa-pen-nib"></i>
                                            </button>
                                        @endif
                                    @endif
                                    @if($formStore->status ==  Modules\EMap\Enums\DocumentStatusEnum::APPROVED && !$formStore->approved_document)
                                        @if(auth()->user()->id == 1 || $checkAuthorization)
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    title="स्वीकार गरेको छाप अपलोड गर्नुहोस"
                                                    data-bs-target="#upload-approval-form-store-stamp{{ $formStore->id }}">
                                                <i class="fa fa-check-square"></i>
                                            </button>
                                        @endif
                                    @endif

                                    @if($formStore->approved_document)
                                        <i class="fa fa-check-circle text-success"> </i> Stamp
                                    @endif

                                </td>
                            </tr>

                            <!-- reject model -->
                            <div class="modal fade" id="status_model{{ $formStore->id }}" tabindex="-1"
                                 aria-labelledby="statusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="statusLabel">तपाईं यसलाई किन अस्वीकार गर्दै
                                                हुनुहुन्छ?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST"
                                                  action="{{ route('emap.admin.mapApply.admin-step.updateFormStoreStatus',[$mapApply,$form,$formDataType,$formStore]) }}">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="status" class="form-label">स्थिति</label>
                                                    <select class="form-select form-select-sm" name="status"
                                                            id="status_" aria-label="status">
                                                        <option value="" disabled selected>--- छान्नुहोस् ---</option>
                                                        @foreach (Modules\EMap\Enums\DocumentStatusEnum::cases() as $value)
                                                            <option
                                                                value="{{ $value->value }}">{{ $value->label() }}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="comment" class="form-label">टिप्पणी</label>
                                                    <textarea class="form-control" name="comment" id="comment"
                                                              rows="3"></textarea>
                                                    @error('comment')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">बन्द
                                                    </button>
                                                    <button type="submit" class="btn btn-primary">पेश गर्नुहोस्</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- approved signature modal -->
                            <div class="modal fade" id="upload-approval-form-store-stamp{{ $formStore->id }}" tabindex="-1" aria-labelledby="statusLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="status_model_applied">स्वीकार गरेको छाप अपलोड गर्नुहोस </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="POST" action="{{ route('emap.admin.mapApply.admin-step.uploadFormStoreApprovedDocument',[$mapApply,$form,$formDataType,$formStore]) }}" enctype="multipart/form-data">
                                                @csrf
                                                @method('put')
                                                <div class="mb-3">
                                                    <label for="approved_document" class="form-label">स्वीकार गरेको छाप</label>
                                                    <input type="file" name="approved_document" id="approved_document" class="form-control" required>
                                                    @error('approved_document')
                                                    <p class="text-danger">{{$message}}</p>
                                                    @enderror
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
                            @foreach ($formStore->load('formStoreStatuses')->formStoreStatuses as $formStoreStatus)
                                <tr>
                                    <td>{{ get_nepali_number($loop->iteration) }}</td>
                                    <td>
                                        @if(!empty($formStoreStatus->document))
                                            <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                                    data-bs-target="#view_data_status{{ $formStoreStatus->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        @endif
                                        <!-- view file model pass url dynamically in the model-->
                                        <div class="modal fade" id="view_data_status{{ $formStoreStatus->id }}"
                                             tabindex="-1" aria-labelledby="fileLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <iframe src="{{$formStoreStatus->document_url}}" style="height: 100%;width: 100%;"></iframe>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">बन्द
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $formStoreStatus->created_at->toDateString() }}
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
