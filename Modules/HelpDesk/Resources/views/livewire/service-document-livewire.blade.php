<div>
    <table class="table mb-0">
        <thead>
        <tr>
            <th>आबश्यक कागजात *</th>
            <th>
                <button type="button" wire:click="addRow" class="btn btn-xs btn-primary">
                    <i class="fa fa-plus"></i>
                </button>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($serviceDocuments as $key=>$document)
            <tr>
                <td>
                    @if(!empty($document['id']))
                        <input type="hidden" value="{{$document['id']}}">
                    @endif

                    <input type="text" name="serviceDocuments[{{$key}}][description]"
                           wire:model="serviceDocuments.{{$key}}.description" class="form-control"
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
    @error('serviceDocuments')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
    @error('serviceDocuments.*')
    <div class="invalid-feedback">{{$message}}</div>
    @enderror
</div>
