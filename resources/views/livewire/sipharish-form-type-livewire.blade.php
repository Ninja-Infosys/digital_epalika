
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                    <th>शिर्षक</th>
                    <th>Slug</th>
                    <th>प्रकार</th>
                    <th>
                        <button type="button" wire:click.prevent="addRow" class="btn btn-sm btn-outline-primary">
                            <i class="fa fa-plus"></i>
                        </button>
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($form['formDataType'] ?? [] as $index=>$formType)
                    <tr>
                            <input type="hidden" wire:model="form.formDataType.{{$index}}.id" name="form[{{$index}}][id]" class="form-control">

                        <td>
                            <input type="text" wire:model="form.formDataType.{{$index}}.field_name" name="form[{{$index}}][field_name]" class="form-control"
                                   placeholder="शिर्षक">
                            @error('form.formDataType.'.$index.'.field_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <input type="text" wire:model="form.formDataType.{{$index}}.slug" name="form[{{$index}}][slug]" class="form-control"
                                   placeholder="Slug">
                            @error('form.formDataType.'.$index.'.slug')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <select wire:model="form.formDataType.{{$index}}.type" name="form[{{$index}}][type]" class="form-control">
                                <option value="">-- छान्नुहोस् --</option>
                                @foreach(\App\Enums\FormFieldEnum::cases() as $formField)
                                    <option value="{{$formField->value}}">{{$formField->label()}}</option>
                                @endforeach
                            </select>
                            @error('form.formDataType.'.$index.'.type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </td>
                        <td>
                            <button type="button" wire:click.prevent="removeRow({{$index}})"
                                    class="btn btn-sm btn-outline-danger">
                                <i class="fa fa-minus"></i>
                            </button>

                    </tr>
                    @if(!empty($form['formDataType'][$index]['type']) && $form['formDataType'][$index]['type'] == 'table')
                        <tr>
                            <td colspan="4">
                                <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>शिर्षक</th>
                                        <th>Slug</th>
                                        <th>प्रकार</th>
                                        <th>
                                            <button type="button" wire:click.prevent="addRowInTable({{$index}})"
                                                    class="btn btn-sm btn-outline-primary">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($form['formDataType'][$index]['table'] ?? [] as $childIndex=>$formDataTypeTable)
                                        <tr>
                                                <input type="hidden"
                                                       wire:model="form.formDataType.{{$index}}.table.{{$childIndex}}.id"
                                                       name="form[{{$index}}][table][{{$childIndex}}][id]"
                                                       class="form-control"
                                                       placeholder="शिर्षक">
                                                <td>
                                                <input type="text"
                                                       wire:model="form.formDataType.{{$index}}.table.{{$childIndex}}.field_name"
                                                       name="form[{{$index}}][table][{{$childIndex}}][field_name]"
                                                       class="form-control"
                                                       placeholder="शिर्षक">
                                                @error('form.formDataType.'.$index.'.table.'.$childIndex.'.field_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td>
                                                <input type="text"
                                                       wire:model="form.formDataType.{{$index}}.table.{{$childIndex}}.slug"
                                                       name="form[{{$index}}][table][{{$childIndex}}][slug]"
                                                       class="form-control"
                                                       placeholder="Slug">
                                                @error('form.formDataType.'.$index.'.table.'.$childIndex.'.slug')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td>
                                                <select
                                                        wire:model="form.formDataType.{{$index}}.table.{{$childIndex}}.type"
                                                        name="form[{{$index}}][table][{{$childIndex}}][type]"
                                                        class="form-control">
                                                    <option value="">-- छान्नुहोस् --</option>
                                                    @foreach(collect(\App\Enums\FormFieldEnum::cases())->filter(fn($enum)=>$enum->value != 'table') as $formField)
                                                        <option
                                                                value="{{$formField->value}}">{{$formField->label()}}</option>
                                                    @endforeach
                                                </select>
                                                @error('form.formDataType.'.$index.'.table.'.$childIndex.'.type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td>
                                                <button type="button"
                                                        wire:click.prevent="removeRowInTable({{$index}},{{$childIndex}})"
                                                        class="btn btn-sm btn-outline-danger">
                                                    <i class="fa fa-minus"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            @error('form.formDataType')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

