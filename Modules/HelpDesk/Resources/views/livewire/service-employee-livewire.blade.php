<div>
    <table class="table">
        <thead>
        <tr>
            <th>सेवा दिने कर्मचारीहरुको नाम  *</th>
            <th>
                <button type="button" wire:click="addRow" class="btn btn-xs btn-primary">
                    <i class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($serviceEmployees as $key=>$serviceEmployee)
            <tr>
                <td>
                    @if(!empty($serviceEmployee['id']))
                        <input type="hidden" name="serviceEmployees[{{$key}}][id]"
                               wire:model="serviceEmployees.{{$key}}.id">
                    @endif
                    <input type="text" name="serviceEmployees[{{$key}}][employee]" wire:model="serviceEmployees.{{$key}}.employee" class="form-control"
                           placeholder="">
                </td>
                <td>
                    <button type="button" wire:click="removeRow({{$key}})" class="btn btn-xs btn-danger">
                        <i class="fa fa-minus"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    @error('serviceEmployees')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    @error('serviceEmployees.*')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
