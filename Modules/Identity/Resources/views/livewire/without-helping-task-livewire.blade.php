<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <th>क्र.सं.</th>
                <th>कामको नाम</th>
                <th width="140">
                    <button type="button" class="btn btn-xs btn-outline-primary" wire:click.prevent="incrementTask">
                        <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tasks as $index=>$task)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <input type="text" name="without_helping_task[]" class="form-control"
                            id="without_helping_task-{{ $index }}" value="{{ $task }}"
                            placeholder="कामको नाम" />
                        @error("without_helping_task.$index")
                            <div class="invalid-feedback ">{{ $message }} </div>
                        @enderror
                    </td>
                    <td>
                        <button type="button" class="btn btn-sm btn-outline-danger"
                            wire:click.prevent="decrementTask({{ $index }})">
                            <i class="fa fa-times"></i>
                        </button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">
                        तालिकामा कुनै डाटा उपलब्ध छैन !!!
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
