@props(['building-form-data-type', 'building-documentation', 'form'])
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="header-title">
                    {{ $buildingFormDataType->model?->title }} विवरण
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
                            <th>कैफियत</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($buildingDocumentation->buildingDocuments
                        ?->where('building_documentation_step_id', $form->id)
                        ?->where('form_data_id', $buildingFormDataType->id)->load('documentFiles') as $buildingDocument)
                        <tr>
                            <td>{{ get_nepali_number($loop->iteration) }}</td>
                            <td class="d-flex gap-2">
                                @foreach ($buildingDocument->documentFiles as $documentFile)
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#view_file{{ $documentFile->id }}">
                                    <i class="fa fa-eye"></i>
                                </button>
                                <a href="{{ route('admin.file-url-download', ['file_url' => $documentFile->document]) }}"
                                    class="btn btn-xs btn-outline-primary">
                                    <i class="fa fa-download"></i>
                                </a>


                                <!-- view file model pass url dynamically in the model-->
                                <div class="modal fade" id="view_file{{ $documentFile->id }}" tabindex="-1"
                                    aria-labelledby="fileLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <iframe src="{{ $documentFile->document_url }}"
                                                    style="height: 100%;width: 100%;"></iframe>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">बन्द</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </td>
                            <td>{{ $buildingDocument->created_at->toDateString() }}</td>
                            <td>{{ $buildingDocument->status->label() ?? '' }}</td>
                            <td>{{ $buildingDocument->documentStatuses?->sortByDesc('id')->first()->comment ?? '' }}
                            </td>

                        </tr>
                        @endforeach



                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
