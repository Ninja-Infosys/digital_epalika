<div>
    <table class="table table-bordered table-striped table-sm">
        <thead>
        <tr>
            <th>शिर्षक</th>
            <th>Slug</th>
            <th>
                <button type="button" wire:click="addRow" class="btn btn-sm btn-outline-primary">
                    <i class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($formTypes as $key=>$formType)
            <tr>
                <td>
                    <input type="text" name="fields[{{$key}}][field_name]" class="form-control"
                           placeholder="शिर्षक">
                </td>
                <td>
                    <input type="text" name="fields[{{$key}}][slug]" class="form-control" placeholder="Slug">
                <td>
                    <button type="button" wire:click="removeRow({{$key}})" class="btn btn-sm btn-outline-danger">
                        <i class="fa fa-minus"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @error('fields')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    @error('fields.*.field_name')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    @error('fields.*.slug')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
