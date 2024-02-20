<div class="m-1">
    <form>
        <input class="form-control form-control-sm filter-form" type="text" wire:model.defer="search" placeholder="सिफारिस खोजनुहोस">
    </form>

    @if($sipharisForms->isNotEmpty())
        <ul>
            @foreach($sipharisForms as $sipharisForm)
                <li>{{ $sipharisForm->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No data to be shown</p>
    @endif
</div>

