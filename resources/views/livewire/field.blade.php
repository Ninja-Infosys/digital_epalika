<div>
    <fieldset>
        <legend>
            <h4 class="text-info">सिफारिस फाराम</h4>
        </legend>
        <div class="row">
            <div class="col-md-4 mb-2">
                <label for="mobile_user_id" class="form-label">व्यक्तिगत विवरण <span
                        class="text-danger">*</span></label>
                <div class="d-flex justify-content-between gap-1">
                    <select id="mobile_user_id" name="mobile_user_id" class="form-select personalDetail"
                        wire:model="mobile_user_id">
                        <option value="">-- छान्नुहोस् --</option>
                        @foreach ($mobileUsers as $mobileUser)
                            <option value="{{ $mobileUser->id }}">{{ $mobileUser->name }}
                                ({{ $mobileUser->reg_no ?? '' }})
                             (वार्ड नं.{{ $mobileUser->ward_no ?? 'null' }})
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-sm btn-outline-primary" type="button" id="button-personalDetail"
                        title="व्यक्तिगत विवरण थप" data-bs-toggle="modal" data-bs-target="#personalDetail-modal">
                        <i class="fa fa-plus"></i></button>
                </div>
                @error('personal_detail_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4 mb-2">
                <label for="recommendation_detail_id" class="form-label">सिफारिस <span
                        class="text-danger">*</span></label>
                <div class="d-flex justify-content-between gap-1">
                    <select id="recommendation_detail_id" wire:model="recommendation_detail_id"
                        name="recommendation_detail_id"
                        class="form-select @error('recommendation_detail_id') is-invalid @enderror" required>
                        <option value="">-- छान्नुहोस् --</option>
                        @foreach ($formTypes as $formType)
                            <option value="{{ $formType->id }}">
                                {{ $formType->title }}
                            </option>
                        @endforeach
                    </select>

                </div>
                @error('recommendation_detail_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>
    </fieldset>

    <div class="row mt-2">
        <div class="col-md-12 mb-2">
            <fieldset class="bg-soft-secondary">
                <div id="files">
                    @foreach ($fields ?? [] as $key => $field)
                        <div class="main">
                            <div class="row border-bottom mb-2">
                                <input type="hidden" name="fields[{{ $key }}][recommendation_form_field_id]"
                                    class="form-control" value="{{ $field->id }}"
                                    id="recommendation_form_field_id" />
                                <input type="hidden" name="fields[{{ $key }}][type]" class="form-control"
                                    value="{{ $field->type->value }}" id="type" />
                                <div class="col-md-12 mb-2">
                                    <label for="title" class="form-label">{{ $field->field_name }}</label>
                                    @if ($field->type != \App\Enums\FormFieldEnum::TABLE)
                                        <input type="{{ $field->type?->resolveType() ?? 'text' }}"
                                            name="fields[{{ $key }}][value]" class="form-control"
                                            id="title" placeholder="शिर्षक" required />
                                        <input type="hidden" name="fields[{{ $key }}][type]"
                                            class="form-control" value="{{ $field->type?->value }}" id="type"
                                            placeholder="शिर्षक" required />
                                    @else
                                        <input type="hidden" name="fields[{{ $key }}][value]"
                                            class="form-control" value="{{ json_encode($data[$field->slug] ?? []) }}"
                                            id="title" placeholder="शिर्षक" required />
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    @foreach ($field->recommendationFormFields as $sipharishFormField)
                                                        <th>{{ $sipharishFormField->field_name }}</th>
                                                    @endforeach
                                                    <th>
                                                        <button type="button"
                                                            wire:click.prevent="addRowInTable('{{ $field->slug }}')"
                                                            class="btn btn-sm btn-outline-primary">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data[$field->slug] ?? [] as $index => $tableData)
                                                    <tr>
                                                        @foreach ($field->recommendationFormFields as $sipharishFormField)
                                                            <td>
                                                                <input
                                                                    type="{{ $sipharishFormField->type?->resolveType() ?? 'text' }}"
                                                                    class="form-control"
                                                                    wire:model="data.{{ $field->slug }}.{{ $index }}.{{ $sipharishFormField->slug }}.data"
                                                                    id="title"
                                                                    placeholder="{{ $sipharishFormField->field_name }}"
                                                                    required
                                                                    wire:change="setType('{{ $field->slug }}',{{ $index }},'{{ $sipharishFormField->slug }}','{{ $sipharishFormField->type?->value }}')" />
                                                                @if (empty($data[$field->slug][$index][$sipharishFormField->slug]['value']))
                                                                    <span class="text-danger">Data Not Stored</span>
                                                                @endif
                                                            </td>
                                                        @endforeach
                                                        <th>
                                                            <button type="button"
                                                                wire:click.prevent="removeRowInTable('{{ $field->slug }}',{{ $index }})"
                                                                class="btn btn-sm btn-outline-danger">
                                                                <i class="fa fa-minus"></i>
                                                            </button>
                                                        </th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </fieldset>
        </div>

        @if (!empty($documents))
            <div class="col-md-12 mb-2">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <label for="documents" class="form-label fw-bold">
                        आवश्यक कागजातहरु <span class="text-danger">*</span>
                    </label>
                </div>
                <fieldset class="bg-soft-secondary">
                    <div id="files">
                        <div class="main">
                            <div class="row border-bottom mb-2">
                                @foreach ($documents as $key => $document)
                                    <div class="col-md-6 mb-2">
                                        <label for="recommendation_document_id{{ $key }}"
                                            class="form-label">{{ $document->title }}</label>
                                        <input type="hidden"
                                            name="files[{{ $key }}][recommendation_document_id]"
                                            class="form-control" value="{{ $document->id }}">
                                        <input type="text" readonly value="{{ $document->title }}"
                                            class="form-control" id="title" />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <label for="file{{ $key }}" class="form-label">डकुमेन्ट </label>
                                        <input type="file" name="files[{{ $key }}][file]"
                                            class="form-control" id="files{{ $key }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        @endif
    </div>
</div>
