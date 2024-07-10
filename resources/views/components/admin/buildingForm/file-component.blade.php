@props(['buildingFormDataType', 'buildingDocumentation', 'form'])

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="header-title">{{ $buildingFormDataType->model?->title }} थप्नुहोस् dsf</h4>
                    <div class="d-flex justify-content-between">
                        <a href="javascript:void(0)"
                           route_action="{{ route('emap.admin.printTemplate', [$buildingDocumentation, $form, $buildingFormDataType]) }}"
                           class="btn btn-primary btn-sm printDetail">
                            <i class="fa fa-print"></i> प्रिन्ट गर्नुहोस
                        </a>
                        <a href="{{ route('emap.admin.editTemplate', [$buildingDocumentation, $form, $buildingFormDataType]) }}"
                           class="btn btn-success btn-sm">
                            <i class="fa fa-pen"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($buildingDocumentation->buildingDocuments->where('building_documentation_step_id', $form->id)->where('form_data_id', $buildingFormDataType->id)->isEmpty())
                    <form action="{{ route('emap.admin.building-documentation.buildingDocument.store', [$buildingDocumentation, $form, $buildingFormDataType]) }}"
                          method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="documents" class="form-label">फाईल*</label>
                                <input type="file" name="documents[]"
                                       class="form-control @error('documents') is-invalid @enderror" id="documents" multiple />
                                @error('documents.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('documents')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                @else
                    <form action="{{ route('emap.admin.building-documentation.buildingDocument.update', [
                            $buildingDocumentation,
                            $form,
                            $buildingFormDataType,
                            $buildingDocumentation->buildingDocuments->where('building_documentation_step_id', $form->id)->sortByDesc('created_at')->first()->id
                        ]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-2">
                                <label for="documents" class="form-label">फाईल*</label>
                                <input type="file" name="documents[]"
                                       class="form-control @error('documents') is-invalid @enderror" id="documents" multiple />
                                @error('documents.*')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                @error('documents')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="header-title">{{ $buildingDocumentation->model?->title }} विवरण</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @foreach ($buildingDocumentation->buildingDocuments->where('building_documentation_step_id', $form->id)->where('form_data_id', $buildingFormDataType->id)->load('documentFiles') as $buildingDocument)
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>फाइल</th>
                                            <th>स्थिति</th>
                                            <th>मिति</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                @foreach ($buildingDocument->documentFiles as $documentFile)
                                                    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#view_file{{ $documentFile->id }}">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <div class="modal fade" id="view_file{{ $documentFile->id }}" tabindex="-1" aria-labelledby="fileLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <iframe src="{{ $documentFile->document_url }}" class="img-fluid" style="height: 100%; width: 100%;"></iframe>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">बन्द</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>{{ $buildingDocument->status->label() }}</td>
                                            <td>{{ get_nepali_number($buildingDocument->created_at->toDateString()) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>क्र.सं.</th>
                                            <th>फाइल</th>
                                            <th>स्थिति</th>
                                            <th>प्रतिक्रिया</th>
                                            <th>मिति</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($buildingDocument->documentStatuses->sortByDesc('created_at') as $documentStatus)
                                            <tr>
                                                <td>{{ get_nepali_number($loop->iteration) }}</td>
                                                <td>
                                                    @foreach ($documentStatus->documentFiles ?? [] as $documentFile)
                                                        <a href="#"><i class="fa fa-download"></i></a>
                                                    @endforeach
                                                </td>
                                                <td>{{ $documentStatus->status->label() ?? '' }}</td>
                                                <td>{{ $documentStatus->comment ?? '' }}</td>
                                                <td>{{ get_nepali_number($documentStatus->created_at->toDateString()) ?? '' }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
