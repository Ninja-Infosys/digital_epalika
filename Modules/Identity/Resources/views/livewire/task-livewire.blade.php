<div>
    <div class="d-flex align-items-center justify-content-between mb-1">
        <label for="file" class="form-label fw-bold"></label>
        <button
            type="button"
            class="btn btn-xs btn-outline-info"
            wire:click.prevent="incrementTask">
            <i class="fas fa-plus-circle"></i> नयाँ थप्नुहोस्
        </button>
    </div>
    @foreach($tasks as $index=>$task)
        <div>
            <div class="main">
                <div class="text-end">
                    <button type="button" class="btn btn-sm btn-outline-danger"
                           wire:click.prevent="decrementTask({{$index}})">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="row border-bottom mb-2">
                    <div class="col-md-12 mb-2">
                        <label for="title" class="form-label">कामको नाम *</label>
                        <input
                            type="text"
                            name="helping_task[]"
                            class="form-control"
                            id="title"
                            placeholder="कामको नाम"
                        />
                    </div>

                </div>
            </div>
        </div>
    @endforeach

</div>
