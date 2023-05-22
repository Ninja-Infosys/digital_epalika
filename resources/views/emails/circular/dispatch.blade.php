<x-mail::message>

    चलानी नं. : {{$dispatchDetail->dispatch?->dispatch_no??''}}<br>
    चलानि मिति : {{$dispatchDetail->dispatch?->dispatch_date??''}}

    Thanks
    {{ config('app.name') }}
</x-mail::message>
