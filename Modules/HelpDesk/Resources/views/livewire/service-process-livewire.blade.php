<div>
    <table class="table">
        <thead>
        <tr>
            <th>उपलब्ध गराउने प्रक्रिया *</th>
            <th>
                <button type="button" wire:click="addRow" class="btn btn-xs btn-primary">
                    <i class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($serviceProcesses as $key=>$serviceProcess)
            <tr>
                <td>
                    @if(!empty($serviceProcess['id']))
                        <input type="hidden" name="serviceProcesses[{{$key}}][id]"
                               wire:model="serviceProcesses.{{$key}}.id">
                    @endif
                    <input type="text" name="serviceProcesses[{{$key}}][description]"
                           wire:model="serviceProcesses.{{$key}}.description" class="form-control"
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
    @error('serviceProcesses')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    @error('serviceProcesses.*')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
